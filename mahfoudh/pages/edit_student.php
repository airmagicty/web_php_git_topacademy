<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}


include '../includes/connect.php';

//get student data by id if id is provided in the url query string
if(isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id=$student_id";
    $result = mysqli_query($conn, $sql);
    $student_data = mysqli_fetch_assoc($result);
}

//update student data if form is submitted
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $group_number = $_POST['group_name'];
    $mobile = $_POST['mobile'];
    $parent_mobile = $_POST['parent_mobile'];

    // for image 
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    if (!empty($image)) {
        move_uploaded_file($image_tmp, "../uploads/$image");
        $sql = "UPDATE students SET name='$name', email='$email', group_name='$group_name', mobile='$mobile', parent_mobile='$parent_mobile', image='$image' WHERE id=$student_id";
    } else {
        $sql = "UPDATE students SET name='$name', email='$email', group_name='$group_name', mobile='$mobile', parent_mobile='$parent_mobile' WHERE id=$student_id";
    }

    // execute the SQL query
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Student updated successfully";
        header("Location:./view_students.php");
    } else {
        echo "Error updating student: ". mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- CSS -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Style  -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container mt-5 edit-student">
        <h2>Edit Student</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $student_data['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student_data['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="group_number">Group Namber:</label>
                <input type="text" class="form-control" id="group_name" name="group_name" value="<?php echo $student_data['group_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $student_data['mobile']; ?>" required>
            </div>
            <div class="form-group">
                <label for="parent_mobile">Parents Mobile:</label>
                <input type="text" class="form-control" id="parent_mobile" name="parent_mobile" value="<?php echo $student_data['parent_mobile']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" >
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update Student</button>
        </form>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>