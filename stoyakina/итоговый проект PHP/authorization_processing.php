<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usernameRegex = '/^[a-zA-Z0-9_]{3,20}$/';
    $passwordRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    $errorMessage = 0;
    
     // Проверка логина
     if (!preg_match($usernameRegex, $username)) {
        $errorMessage = 'Логин должен содержать от 3 до 20 символов и может включать только буквы, цифры и символ "_".';    
    }

    // Проверка пароля
    if (!preg_match($passwordRegex, $password)) {
        $errorMessage = 'Пароль должен содержать минимум 8 символов, включая хотя бы одну букву и одну цифру.';
    }

    if ($errorMessage!=0) {
        // $_SESSION['error_message'] = $errorMessage; // Сохраняем сообщение в сессии
        // header("Location: authorization_form.php");
        // exit();

        // echo "<div class='error-message'>$errorMessage</div>"; // Отображаем сообщение об ошибке
        echo "<script>alert('$errorMessage');</script>";
        
        
        
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
        }

        if($password === $user['password']){
            $_SESSION['username'] = $username;
            echo "Вы вошли в систему. Добро пожаловать, $username!";
            header("Location: home_page.php");
        } else{
            echo "Ошибка: " . $conn->error."|| неправильный логин или пароль";
        } 
        $conn->close();
    }

   


}
?>