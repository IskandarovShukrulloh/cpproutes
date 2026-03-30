@extends('layouts.app')
@section('title', 'View User')
@section('content')
    <h1>User Details</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->fullname }}</p>
    <p><strong>Name:</strong> {{ $user->username}}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">To Users List</a>
@endsection
