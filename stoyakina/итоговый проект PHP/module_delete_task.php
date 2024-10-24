<?php
require_once 'db_config.php';



$task_id = $_GET['task_id_in_module']; 
// $task_title = $_POST['task_title_module'];
// $task_description = $_POST['task_description_module'];
// $due_date = $_POST['due_date_module'];
// $priority = $_POST['priority_module'];
// $status = $_POST['status_module'];


$sql = "DELETE FROM tasks WHERE task_id = $task_id;";

if($conn->query($sql)){
    echo "Данные успешно удалены";
    header("Location: home_page.php");
} else{
    echo "Ошибка: " . $conn->error;
}


$conn->close();









?>