<?php
$title = "Виконані операції";
require_once "./template/header.php";
?>



<?php
$conn = mysqli_connect("localhost", "root", "root", "www_project");
if(!$conn){
    echo "Can't connect database " . mysqli_connect_error($conn);
    exit;
}

$ship_name= $_GET['ship_name'];

$sql = "SELECT orderid, ship_name, total_price, ship_address, date, ship_city, ship_zip_code, ship_country   FROM orders WHERE ship_name= '$ship_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "

<table border='2'>
<h1 class='text-center'> Перелік замовників за  $ship_name </h1> <?php
            <tr> 
                <th> id користувача       </th> 
                <th></th>
                <th> Ім'я користуача      </th> 
                <th></th>
                <th> Сумма купівлі , $         </th> 
                <th></th>
                <th> Адреса користувача </th> 
                <th></th>
                <th> Дата купівлі </th> 
                <th></th>
                <th> Місто одержувача</th>  
                <th></th>  
                <th> Код пошти</th> 
                <th></th>
                <th> Країна одержувача</th>         
                   </tr>
";

    // Вывод данных строк
    while($row = $result->fetch_assoc()) {
        echo
            "<tr>
            <td>".$row["orderid"]."</td> 
            <td></td>
            <td>".$row["ship_name"]."</td> 
            <td></td>
            <td>".$row["total_price"]." </td> 
            <td></td>
            <td>".$row["ship_address"]."</td> 
            <td></td>
            <td>".$row["date"]."</td> 
            <td></td>
            <td>".$row["ship_city"]."</td> 
            <td></td>
            <td>".$row["ship_zip_code"]."</td> 
            <td></td>
            <td>".$row["ship_country"]."</td>      
               
            </td></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();









?>
<br>
<br>
<a href="cab.php" class="btn btn-primary">Повернутися назад</a>














<?php
require_once "./template/footer.php";
?>
