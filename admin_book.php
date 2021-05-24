<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="admin_add.php">Редагування товарів</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Вихід з панелі управління</a>
    <a href="admin_check.php" class="btn btn-primary">перелік замовлень</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Заголовок</th>
			<th>Автор</th>
			<th>Зображення</th>
			<th>Зміст</th>
			<th>Ціна</th>
			<th>Автор</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['book_isbn']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['book_author']; ?></td>
			<td><?php echo $row['book_image']; ?></td>
			<td><?php echo $row['book_descr']; ?></td>
			<td><?php echo $row['book_price']; ?></td>
			<td><?php echo getPubName($conn, $row['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>">Додати</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>">Видалити</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>