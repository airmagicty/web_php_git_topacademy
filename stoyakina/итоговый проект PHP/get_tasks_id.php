<?php
require_once 'db_config.php';

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$task_id = $_GET['task_id_in_module'];


$sql = "SELECT task_id, task_title, description, due_date, priority, status FROM tasks WHERE task_id = '$task_id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
}

 
// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($user);

$conn->close();
?>

