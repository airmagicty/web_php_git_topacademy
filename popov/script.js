document.addEventListener('DOMContentLoaded', function () {
    loadEmployees();
    loadPositions();

    document.getElementById('addEmployeeForm').addEventListener('submit', handleAddEmployee);
    document.getElementById('editEmployeeForm').addEventListener('submit', handleEditEmployee);
    document.getElementById('deleteEmployeeForm').addEventListener('submit', handleDeleteEmployee);
});

async function loadEmployees() {
    const response = await fetch('app/server.php?action=get_employees');
    const data = await response.json();
    
    // Отображение списка сотрудников
    const employeeList = document.getElementById('employeeList');
    employeeList.innerHTML = data.data.map(employee => `<p>${employee.login}, ${employee.position}</p>`).join('');

    const employeeSelect = document.getElementById('employeeSelect');
    const deleteEmployeeSelect = document.getElementById('deleteEmployee');
    employeeSelect.innerHTML = deleteEmployeeSelect.innerHTML = data.data.map(employee => `<option value="${employee.login}">${employee.login}</option>`).join('');
}

async function loadPositions() {
    const response = await fetch('app/server.php?action=get_positions');
    const data = await response.json();
    
    // Отображение списка должностей
    const positionList = document.getElementById('positionList');
    positionList.innerHTML = data.data.map(position => `<p>${position.title}, Salary: ${position.salary}</p>`).join('');

    const positionSelect = document.getElementById('position');
    const newPositionSelect = document.getElementById('newPosition');
    positionSelect.innerHTML = newPositionSelect.innerHTML = data.data.map(position => `<option value="${position.id}">${position.title}</option>`).join('');
}

async function handleAddEmployee(event) {
    event.preventDefault();

    // Сбор данных формы
    const formData = new FormData(event.target);
    const params = new URLSearchParams();

    // Перебираем formData и добавляем в URLSearchParams
    formData.forEach((value, key) => {
        params.append(key, value);
    });

    // Отправка GET-запроса add_employee
    const response = await fetch(`app/server.php?action=add_employee&${params.toString()}`, {
        method: 'GET'
    });

    const result = await response.json();
    alert(result.info);
    loadEmployees();
}


async function handleEditEmployee(event) {
    event.preventDefault();

    // Сбор данных формы
    const formData = new FormData(event.target);
    const params = new URLSearchParams();

    // Перебираем formData и добавляем в URLSearchParams
    formData.forEach((value, key) => {
        params.append(key, value);
    });

    // Отправка GET-запроса edit_employee
    const response = await fetch(`app/server.php?action=edit_employee&${params.toString()}`, {
        method: 'GET'
    });

    const result = await response.json();
    alert(result.info);
    loadEmployees();
}

async function handleDeleteEmployee(event) {
    event.preventDefault();

    // Сбор данных формы
    const formData = new FormData(event.target);
    const params = new URLSearchParams();

    // Перебираем formData и добавляем в URLSearchParams
    formData.forEach((value, key) => {
        params.append(key, value);
    });

    // Отправка GET-запроса delete_employee
    const response = await fetch(`app/server.php?action=delete_employee&${params.toString()}`, {
        method: 'GET'
    });

    const result = await response.json();
    alert(result.info);
    loadEmployees();
}

// Привязка обработчика к форме
document.getElementById('addEmployeeForm').addEventListener('submit', handleAddEmployee);
document.getElementById('editEmployeeForm').addEventListener('submit', handleEditEmployee);
document.getElementById('deleteEmployeeForm').addEventListener('submit', handleDeleteEmployee);