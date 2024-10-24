<?php
function editEmployee($data) {
    $login = $data['login'];
    $new_position_id = $data['new_position_id'];

    $query = "UPDATE Employees SET position_id = $new_position_id WHERE login = '$login'";
    db_query($query);
    return 'Employee updated successfully';
}
?>
