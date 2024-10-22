<?php
require_once 'db_config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    
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
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();


}
?>