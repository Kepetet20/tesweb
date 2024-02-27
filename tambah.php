<?php 
session_start();
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
//cek apakah tombol submit sudah di tekan atau belum
if ( isset($_POST["submit"]) ) {

	//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil di tambahkan!');
			document.location.href = 'index.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal di tambahkan!');
			document.location.href = 'index.php';
		</script>
		";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tambah data</title>
	<style>
		body {
		background-color: goldenrod;
		}
		label {
			display: block;
		}
		ul li {
			list-style-type: none;
		}
	</style>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">NAMA : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim">
			</li>
			<li>
				<label for="email">EMAIL : </label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan">JURUSAN : </label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar">GAMBAR : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
			<br>
		</ul>
	</form>
</body>
</html>