<?php
	$db = mysqli_connect('localhost', 'root', '', 'd_modul5');
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>