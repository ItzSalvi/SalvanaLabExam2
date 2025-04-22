@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">All Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">
            + Add New Task
        </a>
    </div>

    @if($tasks->isEmpty())
    <div class="alert alert-info">No tasks found. Create one!</div>
    @else
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table align-middle table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td class="fw-semibold">{{ $task->title }}</td>
                        <td>{{ Str::limit($task->description, 50) }}</td>
                        <td>
                            @if($task->is_completed)
                            <span class="badge bg-success">Completed</span>
                            @else
                            <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        @if ($tasks->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $tasks->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                        @endif

                        @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $tasks->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        @if ($tasks->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $tasks->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection