<?php  
session_start();
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';
$mahasiswa = query("SELECT * FROM Mahasiswa");

//tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}



?>
 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
</head>
<style>
	body {
			background-color: goldenrod;
	}
	@media print {
		.logout {
			display: none;
		}
	}
</style>
<body>

	<h1>Daftar Mahasiswa</h1>
	<h1>data pribadi</h1>
	<h1>Universitas ilmu komputer</h1>
	<p>Welcome Administrator</p>

	<a href="tambah.php">Tambah data mahasiswa</a>
	<br><br>

	<form action="" method="POST">
		<input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
	</form>

	<br><br>
	<div id="container">
	<table border="1" cellpadding="10" cellspacing="0"> 
		<tr>
			<th>No.</th>
			<th>aksi</th>
			<th>Gambar</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php  foreach( $mahasiswa as $row ) :?>
		<tr>
			<td><?= $i;  ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["nim"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
		
	</table>
	</div>
	<br><br>
	<a href="registrasi.php">Register</a>
	<br><br>
	<a href="logout.php" class="logout">Logout</a>



<script src="js/script.js"></script>
</body>
</html>