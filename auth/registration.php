<?php
    session_start();
    /*if($_SESSION['user']){
        header('Location: profile.php');
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сторінка реєстрації нового користувача</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <form action="vendor/singup.php" method="POST">
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>

        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть логін" >
        <label class="cy">Рік народження</label>

        <?php $yearArray = range(date('Y'), 1500); ?>
        <select name="year_of_birth">
            <option class="che" value="">Виберіть дату народження</option>
            <?php
            foreach ($yearArray as $year) {
                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
            }
            ?>
        </select>

        <label for="">Пароль</label>
        <input type="password" minlength="3" maxlength="10" name="password" placeholder="Введіть пароль">
        <label for="">Повторіть пароль</label>
        <input type="password" minlength="3" maxlength="10" name="password_confirm" placeholder="Введіть пароль">
        <button type="submit" href="/index.php">Реєстрація</button>
        <a class="btn" href="/auth/index.php">Увійти</a>
   </form>
</body>
</html>
