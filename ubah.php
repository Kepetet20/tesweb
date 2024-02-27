<?php 

session_start();
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

//ambil data daru URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id") [0];

//cek apakah tombol submit sudah di tekan atau belum
if ( isset($_POST["submit"]) ) {

	//cek apakah data berhasil di ubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal diubah!');
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
	<title>ubah data</title>
</head>
<style>
	body {
		background-color: goldenrod;
	}
</style>
<body>
	<h1>ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">NAMA : </label>
				<input type="text" name="nama" id="nama"
				required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim"
				required value="<?= $mhs["nim"]; ?>">
			</li>
			<li>
				<label for="email">EMAIL : </label>
				<input type="text" name="email" id="email"
				required value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">JURUSAN : </label>
				<input type="text" name="jurusan" id="jurusan"
				required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">GAMBAR : </label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>
			<br>
		</ul>
	</form>
</body>
</html>