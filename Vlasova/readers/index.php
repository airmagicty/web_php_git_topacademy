<?php 
	include("connect.php"); 

	if (isset($_POST['btn'])) { 
		$quantity=$_POST['quantity']; 
		$q="SELECT * FROM `book` where `quantity`='$quantity'"; 
		$query=mysqli_query($con,$q); 
	} 
	else { 
		$q= "select * from book"; 
		$query=mysqli_query($con,$q); 
	} 
?> 

<?php 

	$login = $_COOKIE['login'];
    $password = $_COOKIE['password'];

    $q = "SELECT * FROM `reader` WHERE `login`='".$login."' AND `password`='".$password."'";

    $query2 = mysqli_query($con, $q);
    if(mysqli_num_rows($query2) != 1)
    {
		header('Location: autorization.php');  
    } 
?> 


<html> 

<head> 
	<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8"> 

	<title>Список книг</title> 

	<link rel="stylesheet" href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 

	<link rel="stylesheet"
		href="css/style.css"> 
</head> 

<body> 
	<div class="container mt-5"> 
		
		<!-- top --> 
		<div class="row"> 
			<div class="col-lg-8"> 
				<h1>Посмотреть список книг</h1> 
				<a href="add.php">Добавить книги</a> 
			</div> 
			<div class="col-lg-4"> 
				<div class="row"> 
					<div class="col-lg-8"> 
						
						<!-- Date Filtering--> 
						<!-- <form method="post" action=""> 
							<input type="quantity"
								class="form-control"
								name="quantity"> -->
						
							 <div class="col-lg-4"
								method="post"> 
								<a href="add.php"><input type="submit"
								class="btn btn-danger float-left"
								name="btn" value="Назад"> </a> 
							</div> 
						</form> 
					</div> 
				</div> 
			</div> 
		</div>

		<!-- Grocery Cards --> 
		<div class="row mt-4"> 
			<?php 
				while ($qq=mysqli_fetch_array($query)) 
				{ 
			?> 

			<div class="col-lg-4"> 
				<div class="card"> 
					<div class="card-body"> 
						<h5 class="card-title"> 
							<?php echo $qq['title']; ?> 
						</h5> 
						<h6 class="card-subtitle mb-2 text-muted"> 
							<?php echo
							$qq['author']; ?> 
						</h6> 
                        <h6 class="card-subtitle mb-2 text-muted"> 
							<?php echo
							$qq['year_publication']; ?> 
						</h6>
						<?php 
						if($qq['quantity'] == 0) { 
						?> 
						<p class="text-info">Нет в наличии</p> 

						<?php 
						} else if($qq['quantity'] >= 1) { 
						?> 
						<!-- //<p class="text-success">Можно взять</p> 						 -->
						<form method="POST" action="">
							<input type="hidden" value="<?php echo $qq['book_id']; ?>" name="book_id">
							<input type="hidden" value="<?php echo $qq['quantity']; ?>" name="quantity">
							<input type="submit" value="Можно взять" name="btn_quantity">
						</form>
							


						<?php } ?>  
						<form method="POST" action="">
							<input type="hidden" value="<?php echo $qq['book_id']; ?>" name="book_id">							
							<input type="submit" value="Удалить" name="btn_delete">
						</form>
						 <!-- <input type="button" value="Удалить">  -->
						 <!-- <a href=    
						 "delete.php?book_id=<?php echo $qq['book_id']; ?>" 
							class="card-link"> 
							Удалить
						</a> 
						 <a href= 
						"update.php?book_id=<?php echo $qq['book_id']; ?>"
							class="card-link"> 
							Обновить 
						 </a>  -->
					</div> 
				</div><br> 
			</div> 
			<?php 
			} 
			?> 


<?php 
	if(isset($_POST["btn_quantity"])) { 
		include("connect.php"); 
		$book_id=$_POST['book_id']; 
		$new_quantity=$_POST['quantity'] - 1; 


		$q="UPDATE `book` 
        SET `quantity` = '$new_quantity' 
        WHERE `book`.`book_id` = '$book_id';"; 

		mysqli_query($con,$q); 
		// echo "<pre>".print_r($_POST)."</pre>";
		//header("location:index.php"); 
	} 

?> 
						
<?php 
	if(isset($_POST["btn_delete"])) { 
		include("connect.php"); 
		$book_id=$_POST['book_id']; 
		


		$q="DELETE FROM `book` 
        WHERE `book`.`book_id` = '$book_id';"; 

		mysqli_query($con,$q); 
		// echo "<pre>".print_r($_POST)."</pre>";
		//header("location:index.php"); 
	} 

?> 

		</div> 
	</div> 
</body> 

</html>
