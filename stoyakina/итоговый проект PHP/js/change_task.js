// Получаем элементы модального окна
const modal = document.getElementById("myModal");
const span = document.getElementsByClassName("close")[0];

// Закрытие модального окна при нажатии на "x"
span.onclick = function() {
    modal.style.display = "none";
}

// Закрытие модального окна при клике вне его
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Вызываем функцию для загрузки задач при загрузке страницы
fetchTasks();