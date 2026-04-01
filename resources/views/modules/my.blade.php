@extends('layouts.app')

@section('title', 'My Modules')

@section('content')
    <div class="container">

        <div class="modules-header">
            <h1>Мои модули</h1>
            <a href="{{ route('modules.create') }}" class="btn btn-primary">
                + Добавить Модуль
            </a>
        </div>

        @if($modules->isEmpty())
            <p>You don't have any modules yet.</p>
            <a href="{{ route('modules.create') }}" class="btn btn-primary">Create Module</a>
        @else

            @foreach($modules as $module)
                <div class="card mb-4">

                    {{-- HEADER --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>{{ $module->title }}</strong>

                        <div>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body">

                        <p>{{ $module->description }}</p>

                        {{-- ADD LESSON --}}
                        <a href="{{ route('lessons.create', $module->id) }}" class="btn btn-sm btn-primary mb-3">
                            + Add Lesson
                        </a>

                        {{-- LESSONS --}}
                        <h6>Lessons ({{ $module->lessons->count() }}):</h6>

                        @if($module->lessons->isEmpty())
                            <p class="text-muted">No lessons yet.</p>
                        @else
                            <ul class="list-group">

                                @foreach($module->lessons as $lesson)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">

                                        {{-- TITLE --}}
                                        <a href="{{ route('lessons.show', $lesson->id) }}">
                                            {{ $lesson->title }}
                                        </a>

                                        {{-- ACTIONS --}}
                                        <div>
                                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm btn-outline-warning">
                                                Edit
                                            </a>

                                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    </li>
                                @endforeach

                            </ul>
                        @endif

                    </div>
                </div>
            @endforeach

        @endif

    </div>
@endsection
