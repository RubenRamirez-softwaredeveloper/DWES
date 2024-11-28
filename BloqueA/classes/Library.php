<?php
declare(strict_types = 1);
require_once 'classes/Book.php';

class Library {
    private array $books;         // Propiedad para almacenar los libros
    public string $libraryName;   // Propiedad para almacenar el nombre de la biblioteca

    // Constructor que inicializa el nombre de la biblioteca y el array de libros
    public function __construct(string $libraryName, array $books = [])
    {
        $this->libraryName = $libraryName;
        $this->books = $books;
    }

    // Método para añadir un libro a la biblioteca
    public function addBook(string $title, string $author, int $year): void
    {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
            'year' => $year
        ];
    }

    // Método para eliminar un libro de la biblioteca por su título
    public function removeBook(string $title): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book['title'] === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books); // Reindexar el array
                return true;
            }
        }
        return false; // Si no se encuentra el libro
    }

    // Método para obtener la lista de libros
    public function getBooks(): array
    {
        return $this->books;
    }

    public function listBooks() {
        foreach ($this->books as $book) {
            echo "Título: " . $book->getTitle() . ", Autor: " . $book->getAuthor() . ", Páginas: " . $book->getPages() . PHP_EOL;
        }
    }
}
?>
