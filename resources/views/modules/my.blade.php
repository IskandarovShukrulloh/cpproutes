@extends('layouts.app')
@section('title', 'My Modules')
@section('content')
    <div class="my-modules">
        <div class="modules-header">
            <h1>Мои модули</h1>
            <a href="{{ route('modules.create') }}" class="btn btn-primary">
                + Добавить Модуль
            </a>
        </div>

        @if($modules->isEmpty())
            <div class="empty-state">
                <p>Вы еще не создавали модули</p>
                <a href="{{ route('modules.create') }}" class="btn btn-primary">Создайте свой первый модуль с уроками</a>
            </div>
        @else
            <div class="modules-list">
                @foreach($modules as $module)
                    <div class="module-card">
                        <div class="module-header">
                            <h3>{{ $module->title }}</h3>
                            <div class="module-actions">
                                <a href="{{ route('modules.edit', $module) }}" class="btn btn-sm btn-warning">Изменить</a>
                                <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Удалить</button>
                                </form>
                            </div>
                        </div>

                        @if($module->description)
                            <p class="module-description">{{ $module->description }}</p>
                        @endif

                        {{--<div class="module-lessons">
                            <h4>Lessons</h4>
                            @if($module->lessons->isEmpty())
                                <p class="no-lessons">No lessons yet. <a href="{{ route('lessons.create', $module) }}">Add one</a></p>
                            @else
                                <ul>
                                    @foreach($module->lessons as $lesson)
                                        <li>{{ $lesson->title }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div> --}}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
