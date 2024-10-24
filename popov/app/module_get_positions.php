<?php
function getPositions() {
    $result = db_query("SELECT id, title, salary FROM Positions");
    return db_assoc_to_array($result);
}
?>
