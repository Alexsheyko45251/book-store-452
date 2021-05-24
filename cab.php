<?php
$title = "Особистий кабінет";
require_once "./template/header.php";
require_once './auth/vendor/config.php';
require_once "./functions/database_functions.php";
$conn = db_connect();
$row = select4LatestBook($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <title>Особистий Кабінет </title>
<?php

$mysql = new mysqli('localhost', 'root', 'root', 'vowander_test');
//$mysql = new mysqli('localhost', 'root', 'root', 'auth');
if(!$mysql){
    echo "Can't connect database " . mysqli_connect_error($mysql);
    exit;
}
?>

    <?php
    $result = $mysql->query("SELECT login FROM users ");
    $user = mysqli_fetch_assoc($result);
   /* $query = "SELECT * FROM users WHERE $login = 'login'";
$result = mysqli_query($mysql, $query);
   var_dump($login);*/
   /* $result = $mysql->query("SELECT login FROM users WHERE login = '$user' ");
    $user = mysqli_fetch_assoc($result);*/
    //var_dump($user);
   ?>



    <H2 class="lead text-center "> <?php echo "Особистий кабінет користувача  ". $user['login'];?>  </H2>
    <br>
    <br>
    <br>
    <table class="table">
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "www_project");
        if(!$conn){
            echo "Can't connect database " . mysqli_connect_error($conn);
            exit;
        }
            ?>
</table>

    <h2 >Ваші Замовлення<img class="img-responsive img-thumbnail" src="./bootstrap/img/author.jpg"  align="right" width="150" height="100"></h2>
    <form action="by.php" method="get" class="form-horizontal">
        <p>Введіть Ім'я замовника:<br>
        <input type="text" name="ship_name" placeholder="">
        <button type="submit" href="by.php" class="btn btn-primary" >Відправити</button>


    </form>

</head>
<body>
<br>
<br>
<form  action="test.php" method="POST" class="form-group">
<div class="c">
    <form>
        <br>
        <div class="form-group">
            <h2>Змінити особисті данні<img class="img-responsive img-thumbnail" src="./bootstrap/img/pass.jpg"  align="right" width="150" height="100"></h2>
            <form method='POST' action="test.php">
                <input type='hidden' name='id' value='$id' />
                <p>Введіть логін:<br>
                    <input type='text' name='login'  id="login"  /></p>
                <p>Введіть пароль: <br>
                    <input type='password' name='password'  id="password" /></p>
                <button type="reset" class="btn btn-primary">Відміна</button>
                <button type="submit"  class="btn btn-primary" >Виконати зміни</button>
            </form>
            <br>
            <br>
            <br>
       </div>
    </form>
       </div>
<div class="r">
</div>
</form>
<br>
         <h2> ПІДПИСУЙТЕСЬ НА РОЗСИЛКУ <img class="img-responsive img-thumbnail" src="./bootstrap/img/mail.jpg"  align="right" width="150" height="300"></h2>
<a та дізнавайтеся про нововини та розпродаж Першим! </a>
<form method='POST' action="news.php">
    <p>Введіть Номер телефону:<br>
        <input type="number" name='numb'  id="numb"  /></p>
    <p>Введіть Ім'я:<br>
        <input type='text' name='nam'  id="nam"  /></p>
    <p>Введіть електронну пошту: <br>
        <input type='text' name='eemail'  id="eemail" /></p>
<br>
    <button type="submit"  class="btn btn-primary" >Відправити данні</button>
<br>
    <br>
</form>
<a class="btn btn-primary" href="/auth/profile.php">Вихід з аккаунту</a>
/   /
<a <button type="submit" href="/cart.php" class="btn btn-primary" >Перейти до Корзини</button></a>
<br>
<br>
<br>
<br>
<br>
<br>
<p class="lead text-center text-muted">Популярні книги які можуть вас зацікавити</p>
<br>
<div class="row">
    <?php foreach($row as $book) { ?>
        <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
                <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
            </a>
        </div>
    <?php } ?>
</div>
</body>
</html>
<?php
require_once "./template/footer.php";
?>
