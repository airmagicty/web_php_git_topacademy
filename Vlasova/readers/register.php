<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Форма регистрации</title>
  <link rel="stylesheet" href= 
  "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
	<div class="form-container">
		<form action="register.php" method="POST">
			<h2>Регистрация</h2>

      <div class="form-group">
			<label for="name">Введите имя</label>
			<input type="text" 
      name="name"
      id="name" required>
		</div>

		<div class="form-group">
			<label for="name">Придумайте логин</label>
			<input type="text" 
      name="login"
      id="name" required>
		</div>

		<div class="form-group">
			<label for="e-mail">Введите адрес E-mail</label>
			<input type="email" 
      name="email"
      id="e-mail" required>
		</div>

		<div class="form-group">
			<label for="password">Придумайте пароль</label>
			<input type="password" 
      name="password"
      id="password" required>
		</div>
    
		<div class="form-group">
			<label for="confirm-password">Повторите пароль</label>
			<input type="password" 
      name="password"
      id="confirm-password" required>
		</div>

  <div class="form-group"> 
				<input type="submit"
					value="Зарегестрироваться"
					class="btn btn-danger"
					name="btn"> 
			</div> 
		</form>
	</div>
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

	<?php 
if(isset($_POST["btn"])) { 
    include("connect.php"); 
    $name=$_POST['name']; 
    $login=$_POST['login']; 
    $email=$_POST['email']; 
    $password=$_POST['password']; 

    
        // проверям логин
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
    
        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
        {
            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
        }
    
        // проверяем, не сущестует ли пользователя с таким именем
        // echo "SELECT `reader_id` FROM `reader` WHERE `login`='".($_POST['login'])."'";
        $query = mysqli_query($con, "SELECT `reader_id` FROM `reader` WHERE `login`='".($_POST['login'])."'");
        if(mysqli_num_rows($query) > 0)
        {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }
    
        // // Если нет ошибок, то добавляем в БД нового пользователя
        // if(count($err) == 0)
        // {
    
        //     // $login = $_POST['login'];
    
        //     // Убераем лишние пробелы и делаем двойное хеширование
        //     $password = md5(md5(trim($_POST['password'])));
        // }

   
    $q = "INSERT INTO `reader` (`name`, `login`, `email`, `password`) 
          VALUES ('$name', '$login', '$email', '". md5($password) ."')";

    mysqli_query($con,$q); 
    header("location:add.php"); 
} 
?>

</body>
</html>