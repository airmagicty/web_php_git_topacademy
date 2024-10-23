<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];


    // echo $username, $email, $password;
    
    $sql = "INSERT INTO tasks (task_title, description, due_date, priority, status) VALUES ('$task_title', '$task_description', '$due_date', '$priority', '$status')";

    /**/if($conn->query($sql)){
        echo "Данные успешно добавлены";
        header("Location: home_page.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }


    $conn->close();
}








?>