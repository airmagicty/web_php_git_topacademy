<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления задачами</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

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











<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Редактировать задачу</h2>
        <!-- <p id="modal-description">Описание задачи</p> -->
        <!-- Здесь можно добавить форму для редактирования -->
        
        <form action="module_edit_task.php" method="post">
            <p id="task_id_in_module"></p>
            <div class="form-group">
                <label for="task_title_module">Название задачи:</label>
                <input type="text" id="task_title_module" name="task_title_module" required>
            </div>
            <div class="form-group">
                <label for="task_description_module">Описание:</label>
                <textarea id="task_description_module" name="task_description_module" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="due_date_module">Срок выполнения:</label>
                <input type="datetime-local" id="due_date_module" name="due_date_module" required>
            </div>
            <div class="form-group">
                <label for="priorit_moduley">Приоритет:</label>
                <select id="priority_module" name="priority_module" required>
                    <option value="high">Высокий</option>
                    <option value="medium">Средний</option>
                    <option value="low">Низкий</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_module">Статус:</label>
                <select id="status_module" name="status_module" required>
                    <option value="new">Новая</option>
                    <option value="in-progress">В процессе</option>
                    <option value="completed">Завершена</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Сохранить изменения</button>
            </div>
        </form>
        
        
        
        
        
    </div>
</div>

<div class="task-list">
    <h2>Список задач</h2>
    <div id="tasks-container"></div>
</div>

<script src='js/get_tasks.js' defer></script>
<script src='js/change_task.js' defer></script>

</body>
</html>
