<?php 

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../includes/connect.php';

// $sql = "SELECT students.id, students.name, students.email, students.group_number, students.mobile, students.parent_mobile, students.image, GROUP_CONCAT(grades.subject SEPARATOR ', ') AS subject, GROUP_CONCAT(grades.grade SEPARATOR ', ') AS grade
//         FROM students
//         LEFT JOIN grades ON students.id = grades.student_id
//         GROUP BY students.id
// ";


// $sql = "SELECT * FROM students";


// $result = mysqli_query($conn, $sql);

$search = '';
if (isset($_GET['clear'])) {
    $search = '';
}else if (isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = "SELECT * FROM students WHERE name LIKE '%$search%'";

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

    <!-- Style  -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="student-list container mt-5 ">
        <a href="./add_student.php" class="btn btn-success">Add New Student</a> 
        <a href="./main.php" class="btn btn-secondary">Back to Main</a>
        <h2>Students List</h2>
        <!-- Search Form -->
         <form method="GET" action="" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn-close student-close-btn" aria-label="Clear" type="submit" name="clear"></button>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <table class="table table-bordered table-st">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Parent's Mobile</th>
                    <th>Image</th>
                    <th>Actions</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        echo " <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['group_name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['mobile']."</td>
                        <td>".$row['parent_mobile']."</td>
                        <td><img src='../uploads/".$row['image']."' alt='student image' width='100'></td>

                        <td>
                            <a href='./view_marks.php?id=".$row['id']."' class='btn btn-warning'>view marks</a>
                            <a href='./edit_student.php?id=".$row['id']."' class='btn btn-warning'>Edit Student</a>
                        </td>
                        <td>
                            <a href='../includes/delete_student.php?id=".$row['id']."' class='btn btn-danger'>Delete</a>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No students found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
            
                 
                
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>