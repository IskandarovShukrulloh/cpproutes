@extends('layouts.app')
@section('title', 'Modules List')
@section('content')
    <h1>Modules</h1>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Create Module</a>

    <table class="table table-bordered">
        <thead>
        <tr><th>ID</th><th>Title</th><th>Author</th><th>Active</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
            <tr>
                <td>{{ $module->id }}</td>
                <td>{{ $module->title }}</td>
                <td>
                    @if($module->author)
                        <a href="{{ route('users.show', $module->author->id) }}">
                            {{ $module->author->username }}
                        </a>
                    @else
                        —
                    @endif
                </td>
                <td>{{ $module->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('modules.show', $module) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('modules.edit', $module) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display:inline">@csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
