<?php 

require_once '../includes/connect.php';

$sql = "SELECT students.id, students.name, students.email, students.group_number, students.mobile, students.parent_mobile, students.image, grades.subject, grades.grade
 FROM students
 LEFT JOIN grades ON students.id = grades.student_id";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List with Grades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Students List with Grades</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group Number</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Parent's Mobile</th>
                    <th>Image</th>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo " <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['group_number']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['mobile']."</td>
                        <td>".$row['parent_mobile']."</td>
                        <td><img src='../uploads/".$row['image']."' alt='student image' width='100'></td>
                        <td>".$row['subject']."</td>
                        <td>".$row['grade']."</td>
                        <td>
                            <a href='delete_student.php?id=".$row['id']."' class='btn btn-danger'>Delete</a>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No students found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
            
        <a href="./add_student.php" class="btn btn-success">Add New Student</a>          
                
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>