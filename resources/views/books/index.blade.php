@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Books</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .container {
            max-width: 800px; /* Ajusta el ancho máximo según tus necesidades */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
        }

        .table {
            border: 2px solid purple; /* Establece el borde de la tabla */
            border-collapse: collapse; /* Colapsa los bordes de la tabla */
            width: 100%; /* Opcional: para hacer que la tabla sea responsiva */
        }

        .table th,
        .table td {
            border: 1px solid purple; /* Establece el borde de las celdas */
            padding: 8px; /* Ajusta el relleno de las celdas */
        }

        .btn {
            /* Estilos para tus botones */
        }
    </style>
@endsection
