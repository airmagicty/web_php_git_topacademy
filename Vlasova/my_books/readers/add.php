<html> 

<head> 
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8"> 

	<title>Добавить книги</title> 

	<link rel="stylesheet" href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/style.css"> 
</head> 

<body> 
	<div class="container mt-5"> 
		<h1>Добавить книги</h1> 
		<form action="add.php" method="POST"> 
			<div class="form-group"> 
				<label>Название книги</label> 
				<input type="text"
					class="form-control"
					placeholder="Название книги"
					name="title" /> 
			</div> 

			<div class="form-group"> 
				<label>Автор</label> 
				<input type="text"
					class="form-control"
					placeholder="Автор"
					name="author" /> 
			</div> 

            <div class="form-group"> 
				<label>Год публикации</label> 
				<input type="year"
					class="form-control"
					placeholder="Год публикации"
					name="year_publication" /> 
			</div> 

			<div class="form-group"> 
				<label>Количество экземпляров</label> 
				<input type="text"
                    class="form-control"
                    placeholder="Количество экземпляров"
					name="quantity" /> 					
			</div> 

			<div class="form-group"> 
				<input type="submit"
					value="Добавить"
					class="btn btn-danger"
					name="btn"> 
			</div> 
		</form> 
	</div> 

	<?php 
if(isset($_POST["btn"])) { 
    include("connect.php"); 
    $title=$_POST['title']; 
    $author=$_POST['author']; 
    $year=$_POST['year_publication']; 
    $quantity=$_POST['quantity']; 


    $q="INSENT INTO `book` (`title`, `author`,`year_publication`,`quantity`) 
    VALUES
    ('$title','$author', '$year','$quantity')"; 

    mysqli_query($con,$q); 
    header("location:index.php"); 
} 

	?> 
</body> 

</html>
