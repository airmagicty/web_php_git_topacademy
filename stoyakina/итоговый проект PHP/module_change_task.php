<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $task_id = $_POST['task_id_in_module']; 
    $task_title = $_POST['task_title_module'];
    $task_description = $_POST['task_description_module'];
    $due_date = $_POST['due_date_module'];
    $priority = $_POST['priority_module'];
    $status = $_POST['status_module'];

    
    $sql = "UPDATE tasks
        SET task_title = '$task_title',
            description = '$task_description',
            due_date = '$due_date',
            priority = '$priority',
            status = '$status'
        WHERE task_id = $task_id;";

    /**/if($conn->query($sql)){
        echo "Данные успешно добавлены";
        header("Location: home_page.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }


    $conn->close();
}








?>