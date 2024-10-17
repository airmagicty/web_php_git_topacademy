
<?php
include_once './connect.php';


$name = $_POST['name'];
$email = $_POST['email'];
$group_number = $_POST['group_number'];
$mobile = $_POST['mobile'];
$parent_mobile = $_POST['parent_mobile'];

// for image 
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp, "../uploads/$image");

$sql = "INSERT INTO students (name, email, group_number, mobile, parent_mobile, image) VALUES ('$name', '$email', '$group_number', '$mobile', '$parent_mobile', '$image');";

// $sql->execute($name, $email, $group_number, $mobile, $parent_mobile, $image);

if (mysqli_query($conn, $sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


$conn = null;
