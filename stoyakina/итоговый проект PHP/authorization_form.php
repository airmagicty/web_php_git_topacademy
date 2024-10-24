<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма авторизации</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px; /* Добавляем равные отступы со всех сторон */
            width: 20vw; /* Ширина формы */
        }

        h2 {
            text-align: center; /* Центрируем заголовок */
        }

        .form-group {
            margin: 15px 0; /* Вертикальные отступы 15px */
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

<div class="login-form">
    <h2>Авторизация</h2>
    <form action="authorization_processing.php" method="post">
        <div class="form-group">
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Войти</button>
        </div>
        <div id="error-message" style="color: red;"></div> <!-- Для отображения ошибок -->
    </form>
</div>

<!-- <script>


    session_start(); // Начинаем сессию

    if (isset($_SESSION['error_message'])) {
        echo "<script>alert(" $_SESSION['error_message'] ");</script><script>"; 
        unset($_SESSION['error_message']); // Удаляем сообщение после отображения
    }

</script> -->
</body>
</html>