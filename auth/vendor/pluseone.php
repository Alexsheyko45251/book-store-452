<?php
  session_start();
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $plus_one = $conn->query("UPDATE `books` SET `book_kol` = `book_kol` - $qty from WHERE `book_kol`='$book_kol'");
  header("Location: ../profile.php");
