@extends('layouts.app')
@section('title', 'Create Module')
@section('content')
    <h1>Create Module</h1>
    <form action="{{ route('modules.store') }}" method="POST">@csrf
        <div class="mb-3"><label>Title</label><input type="text" name="title" class="form-control" required></div>
        <div class="mb-3"><label>Active</label><input type="checkbox" name="is_active" value="1"></div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
