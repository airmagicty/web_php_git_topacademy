
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Форма регистрации</title>
</head>
<body>
	<div class="form-container">
		<form>
			<h2>Регистрация</h2>
		<div class="form-group">
			<label for="name">Придумайте логин</label>
			<input type="text" id="name" required>
		</div>
		<div class="form-group">
			<label for="e-mail">Введите адрес E-mail</label>
			<input type="email" id="e-mail" required>
		</div>
		<div class="form-group">
			<label for="password">Придумайте пароль</label>
			<input type="password" id="password" required>
		</div>
		<div class="form-group">
			<label for="confirm-password">Повторите пароль</label>
			<input type="password" id="confirm-password" required>
		</div>
	<div class="form-group">
		<label for="persd">Принимаю согласие на обработку перс.данных</label>
		<input type="checkbox" id="persd" required>
	</div>
	<button>Зарегистрироваться</button>
		</form>
	</div>
	<style>
/* Общие стили */
body {
  font-family: Arial, sans-serif;
  background-color: #fafafa;
  color: #333;
  line-height: 1.5;
}

/* Форма */
.form-container {
  max-width: 350px;
  margin: 30px auto;
  padding: 30px;
  background-color: #fff;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

/* Заголовок формы */
.form-container h2 {
  margin-top: 0;
  margin-bottom: 20px;
  font-size: 20px;
  font-weight: normal;
  text-align: center;
  color: #009ffc;
}

/* Группы элементов формы */
.form-group {
  margin-bottom: 15px;
}

/* Поля ввода */
input,
textarea {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
  outline: none;
}

/* Лейблы */
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

/* Кнопка */
button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #009ffc;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button:hover {
  background-color: #0086d4;
}

/* Проверка согласия */
#persd {
  margin-right: 5px;
}
	</style>



</body>
</html>