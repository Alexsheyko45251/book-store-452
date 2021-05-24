<?php

$login=$_GET['login'];

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'vowander_test'; // Имя БД
$db_table = "users";
// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli->connect_error)
{
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$login = "не определено";

if(isset($_GET["name"])){


}
echo "Особистий кабінет користувача " . $user['login'];;



?>