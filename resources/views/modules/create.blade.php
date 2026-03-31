@extends('layouts.app')
@section('title', 'Create Module')
@section('content')
    <div class="create-module">
        <h1>Create New Module</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('modules.store') }}" method="POST" class="module-form">
            @csrf

            <div class="form-group">
                <label for="title">Module Title *</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    required
                    placeholder="Enter module title"
                >
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    name="description"
                    id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="5"
                    placeholder="Enter module description (optional)"
                >{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create Module</button>
                <a href="{{ route('modules.my') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
