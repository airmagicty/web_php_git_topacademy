<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить книгу</title>
</head>
<body>
    <h1>Добавить книгу</h1>
    <form action="add_book.php" method="POST">
        <label for="title">Название книги:</label>
        <input type="text" name="title" required><br>

        <label for="author">Автор:</label>
        <input type="text" name="author" required><br>

        <label for="year_publication">Год публикации:</label>
        <input type="date" name="year_publication" required><br>

        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" required><br>

        <button type="submit">Добавить книгу</button>
    </form>
</body>
</html>