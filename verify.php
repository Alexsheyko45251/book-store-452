<?php
	$email = $_POST['inputEmail'];
	$pswd = $_POST['inputPasswd'];

	$conn = mysqli_connect("localhost", "root", "", "www_project");
	if(!$conn){
		echo "Не вдається підключитися до бази даних " . mysqli_connect_error($conn);
		exit;
	}

	$query = "SELECT username, password FROM admin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty!";
		exit;
	}

	while ($row = mysqli_fetch_assoc($result)){
		if($email == $row['username'] && $pswd == $row['password']){
			echo "Ласкаво просимо адміністратора! Давно не бачились ";
			break;
		}
	}
?>