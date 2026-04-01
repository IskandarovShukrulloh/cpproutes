<h2>Edit Lesson</h2>

<form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $lesson->title }}"><br>

    <textarea name="text">{{ $lesson->text }}</textarea><br>

    <button type="submit">Save</button>
</form>
