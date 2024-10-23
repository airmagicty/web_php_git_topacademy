<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // echo $username, $email, $password;
    
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    /**/if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}












?>