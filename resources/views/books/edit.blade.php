<!-- View: students.edit -->
<!-- resources/views/books/edit.blade.php -->
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title }}">
    <br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="{{ $book->author }}">
    <br>
    <button type="submit">Update Book</button>
</form>
