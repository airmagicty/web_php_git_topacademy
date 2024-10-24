<?php
function getEmployees() {
    $result = db_query("SELECT login, title AS position FROM Employees JOIN Positions ON Employees.position_id = Positions.id");
    return db_assoc_to_array($result);
}
?>
