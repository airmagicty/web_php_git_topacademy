async function fetchTasks() {
    const response = await fetch('get_tasks.php');
    const tasks = await response.json();
    const tasksContainer = document.getElementById('tasks-container');

    const response2 = await fetch('get_tasks_id.php');
    // const tasks2 = await response.json();

    tasksContainer.innerHTML = ''; // Очищаем контейнер перед добавлением новых задач

    tasks.forEach(task => {
        const taskItem = document.createElement('div');
        taskItem.className = 'task-item';
        taskItem.innerHTML = `
            <div>
                <strong>${task.task_title}</strong><br>
                ID: ${task.task_id}<br>
                Описание: ${task.description}<br>
                Срок выполнения: ${task.due_date}<br>
                Приоритет: ${task.priority}<br>
                Статус: ${task.status}
            </div>
            <div class="task-actions">
                <button class="edit-button">Редактировать</button>
                <button>Удалить</button>
            </div>
        `;
        tasksContainer.appendChild(taskItem);
    });

     // Добавляем обработчик событий для кнопок "Редактировать"
     const editButtons = document.querySelectorAll('.edit-button');
     editButtons.forEach((button, index) => {
         button.addEventListener('click', function() {
            //  const description = this.getAttribute('data-description');
            //  document.getElementById('modal-description').innerText = description; // Устанавливаем описание в модальном окне
            modal.style.display = "block"; // Открываем модальное окно
            console.log(index+1);
            const taskId = index+1;

        fetch(`get_tasks_id.php?task_id_in_module=${taskId}`)
            .then(response => response.json())
            .then(task => {
                if (task) {
                    // Заполняем поля формы в модальном окне
                    console.log(task.task_title, task.description)
                    document.getElementById('task_id_in_module').innerText = task.task_id; // Записываем ID задачи
                    document.getElementById('task_title_module').value = task.task_title;
                    // console.log( document.getElementById('task_title_module').innerText);
                    document.getElementById('task_description_module').innerText = task.description;
                    document.getElementById('due_date_module').value = task.due_date;
                    document.getElementById('priority_module').value = task.priority;
                    document.getElementById('status_module').value = task.status;

                    // Открываем модальное окно
                    modal.style.display = "block";
                } else {
                    console.error('Задача не найдена');
                }
            })
            // .catch(error => console.error('Ошибка:', error));
    });
         });
     };



// Вызываем функцию для загрузки задач при загрузке страницы
fetchTasks();








