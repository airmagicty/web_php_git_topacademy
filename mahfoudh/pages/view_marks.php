<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

include '../includes/connect.php';

$student_id = $_GET['id'];

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_mark_id'])) {
    $mark_id = $_POST['delete_mark_id'];
    $sql_delete = "DELETE FROM marks WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $mark_id);
    if ($stmt_delete->execute()) {
        header("Location: view_marks.php?id=$student_id");
        exit();
    } else {
        echo "Error: " . $stmt_delete->error;
    }
    $stmt_delete->close();
}

//get marks
$sql = "SELECT * FROM marks WHERE student_id = $student_id";
$result = mysqli_query($conn, $sql);


//add mark and update 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $subject = $_POST['subject'];
    $mark = $_POST['mark'];
    
    $sql_insert = "INSERT INTO marks (student_id, subject, mark) VALUES ('$student_id', '$subject', '$mark')";
    if(mysqli_query($conn, $sql_insert)){
        header("Location: view_marks.php?id=$student_id");
        exit();
    } else {
        echo "Error: ". mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>
    <!-- CSS -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container m-5">
        <h2>Student Marks</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="mark">Mark (from 2 to 5):</label>
                <input type="number" class="form-control" id="mark" name="mark" min="2" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary">Add/Update Mark</button>
        </form>

        <h3 class="mt-4">Marks List</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Subject</th> 
                    <th>Mark</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                    <td>". $row["subject"]. "</td>
                                    <td>". $row["mark"]. "</td>
                                    <td>
                                        <form method='post' style='display:inline;'>
                                            <input type='hidden' name='delete_mark_id' value='" . $row["id"] . "'>
                                            <button type='submit' class='btn btn-danger'>Delete</button>
                                        </form>
                                    </td>
                                </tr>";
                        }
                    }else {
                        echo "<tr><td colspan='2'>No marks available</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="view_students.php" class="btn btn-secondary mt-3">Back to Students List</a>
    </div>
        
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>