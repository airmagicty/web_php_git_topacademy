<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удалить книгу</title>
</head>
<body>
    <h1>Удалить книгу</h1>
    <form action="delete_book.php" method="POST">
        <label for="book_id">Введите ID книги для удаления:</label>
        <input type="number" name="book_id" required>
        <button type="submit">Удалить книгу</button>
    </form>
</body>
</html>