<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Book; // Asegúrate de importar el modelo Book

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->timestamps();
        });

        // Aquí agregamos algunos datos
        $books = [
            ['title' => 'El señor de los anillos', 'author' => 'J.R.R. Tolkien'],
            ['title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez'],
            ['title' => '1984', 'author' => 'George Orwell'],
        ];

        // Iteramos sobre los datos y los insertamos en la base de datos
        foreach ($books as $book) {
            Book::create($book);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
