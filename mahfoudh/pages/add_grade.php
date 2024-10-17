<?php
include '../includes/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO grades (student_id, subject, grade) VALUES ('$student_id', '$subject', '$grade')";

    if (mysqli_query($conn, $sql)== TRUE) {
        echo "New grade added successfully";
        header("Location:view_students.php");
    }else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grade</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form action="add_grade.php" method="post">
            <div class="form-group">
                <label for="student_id">Select Student:</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <?php
                        $sql = "SELECT id, name FROM students";
                        $result = mysqli_query($conn, $sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<option value='". $row['id']. "'>". $row['name']. "</option>";
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="number" class="form-control" id="grade" name="grade" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Grade</button>
        </form>
    </div>

 <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>