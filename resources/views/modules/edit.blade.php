@extends('layouts.app')
@section('title', 'Edit Module')
@section('content')
    <h1>Edit Module</h1>
    <form action="{{ route('modules.update', $module) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Module Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $module->title }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $module->description }}</textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Module</button>
        <a href="{{ route('modules.my') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
