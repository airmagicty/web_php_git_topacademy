<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form{
            margin: 30px;
            width: 20vw;
        }

        h2 {
            text-align: center; /* Центрируем заголовок */
        }

        .registration-form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px; /* Добавляем равные отступы со всех сторон */
        }

        .form-group {
            margin: 15px ; /* Вертикальные отступы 15px, горизонтальные 0 */
            width: auto;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 22px); /* Учитываем отступы и границы */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #4cae4c;
        }

    </style>
</head>
<body>

<div class="registration-form">
    <h2>Регистрация</h2>   
    <form action="registration_processing.php" method="post">
        <div class="form-group">
            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Зарегистрироваться</button>
        </div>
    </form>
</div>

</body>
</html>