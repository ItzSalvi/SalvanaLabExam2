@extends('layouts.app')

@section('content')
<h2>Create Task</h2>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Save Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection