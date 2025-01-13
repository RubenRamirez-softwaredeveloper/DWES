<?php
// Incluir la clase Library
include 'classes/Library.php';

// Crear una instancia de la biblioteca
$library = new Library("My Local Library", [
    ['title' => 'El Padrino', 'author' => 'Mario Puzzo', 'year' => 1969],
    ['title' => 'El señor de los Anillos', 'author' => 'J.R.R Tolkien', 'year' => 1960],
    ['title' => 'El Perfume', 'author' => 'Patrick Süskind', 'year' => 1985],
    ['title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'year' => 1967],
    ['title' => '1984', 'author' => 'George Orwell', 'year' => 1949]

]);

// Añadir un nuevo libro
$library->addBook('Don quijote de la Mancha', 'Cervantes', 1605);

// Eliminar un libro
$library->removeBook('El Perfume');

// Obtener la lista actualizada de libros
$books = $library->getBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>
<body>
<?php include 'includes/header2.php'; ?>
    <h1>Welcome to <?= $library->libraryName ?></h1>
    <h2>Libros Disponibles:</h2>
    <table border="1">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Año</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['year']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php include 'includes/footer2.php'; ?>
</body>
</html>
