<?php
header('Content-Type: text/html; charset=utf-8');

?>
<html>
<head>
<link rel="shortcut icon" href="icon.png" type="image/png"/>
<title>Check Out</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body class= "back"/>
<body>
<form  class="cont" action="add.php" method="post">
<label>Имя Фамилия:</label>
<input type="text" name="user_name"/><br>
<label>Email:</label>
<input type="text" name="email"/><br>
<label>Страна:</label>
<input type="text" name="country"/><br>
<label>Город:</label>
<input type="text" name="city"/><br>
<label>Улица, дом/строение, квартира:</label>
<input type="text" name="address"/><br>
<input type="submit" name=submit value="Отправить"/>
</form>
</body>

</html>
