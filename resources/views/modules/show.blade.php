@extends('layouts.app')
@section('title', 'Edit Module')
@section('content')
    <h1>Edit Module</h1>
    <form action="{{ route('modules.update', $module) }}" method="POST">@csrf @method('PUT')
        <div class="mb-3"><label>Title</label><input type="text" name="title" class="form-control" value="{{ $module->title }}" required></div>
        <div class="mb-3"><label>Active</label>
            <input type="checkbox" name="is_active" value="1" {{ $module->is_active ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
