@extends('layouts.app')

@section('title', $lesson->title)

@section('content')

    <h1>{{ $lesson->title }}</h1>

    {{-- 🎬 Видео --}}

    @if ($lesson->videos)
        @foreach($lesson->videos as $video)
            <video width="400" controls muted>
                <source src="{{ asset('storage/' . $video->path) }}">
            </video>
      @endforeach
    @endif
    {{-- 📖 Текст --}}
    <div>
        {!! $lesson->text !!}
    </div>

    {{-- 📂 Файлы --}}
    @if ($lesson->files)
        @foreach($lesson->files as $file)
            <div>
                <a href="{{ asset('storage/' . $file->path) }}" target="_blank" download>
                    {{ basename($file->path) }}
                </a>

            </div>
        @endforeach
    @endif
@endsection
