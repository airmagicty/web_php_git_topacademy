<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Регулярные выражения для валидации
    $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
    $usernameRegex = '/^[a-zA-Z0-9_]{3,20}$/';
    $passwordRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

    // Проверка электронной почты
    if (!preg_match($emailRegex, $email)) {
        $errorMessage = 'Некорректный адрес электронной почты.';
    }

    // Проверка логина
    if (!preg_match($usernameRegex, $username)) {
        $errorMessage = 'Логин должен содержать от 3 до 20 символов и может включать только буквы, цифры и символ "_".';    
    }

    // Проверка пароля
    if (!preg_match($passwordRegex, $password)) {
        $errorMessage = 'Пароль должен содержать минимум 8 символов, включая хотя бы одну букву и одну цифру.';
    }

    if ($errorMessage) {
        echo "<script>alert('$errorMessage');</script>";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = $conn->query($sql);

        /**/if($conn->query($sql)){
            header("Location: home_page.php");
        } else{
            echo "Ошибка: " . $conn->error;
        }

    }

    
    
    $conn->close();
}





?>