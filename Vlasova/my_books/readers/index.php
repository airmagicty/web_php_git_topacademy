<?php 
	include("connect.php"); 

	if (isset($_POST['btn'])) { 
		$quantity=$_POST['quantity']; 
		$q="select * from book where quantity='$quantity'"; 
		$query=mysqli_query($con,$q); 
	} 
	else { 
		$q= "select * from book"; 
		$query=mysqli_query($con,$q); 
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
						<form method="post" action=""> 
							<input type="year"
								class="form-control"
								name="year_publication"> 
						
							<div class="col-lg-4"
								method="post"> 
								<input type="submit"
								class="btn btn-danger float-right"
								name="btn" value="filter"> 
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
						<p class="text-success">Можно взять</p> 


						<?php } ?> 
						<a href= 
						"delete.php?id=<?php echo $qq['Id']; ?>"
							class="card-link"> 
							Удалить
						</a> 
						<a href= 
						"update.php?book_id=<?php echo $qq['book_Id']; ?>"
							class="card-link"> 
							Обновить 
						</a> 
					</div> 
				</div><br> 
			</div> 
			<?php 
			} 
			?> 
		</div> 
	</div> 
</body> 

</html>
