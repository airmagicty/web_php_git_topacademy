<?php
function addEmployee($data) {
    $login = $data['login'];
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $position_id = $data['position_id'];

    $query = "INSERT INTO Employees (login, password, position_id) VALUES ('$login', '$password', $position_id)";
    db_query($query);
    return 'Employee added successfully';
}
?>
