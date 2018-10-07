<?php
	include('conn.php');
	session_start();
	$nama = $_SESSION['nama'];

	$result = mysqli_query($db, "SELECT * FROM t_jurnal1 WHERE nama = '$nama'; ");
	$row = mysqli_fetch_array($result);
	$nm = $row['nama'];
	$nim = $row['nim'];
	$email= $row['email'];
	$tl = $row['ttl'];
	$jk = $row['jk'];
	$prodi = $row['prodi'];
	$fakultas = $row['fakultas'];
	$komen = $row['komentar'];
	$jml_komen = str_word_count($komen);
	echo "Nama: $nm";
	// printf ("%s",$row["nama"]);
	echo "<br> NIM: $nim";
	echo "<br> Email: $email";
	echo "<br> Tanggal Lahir: $tl";
	echo "<br> Jenis Kelamin: $jk";
	echo "<br> Program Studi: $prodi";
	echo "<br> Fakultas: $fakultas";
	echo "<br> Komentar: $komen";
	// printf ("%s",$row["komentar"]);
	echo "<br> ada $jml_komen kata";

?>