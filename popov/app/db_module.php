<?php
require_once 'db_config.php';

function db_query($query) {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);
    $conn->close();
    return $result;
}

function db_assoc_to_array($result) {
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
