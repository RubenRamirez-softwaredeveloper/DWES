<?php
declare(strict_types=1);
include 'classes/Book.php';


// Clase Library
class Library
{
    private array $books;

    public function __construct()
    {
        $this->books = [];
    }

    // Método para agregar un libro
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    // Método para eliminar un libro por su título
    public function removeBook(string $title): bool
    {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() === $title) {
                unset($this->books[$key]);
                $this->books = array_values($this->books); // Reindexar el array
                return true;
            }
        }
        return false;
    }

    // Método para listar todos los libros
    public function getBooks(): array
    {
        return $this->books;
    }
}

// Crear instancias de Book y Library
$library = new Library();

// Agregar libros a la biblioteca
$library->addBook(new Book('Sancho panza y su panza', 'Cervantes', 328));
$library->addBook(new Book('Calvicie y mi amor por España', 'Vicente del Bosque', 281));
$library->addBook(new Book('La ciencia mojada', 'Keko Ñete', 180));

// Eliminar un libro por su título
$library->removeBook('Vida, obra y milagros');

// Obtener la lista de libros
$books = $library->getBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header2.php'; ?>
    <main>
        <h1>Library Collection</h1>
        <h2>Libros Disponibles</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Pages</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book->getTitle()) ?></td>
                        <td><?= htmlspecialchars($book->getAuthor()) ?></td>
                        <td><?= $book->getPages() ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No books available in the library.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include 'includes/footer2.php'; ?>
</body>
</html>