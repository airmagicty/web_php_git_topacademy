<?php 

include 'connect.php';

if(isset($_GET['id'])) {
    $id = mysql_real_escape_string($_GET['id']);
    $sql = "DELETE FROM students WHERE id=$id";
    if (mysqli_query($conn, $sql) === TRUE) {
        header('Location:../pages/view_students.php');
    } else {
        echo "Error deleting record: ". $conn->error;
    }
}

exit();