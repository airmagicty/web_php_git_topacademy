<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления задачами</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .task-form, .task-list {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50vw; /* Ширина формы и списка */
            margin: 30px;
        }

        .form-group {
            margin: 15px 0;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: calc(100% - 22px);
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

        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .task-actions {
            display: flex;
            gap: 10px;
        }

        .nav-panel {
            width: 100%;
            background: #296029;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .nav-panel a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="nav-panel">
    <a href="#">Мой профиль</a>
    <a href="#">Настройки</a>
    <a href="#">Выход</a>
</div>

<h1>Система управления задачами</h1>

<div class="task-form">
    <h2>Добавить новую задачу</h2>
    <form action="module_add_task.php" method="post">
        <div class="form-group">
            <label for="task_title">Название задачи:</label>
            <input type="text" id="task_title" name="task_title" required>
        </div>
        <div class="form-group">
            <label for="task_description">Описание:</label>
            <textarea id="task_description" name="task_description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Срок выполнения:</label>
            <input type="datetime-local" id="due_date" name="due_date" required>
        </div>
        <div class="form-group">
            <label for="priority">Приоритет:</label>
            <select id="priority" name="priority" required>
                <option value="high">Высокий</option>
                <option value="medium">Средний</option>
                <option value="low">Низкий</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Статус:</label>
            <select id="status" name="status" required>
                <option value="new">Новая</option>
                <option value="in-progress">В процессе</option>
                <option value="completed">Завершена</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Добавить задачу</button>
        </div>
    </form>
</div>

<div class="task-list">
    <h2>Список задач</h2>
    <div class="task-item">
        <div>
            <strong>Название задачи 1</strong><br>
            Срок выполнения: 2024-10-20 14:00<br>
            Приоритет: Высокий<br>
            Статус: Новая
        </div>
        <div class="task-actions">
            <button>Редактировать</button>
            <button>Удалить</button>
        </div>
    </div>
    <div class="task-item">
        <div>
            <strong>Название задачи 2</strong><br>
            Срок выполнения: 2024-10-22 10:00<br>
            Приоритет: Средний<br>
            Статус: В процессе
        </div>
        <div class="task-actions">
            <button>Редактировать</button>
            <button>Удалить</button>
        </div>
    </div>
    <!-- Добавьте больше задач по мере необходимости -->
</div>

</body>
</html>
