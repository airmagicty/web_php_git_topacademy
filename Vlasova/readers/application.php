<?php
include("connect.php"); // Подключение к базе данных

// Запрос для получения списка взятых книг
$query = "SELECT `application`.`application_id`, `book`.`title`, `reader`.`name`, `application`.`data_time`	 
          FROM `application` 
          INNER JOIN `book`  ON `application`.`book_id` = `book`.`book_id`
          INNER JOIN `reader`  ON `application`.`reader_id` = `reader`.`reader_id`;";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список взятых книг</title>
    <link rel="stylesheet" href= 
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/style.css"> 
    
</head>
<body>
    <div class="container mt-5">
        <h1>Список взятых книг</h1>
        <div class="form-group"> 
        <table class="table table-bordered">
            <thead>
                <tr>                   
                    <th>Название книги</th>
                    <th>Читатель</th>
                    <th>Дата взятия</th>
                </tr>

            </thead>
        </div>
            <tbody>
                <?php
                // Проверка наличия записей
                if (mysqli_num_rows($result) > 0) {
                    // Вывод данных каждой строки
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['title']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['data_time']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Нет взятых книг</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="col-lg-4"
			method="post"> 
            <a href="add.php"><input type="submit"
            class="btn btn-danger float-left"
            name="btn" value="Назад"> </a> 
        </div> 
    </div>
    <style>
       .form-group {
        background-color: #fafafa;
       } 
    </style>
</body>
</html>