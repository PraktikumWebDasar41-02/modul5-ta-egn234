<?php
	include('conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="login.php">
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="date" name="tgl_lahir"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<input type="radio" name="jk" value="Laki-Laki" checked>Laki-Laki<br>
					<input type="radio" name="jk" value="Perempuan">Perempuan<br>
				</td>
			</tr>
			<tr>
				<td>Program Studi</td>
				<td>:</td>
				<td>
					<select name="prodi">
						<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
						<option value="S1 Teknik Telekomunikasi">S1 Teknik Telekomunikasi</option>
						<option value="S1 Sistem Komputer">S1 Sistem Komputer</option>
						<option value="S1 Desain Komunikasi Visual">S1 Desain Komunikasi Visual</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>:</td>
				<td>
					<select name="fakultas">
						<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
						<option value="Fakultas Informatika">Fakultas Informatika</option>
						<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
						<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" name="submit">SUBMIT</button></td>
			</tr>
		</table>
	</form>

	<?php 
		if (isset($_POST['submit'])) {
			$nama = $_POST['nama'];
			$nim = $_POST['nim'];
			$email= $_POST['email'];
			$tl = $_POST['tgl_lahir'];
			$jk = $_POST['jk'];
			$prodi = $_POST['prodi'];
			$fakultas = $_POST['fakultas'];


			if (strlen($nama)>20) {
				echo "<script language='javascript'>alert('nama terlalu panjang');
						document.location('login.php');</script>";
			}
			if (is_numeric($nama)) {
				echo "<script language='javascript'>alert('nama mengandung angka');
						document.location('login.php');</script>";
			}
			if (strlen($nim)>10) {
				echo "<script language='javascript'>alert('nim maksimal 10 angka');
						document.location('login.php');</script>";
			}
			if (!is_numeric($nim)) {
				echo "<script language='javascript'>alert('nim bukan angka');
						document.location('login.php');</script>";
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script language='javascript'>alert('email tidak valid');
						document.location('login.php');</script>";
			}
			if (strlen($nama)<=20 && strlen($nim)<=10 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				session_start();
				$_SESSION['nama'] = $nama;
				mysqli_query($db, "INSERT INTO t_jurnal1(nim, nama, email, jk, ttl, prodi, fakultas) VALUES('$nim', '$nama', '$email', '$jk', '$tl', '$prodi', '$fakultas');");
				
				echo "<script language='javascript'>alert('berhasil');</script>";
				header('Location: komentar.php');
			}
		} 
	?>
</body>
</html>