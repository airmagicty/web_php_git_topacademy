<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href= 
  "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css"> 
    <style>
/* Общие стили */
body {
  background-color: #fafafa;
}  

/* Форма */
.form-container {
  max-width: 400px;
  margin: 30px auto;
  padding: 30px;
  background-color: beige;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
} 

/* Заголовок формы */
.form-container h2 {
text-align: center;
} 

/* Группы элементов формы */
.form-group {
  margin-bottom: 15px;
}

/* Поля ввода */
input,
textarea {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  outline: none;
}

/* Лейблы */
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}
    </style>
</head>
<body>

<div class="form-container">
	<form action="autorization.php" method="POST">
			<h2>Авторизация</h2>

      <div class="form-group">
			<label for="name">Введите имя</label>
			<input type="text" 
      name="name"
      id="name" required>
		</div>

		<div class="form-group">
			<label for="name">Введите логин</label>
			<input type="text" 
      name="login"
      id="login" required>
		</div>
        <div class="form-group">
			<label for="password">Введите пароль</label>
			<input type="password" 
      name="password"
      id="password" required>
		</div>
        <div class="form-group"> 
				<input type="submit"
					value="Войти"
					class="btn btn-danger"
					name="btn"> 
			</div> 
            <!-- <div class="form-group"> 
				<input type="submit"
					value="Зарегистрироваться"
					class="btn btn-danger"
					name="btn"> 
			</div>    -->
      <a href="register.php">Зарегестрироваться</a>
		</form>
	</div>


    <!-- <h1>Авторизация</h1> 
        <input type="text" name="username" placeholder="Имя пользователя" required>
       
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form> -->
</body>
</html>

<?php
include("connect.php"); // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $login=$_POST['login'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Хеширование пароля
    $password = md5($_POST['password']); // Хеширование пароля

    $q = "SELECT * FROM `reader` WHERE `login`='".$login."' AND `password`='".$password."'";
    echo $q;

    $query = mysqli_query($con, $q);
    if(mysqli_num_rows($query) == 1)
    {
      setcookie("login", $login, time()+1209600);  
      setcookie("password", $password, time()+1209600);
      header('Location: index.php');  
      
    } else {
      echo "Нет такого пользователя";
    }

}

?>