<?php session_start();?>
<?php require_once '../functions/connect.php';?>
<!DOCTYPE html>
<html>
    <head>
<meta charsed="UTF-8">
<title>Административная панель.</title>
    </head>
    <body>
    < style="text-align:center">
<h1>Редактирование контактной информации.</h1>
<?php
if(!empty($_SESSION["login"])) :?>

<?php echo "Добрый день,".$_SESSION['login'];?>
<br>
<a href="/logout.php">Выйти</a>
<br>
<?php 

$sql=$pdo->prepare(query:"SELECT * FROM contact");
$sql->execute();
$res=$sql->fetch(PDO::FETCH_OBJ);

?>

<form action="/admin/contact/contact.php" method="post">

<input type="text" name="city" value="<?php echo $res->city?>">
<input type="text" name="phone" value="<?php echo $res->phone?>">
<input type="text" name="email" value="<?php echo $res->email?>">

<input type="submit" value="Сохранить">
</form>


<?php
else:
    echo '<h2>Доступ ограничен</h2>';
    echo '<a href="/">На главную</a>';
?>


<?php endif ?>
</div>
</body>
</html>