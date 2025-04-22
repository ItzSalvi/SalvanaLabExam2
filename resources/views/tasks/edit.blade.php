@extends('layouts.app')

@section('content')
<h2>Edit Task</h2>
<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label d-block">Status</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_completed" id="completed" value="1"
                {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
            <label class="form-check-label" for="completed"><i class="bi bi-check-lg"></i> Completed</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_completed" id="unfinished" value="0"
                {{ old('is_completed', $task->is_completed) == false ? 'checked' : '' }}>
            <label class="form-check-label" for="unfinished"><i class="bi bi-x-lg"></i> Unfinished</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
