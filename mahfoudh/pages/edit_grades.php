<?php
include '../includes/connect.php';

//get grades data by id if id is provided in the url query string
if(isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "SELECT * FROM grades WHERE student_id=$student_id";
    $result = mysqli_query($conn, $sql);
    $grade_data = mysqli_fetch_assoc($result);
}

//update grades data if form is submitted
if (isset($_POST['update'])) {
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];

    $sql="UPDATE grades SET subject = '$subject', grade = '$grade' WHERE student_id=$student_id";

    // execute the SQL query
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "grade updated successfully";
        header("Location:./view_students.php");
    } else {
        echo "Error updating grade: ". mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Grade</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form method="post">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $grade_data['subject']; ?>" required>
            </div>
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="number" class="form-control" id="grade" name="grade" value="<?php echo $grade_data['grade']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Edit Grade</button>
        </form>
    </div>

 <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>