<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_GET['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Checking out";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
	<table class="table">
		<tr>
			<th>Товар</th>
			<th>Ціна</th>
	    	<th>Кількість замовлення</th>
	    	<th>Сума</th>
            <th>Кількість товару на складі</th>
            <th>Наявна кількості товару  </th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
		<tr>
			<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
			<td><?php echo "$" . $book['book_price']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "$" . $qty * $book['book_price']; ?></td>
            <td><?php echo $book['book_kol']; ?></td>
            <td><?php echo $book['book_kol'] - $qty;
                if( $book['book_kol'] - $qty<0)
                {
                     echo ' - цієї кількості недостатньо книг на складі!';
                }
                ?></td>

		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<form method="post" action="purchase.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">Всі поля повинні бути заповнені!</p>
            <br>
			<?php } ?>
       <h1> <?php
        if( $book['book_kol'] - $qty<0)
        {
            echo '!!! НЕДОСТАТНЬО КНИГ НА СКЛАДІ !!! ЗМІНІТЬ КІЛЬКІСТЬ КНИГ!!!';
        } ?></h1>
        <br><br>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">ім'я</label>
			<div class="col-md-4">
				<input type="text" name="name" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Адресса</label>
			<div class="col-md-4">
				<input type="text" name="address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">Місто</label>
			<div class="col-md-4">
				<input type="text" name="city" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Поштовий Індекс</label>
			<div class="col-md-4">
				<input type="text" name="zip_code" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Країна</label>
			<div class="col-md-4">
				<input type="text" name="country" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Придбати" class="btn btn-primary">
            <a href="cart.php" class="btn btn-primary">Повернутися назад</a>
		</div>
	</form>
	<p class="lead">Натисніть «Придбати, щоб підтвердити купівлю.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Ваша корзина порожня, добавте в неї товари для оформлення.</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>