<?php
  error_reporting(E_ALL);
  session_start();
  require_once 'config.php';
  $login = $_POST['login'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];
  $year_of_birth = $_POST['year_of_birth'];
  $number = 0;
  $thisyear = date('Y');
  if (empty($year_of_birth)){
    $_SESSION['message'] = 'Виберіть рік народження!';
    header('Location: ../registration.php');
    exit();
  }
  $age = $thisyear - $year_of_birth;

  if($age < 5){
        $_SESSION['message'] = 'Мало символів!';
        header('Location: ../registration.php');
        exit();
  } else if($age > 150){
        $_SESSION['message'] = 'Забагато символів!';
        header('Location: ../registration.php');
        exit();
  }
  $result_query = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
  if($result_query->num_rows == 1){
    if(($row = $result_query->fetch_assoc()) != false){
            $_SESSION['message'] = 'Користувач з таким логіном уже існує, спробуйте інший!';
            header('Location: ../registration.php');
    }else{
      $_SESSION['message'] = 'Помилка запросу до баз даних!';
      header('Location: ../registration.php');
    }
    $result_query->close();
    exit();
  }

  if ($password === $password_confirm) {
        $mysql->query("INSERT INTO `users` (`login`, `password`, `year_of_birth`, `number`)
        VALUES('$login', '$password', '$year_of_birth', '$number')");
        $mysql->close();
        $_SESSION['message'] ='Ви успішно зареєструвалися!';
        header("Location: ../index.php");
        exit;


  } else {
    $_SESSION['message']='помилка реєстрації!';
    header('Location: ../registration.php');
    exit();
  }
  ?>
