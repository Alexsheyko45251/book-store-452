<?php
session_start();
error_reporting(E_ALL);
require_once 'vendor/config.php';
if(!$_SESSION['user']){
    header('Location: /');
}

$login = $_SESSION['user']['login'];
//
$result = $mysql->query("SELECT login, number FROM users WHERE login='$login'");
  $user = mysqli_fetch_assoc($result);
  $_SESSION['user'] = [
    "login" => $user['login'],
    "number" => $user['number']
  ];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сторінка Авторизації</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="c">
        <form>
            <h3><?php echo "Вітаємо , ". $user['login']; ?></h3>
            <h3>Ви успішно авторизувалися!</h3>
        <a class="btn" href="/cab.php">Перейти до особистого кабінету</a>
        <a class="btn" href="vendor/logout.php">Вихід з аккаунту</a>
        </form>
    </div>
</body>
</html>
