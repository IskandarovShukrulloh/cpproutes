@extends('layouts.app')
@section('title', 'View User')
@section('content')
    <h1>User Details</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->fullname }}</p>
    <p><strong>Name:</strong> {{ $user->username}}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

@endsection
