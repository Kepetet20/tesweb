<?php 
session_start();
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}


require 'functions.php';

if( isset ($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	}else {
		echo mysqli_error($conn);
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<style>
		body {
			background-color: goldenrod;
			width: 25%;
  			padding: 12px;
  			border: 1px solid #ccc;
  			border-radius: 20px;
 			box-sizing: border-box;
  			resize: vertical;
		}
		label {
			display: block;
		}
		ul {
  		list-style-type: none;
		}
		}
	</style>
</head>
<body>
	<h1>Halaman Registrasi</h1>

	<form action="" method="post">
		
		<ul>
			<li>
				<label for="username">username</label>
				<input type="text" name="username" id="username">
			</li>

			<li>
				<label for="password">password</label>
				<input type="password" name="password" id="password">
			</li>
				<li>
				<label for="password2">konfirmasi password</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="register">Register</button>
			</li>
		</ul>

	</form>

</body>
</html>