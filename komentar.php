<?php
	include('conn.php');
	session_start();
	$nama = $_SESSION['nama'];
	$result = mysqli_query($db, "SELECT * FROM t_jurnal1 WHERE nama = '$nama'; ");
	$row = mysqli_fetch_array($result);

	if (isset($_POST['subkom'])) {
		$komentar = $_POST['komentar'];

		if (str_word_count($komentar)<5) {
			echo "<script language='javascript'>alert('Komentar terlalu pendek');
					document.location('komentar.php');</script>";
		}

		if (str_word_count($komentar)>= 5) {
			mysqli_query($db, "UPDATE t_jurnal1 SET komentar='$komentar' WHERE nama = '$nama'; ");
			echo "<script language='javascript'>alert('Komentar berhasil dibuat');</script>";
			header('Location: hasil.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="komentar.php"> 
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php printf ("%s",$row["nama"]); ?></td>
			</tr>
			<tr>
				<td>Komentar</td>
				<td>:</td>
				<td><textarea name="komentar"></textarea></td>
			</tr>
			<tr>
				<td><button type="submit" name="subkom">SUBMIT</button></td>
			</tr>
		</table>
	</form>
</body>
</html>