<?php
require_once 'db_config.php';

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-запрос для получения задач
$sql = "SELECT task_id, task_title, description, due_date, priority, status FROM tasks";
$result = $conn->query($sql);

$tasks = [];
if ($result->num_rows > 0) {
    // Выводим данные каждой строки
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($tasks);

$conn->close();
?>