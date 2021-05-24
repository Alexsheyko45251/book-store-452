
<?php
$title = "mail";
require_once "./template/header.php";
?>

<?php

$inputName= $_POST['inputName'];
$inputEmail= $_POST['inputEmail'];
$textArea= $_POST['textArea'];

$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'www_project'; // Имя БД
$db_table = "mail"; // Имя Таблицы БД

// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
// Если есть ошибка соединения, выводим её и убиваем подключение
if ($mysqli->connect_error)
{
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$result = $mysqli->query("INSERT INTO  mail (inputName, inputEmail, textArea ) VALUES ('$inputName','$inputEmail','$textArea')");

//require_once 'index.php';
?>
<p class="lead text-success">Ваше повідомлення успішно доставлено, дякуємо за звернення, очікуйте нашого листа! </p>
<?php
require_once "./template/footer.php";
?>