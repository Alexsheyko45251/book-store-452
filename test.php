<?php
$title = "Запит Виконано!";
require_once "./template/header.php";
?>

<?php

$login= $_POST['login'];
$password= $_POST['password'];

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'vowander_test'; // Имя БД
$db_table = "users"; // Имя Таблицы БД// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli->connect_error)
{
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$result = $mysqli->query("INSERT INTO  users (login, password) VALUES ('$login','$password')");

//require_once 'index.php';
?>


    <p class="lead text-success">Зміни виконані, буль ласка перезайдіть в аккаунт! </p>
    <a class="btn btn-primary" href="/auth/profile.php">Уввійти за новими данними</a>
<?php
require_once "./template/footer.php";
?>