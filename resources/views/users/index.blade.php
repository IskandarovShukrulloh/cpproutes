@extends('layouts.app')
@section('title', 'Users List')
@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>

    <table class="table table-bordered">
        <thead>
        <tr><th>ID</th><th>Full name</th><th>Unique Username</th><th>Email</th><th>Role</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <th>{{ $user->username }}</th>
                <td>{{ $user->email }}</td>
                <th>{{ $user->role}}</th>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">@csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
