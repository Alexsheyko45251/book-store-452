<?php
	session_start();

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}
	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase Process";
	require "./template/header.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);
	// validate post section

	//$card_number = $_POST['card_number'];
	//$card_PID = $_POST['card_PID'];
	//$card_expire = strtotime($_POST['card_expire']);
	//$card_owner = $_POST['card_owner'];

	// find customer
$query = "INSERT INTO customers (name, address, city, zip_code, country)
        VALUES ('" . $name . "', '" . $address . "', '" . $city . "', '" . $zip_code . "', '" . $country . "')";
	//$customerid = getCustomerId($name, $address, $city, $zip_code, $country);
	//if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($name, $address, $city, $zip_code, $country);
	//}

	$date = date("Y-m-d");
	insertIntoOrder($conn, $customerid, $_SESSION['total_price'], $date, $name, $address, $city, $zip_code, $country);
	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $customerid);
	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES
	    ('$orderid', '$isbn', '$bookprice', '$qty')";
        //$query = "INSERT INTO order_items ( book_isbn, item_price, quantity) VALUES
   // ('$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Вставити значення false! " . mysqli_error($conn);
			exit;
		}
	}


	foreach ($_SESSION['cart'] as $isbn => $qty){
        $ibns += $qty;
        $conn = db_connect();
        $book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
    }

$query = "UPDATE books SET book_kol = book_kol - $qty WHERE book_isbn = '$isbn'";
$result = mysqli_query($conn, $query);
if(!$result){
    echo "<span class='lead text-center' style='color:#0000ff;'>Недостатьня кількість товару на складі, замовте іншу кількість!</span>";
}
else {!$result>=0;
    echo "<span class='lead text-center'  style='color:#0000ff;'>Ваше замовлення успішно оброблено. Будь ласка, перевірте свою електронну адресу, щоб отримати підтвердження замовлення та деталі доставки !.
        Ваш кошик порожній.
        </span>
        ";
}

return $result;

	session_unset();
?>
	<p class="lead text-success">Ваше замовлення успішно оброблено. Будь ласка, перевірте свою електронну адресу, щоб отримати підтвердження замовлення та деталі доставки !.
        Ваш кошик порожній. </p>
<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>