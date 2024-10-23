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
                <input id='task_id' name='task_id_${task.task_id}' value='${task.task_id}' type=hidden><br>
                <button class="edit-button">Редактировать</button>
                <button class="delete-button">Удалить</button>
            </div>
        `;
        tasksContainer.appendChild(taskItem);
    });

     // Добавляем обработчик событий для кнопок "Редактировать"
     const editButtons = document.querySelectorAll('.edit-button');
     editButtons.forEach((button, index) => {
         button.addEventListener('click', function() {
            modal.style.display = "block"; // Открываем модальное окно
            // const taskId = document.querySelectorAll('#task_id')[index+1]; // Записываем ID задачи
            // console.log('index+1 = ', index+1, '  taskID = ', taskId);
            // const taskId = index+1;

        // Находим родительский элемент, содержащий кнопку
        const taskDiv = button.closest('div'); // Находим ближайший родительский div
        const taskIdInput = taskDiv.querySelector('#task_id'); // Находим input с ID, начинающимся на 'task_id_'
        console.log('taskIdInput = ', taskIdInput);   


        if (taskIdInput) {
            const taskId = taskIdInput.value; // Получаем ID задачи из атрибута id
            console.log('Task ID:', taskId); // Выводим ID задачи в консоль

            // Теперь используем taskId для запроса
            fetch(`get_tasks_id.php?task_id_in_module=${taskId}`)
                .then(response => response.json())
                .then(task => {
                    if (task) {
                        // Заполняем поля формы в модальном окне
                        console.log('id = ', task.task_id, ' title = ', task.task_title )
                        document.getElementById('task_id_in_module').value = task.task_id; // Записываем ID задачи
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
            }    // .catch(error => console.error('Ошибка:', error));
        });
    });



    // Добавляем обработчик событий для кнопок "Удалить"
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            console.log(index+1);
            const taskId = index+1;
            if (confirm('Вы уверены, что хотите удалить эту задачу?')) {
                // Отправка AJAX-запроса на удаление задачи
                fetch(`module_delete_task.php?task_id_in_module=${taskId}`);
                location.reload();
            }             
       });
   });

};  



// Вызываем функцию для загрузки задач при загрузке страницы
fetchTasks();








