<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


// Rutas para la gestión de libros
Route::get('/', [BookController::class, 'index'])->name('books.index'); // Mostrar todos los libros
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Formulario para crear un libro
Route::post('/books', [BookController::class, 'store'])->name('books.store'); // Guardar un nuevo libro
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show'); // Mostrar detalles de un libro
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Formulario para editar un libro
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update'); // Actualizar un libro
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy'); // Eliminar un libro
