<!-- View: students.create -->
<!-- resources/views/books/create.blade.php -->
<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title">
    <br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author">
    <br>
    <button type="submit">Create Book</button>
</form>
