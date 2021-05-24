<?php
session_start();
if($_SESSION['user']){
    header('location: profile.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сторінка авторизації</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <form action="vendor/singin.php" method="POST">

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
       <input type="checkbox" value="remember-me" value="1"> Запам'ятати мене


        <button type="submit" href="/index.php" >Увійти</button>

        <a class="btn" href="/auth/registration.php">Зареєструватися</a>
    </form>
</body>
</html>
