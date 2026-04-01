@extends('layouts.app')

@section('title', 'Lessons Admin')

@section('content')
    <div class="container">

        <h1 class="mb-4">Lessons</h1>

        @if($lessons->isEmpty())
            <p>No lessons found.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Module</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>

                        <td>{{ $lesson->title }}</td>

                        <td>
                            {{ $lesson->module?->title ?? '—' }}
                        </td>

                        <td>{{ $lesson->order }}</td>

                        <td>
                            {{-- VIEW --}}
                            <a href="{{ route('lessons.show', $lesson->id) }}"
                               class="btn btn-sm btn-primary">
                                View
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('lessons.edit', $lesson->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('lessons.destroy', $lesson->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this lesson?')">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
