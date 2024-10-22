<?php
// Подключение к базе данных
include_once "config.php"; // Убедитесь, что у вас есть файл конфигурации для подключения к БД

// Получаем ID книги из URL
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // Получаем данные о книге из базы данных
    $stmt = $conn->prepare("SELECT * FROM book WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "Книга не найдена.";
        exit;
    }
} else {
    echo "ID книги не указан.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать книгу</title>
</head>
<body>
    <h1>Редактировать книгу</h1>
    <form action="edit_book.php" method="POST">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
        
        <label for="title">Название книги:</label>
        <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>

        <label for="author">Автор:</label>
        <input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>

        <label for="year_publication">Год публикации:</label>
        <input type="date" name="year_publication" value="<?php echo $book['year_publication']; ?>" required><br>

        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" value="<?php echo $book['quantity']; ?>" required><br>

        <button type="submit">Сохранить изменения</button>
    </form>
</body>
</html>