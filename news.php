<?php
$title = "Запит Виконано!";
require_once "./template/header.php";
?>

<?php
$numb= $_POST['numb'];
$nam= $_POST['nam'];
$eemail= $_POST['eemail'];

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'www_project'; // Имя БД
$db_table = "news"; // Имя Таблицы БД

// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli->connect_error)
{
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$result = $mysqli->query("INSERT INTO  news (numb, nam, eemail ) VALUES ('$numb','$nam','$eemail')");


?>
<p class="lead text-success">Ваші данні успішно доставлено, очікуйте на наші листи! </p>

<?php
require_once "./template/footer.php";
?>














