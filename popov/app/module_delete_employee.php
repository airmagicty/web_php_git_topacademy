<?php
function deleteEmployee($data) {
    $login = $data['login'];

    $query = "DELETE FROM Employees WHERE login = '$login'";
    db_query($query);
    return 'Employee deleted successfully';
}
?>
