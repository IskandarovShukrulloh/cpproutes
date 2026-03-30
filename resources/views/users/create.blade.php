@extends('layouts.app')
@section('title', 'Create User')
@section('content')
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">@csrf
        <div class="mb-3"><label>Full name</label><input type="text" name="fullname" class="form-control" required></div>
        <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
