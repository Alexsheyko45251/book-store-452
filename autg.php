<?php
$title = "Купівлі за isbn";
require_once "./template/header.php";
?>

<?php

$book_isbn= $_GET['book_isbn'];

$conn = mysqli_connect("localhost", "root", "root", "www_project");
if (!$conn) {
    echo "Can't connect database " . mysqli_connect_error($conn);
    exit;
}

$sql = "SELECT orderid, book_isbn, item_price, quantity  FROM order_items WHERE book_isbn = '$book_isbn' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "

<table border='2' class='text-center'><?php ?>
<br>
   <h1 class='text-center'> Перелік замовників за  $book_isbn </h1> <?php 
<br>

            <tr> 
                <th> id користувача       </th> 
                <th></th>
                <th> ISBN книги      </th> 
                <th></th>
                <th> Ціна книги, $        </th> 
                <th></th>
                <th> Кількість</th>
                <th></th>
                <th> Сумма, $ </th>
                <th></th>
                   </tr>


";

    // Вывод данных строк
    while($row = $result->fetch_assoc()) {
        echo
            "<tr>
            <td>".$row["orderid"]."</td> 
            <td></td>
            <td>".$row["book_isbn"]."</td> 
            <td></td>
            <td>".$row["item_price"]." </td> 
            <td></td>      
            <td>".$row["quantity"]."</td>  
            <td></td> 
            <td> ". "$" . $row["quantity"] * $row["item_price"]."</td>
            <td></td> 
            </tr>";


    }
    echo "</table>";
} else {
    echo "0 results";
};
$conn->close();

?>
<br>
<br>
    <a href="admin_book.php" class="btn btn-primary">Повернутися до головної сторінки Адмінастратора</a>
    <a href="cab_1.php" class="btn btn-primary">Повернутися назад</a>
<?php
require_once "./template/footer.php";
?>