<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Muestra una lista de todos los libros.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Almacena un nuevo libro en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Muestra los detalles de un libro específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Muestra el formulario para editar un libro existente.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Actualiza los detalles de un libro en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Elimina un libro de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
