<?php 
session_start();
include_once 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];


    //check if user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' and pwd ='$pwd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1 ) {
        $user = mysqli_fetch_array($result);
        //check if password is correct
        
        $_SESSION['username'] = $user['username'];
        header("Location:./pages/main.php");
        exit();
    

    } else {
        $error_message = "Invalid username or password";
    }
    $result->free();
};
mysqli_close($conn);
