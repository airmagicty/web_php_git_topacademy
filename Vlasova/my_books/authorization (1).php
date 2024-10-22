<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <form id="loginForm" action="/login" method="post">
        <label for="username">Имя пользователя:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Войти</button>
    </form>
    <style>
 /* Общий стиль */
* {
  box-sizing: border-box;
}

/* Основной цвет фона */
body {
  background-color: #fafafa;
}

/* Стиль формы */
form {
  max-width: 300px;
  margin: 30px auto;
  padding: 30px;
  background-color: #fff;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

/* Стиль полей ввода и кнопки */
input[type="text"], input[type="password"] {
  height: 36px;
  font-size: 1em;
  margin-bottom: 10px;
  padding: 0 10px;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  outline: none;
}

input[type="submit"] {
  cursor: pointer;
  color: white;
  background-color: #009ffc;
  border: none;
  border-radius: 4px;
  font-weight: bold;
  transition: all .2s ease;
  outline: none;
}

input[type="submit"]:hover {
  background-color: #0086d4;
}

/* Подсказки */
label {
  margin-top: 10px;
  display: block;
  text-align: left;
  font-weight: bold;
}

/* Оформление текста */
input::placeholder {
  color: #aaa;
}
    </style>
    
</body>
</html>