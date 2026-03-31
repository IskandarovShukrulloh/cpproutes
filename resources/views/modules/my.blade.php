@foreach($modules as $module)
    <div>
        <h3>{{ $module->title }}</h3>

        <a href="{{ route('lessons.create', $module->id) }}">
            Add Lesson
        </a>
    </div>
@endforeach
