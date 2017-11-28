<?php
	header('Content-Type: text/html; charset=utf-8');
    session_start();
	if (isset($_POST['login']))
	{
		$login = $_POST['login'];
		if ($login == '')
		{
			unset($login);
		}
	}
	if (isset($_POST['password']))
	{
		$password=$_POST['password'];
		if ($password =='')
		{
			unset($password);
		}
	}
	if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
		exit ();
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$login = trim($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
     //Подключаемся к базе данных.
    $dbcon = mysql_connect("localhost", "имя администратора базы", "пароль администратора базы"); 
    mysql_select_db("имя базы данных", $dbcon);
	if (!$dbcon)
	{
    echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysql_error(); exit();
    } else {
    if (!mysql_select_db("имя базы данных", $dbcon))
    {
    echo("<p>Выбранной базы данных не существует!</p>");
    }
	}
 //извлекаем из базы все данные о пользователе с введенным логином
$result = mysql_query("SELECT * FROM имя таблицы WHERE login='$login'", $dbcon);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"]))
    {
    //если пользователя с введенным логином не существует
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow["password"]==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow["login"];
	$_SESSION['password']=$myrow["password"];
    $_SESSION['id']=$myrow["id"];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
	header("Location: login.php"); 
    }
 else {
    //если пароли не сошлись

    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    }
    ?>