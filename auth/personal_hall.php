<!DOCTYPE html>
<html>
<body>
<?php


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


if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['id']) && isset($_POST['year_of_birth'])) {

    $id = htmlentities(mysqli_real_escape_string($mysqli, $_POST['id']));
    $login = htmlentities(mysqli_real_escape_string($mysqli, $_POST['login']));
    $password = htmlentities(mysqli_real_escape_string($mysqli, $_POST['password']));
    $year_of_birth = htmlentities(mysqli_real_escape_string($mysqli, $_POST['year_of_birth']));

    $query = "UPDATE users SET login='$login', password='$password' WHERE id='$id', year_of_birth='$year_of_birth',";
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));

    if ($result)
        echo "<span style='color:#0000ff;'>Данные обновлены</span>";

}



if(isset($_GET['id'])) {
    $id = htmlentities(mysqli_real_escape_string($mysqli, $_GET['id']));

    // создание строки запроса
    $query = "SELECT * FROM users WHERE id = '$id'";
    // выполняем запрос
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli));
    //если в запросе более нуля строк
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $login = $row[1];
        $password = $row[2];
        $year_of_birth = $row[3];


        echo "<h2>Змінити особисті данні</h2>

        <form method='POST'>
                <input type='hidden' name='id' value='$id' />
                <p>Введіть логін:<br>
                    <input type='text' name='login' value='$login' /></p>
                <p>Введіть пароль: <br>
                    <input type='text' name='password' value='$password' /></p>
                <p>Введіть Дату народження: <br>
                    <input type='date' name='year_of_birth' value='$year_of_birth' /></p>
                <input type='submit' value='Сохранить'>
            </form>";

mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($mysqli);

?>
</body>
</html>

