<h2>Create Lesson for "{{ $module->title }}"</h2>

<form action="{{ route('lessons.store', $module->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Title"><br>

    <textarea name="text" placeholder="Lesson text"></textarea><br>

    <label>Files:</label>
    <input type="file" name="files[]" multiple><br>

    <label>Videos:</label>
    <input type="file" name="videos[]" multiple><br>

    <button type="submit">Create</button>
</form>
