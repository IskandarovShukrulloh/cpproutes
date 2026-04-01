@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="container">

        <h1 class="mb-4">Добро пожаловать в CppRoutes</h1>

        {{-- List of modules --}}
        @if($modules->isEmpty())
            <p>No modules available at the moment.</p>
        @else
            @foreach($modules as $module)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                    {{ $module->title }}
            </span>

                        <small>
                            Автор:
                            @if($module->author)
                                <a href="{{ route('profile.show', $module->author->id) }}">
                                    {{ $module->author->username }}
                                </a>
                            @else
                                —
                            @endif
                        </small>
                    </div>

                    <div class="card-body">
                        <h6>Уроки ({{ $module->lessons->count() }}):</h6>

                        @if($module->lessons->isEmpty())
                            <p class="text-muted">Пока что автор не добавил уроков для этого модуля</p>
                        @else
                            <ul>
                                @foreach($module->lessons as $lesson)
                                    <li>
                                        <a href="{{ route('lessons.show', $lesson->id) }}">
                                            {{ $lesson->title }}
                                        </a>
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
