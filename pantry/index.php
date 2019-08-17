<?php include_once("functions.php");?>
<!doctype html>
<html lang="en">
  <head>
  	<title>
  		Login
  	</title>
  </head>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="pantry.css">
<?php banner();?>

<?php
	if (isset($_GET["error"])) {
		$error = $_GET["error"];
	if ($error == 1)
		showError("IdPegawai dan password tidak sesuai.");
	else if ($error == 2)
		showError("Error database. Silahkan hubungi administrator");
	else if ($error == 3)
		showError("Koneksi ke Database gagal. Autentikasi gagal.");
	else if ($error == 4)
		showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login.
	Silahkan login terlebih dahulu.");
	else
		showError("Unknown Error.");
	}
?>

<body>
<div class="isi">
	<div class="login">
		<div class="container">
		    <form method="post" name="f" action="login.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" name="username" class="form-control">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control">
			  </div>
			  <button type="submit" name="TblLogin" class="btn btn-primary" value="Login">Login</button>
			</form>
		</div>
	</div>
</div>
	    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
	if($_SERVER["REMOTE_ADDR"]=="23.95.44.165")
		{ 
			echo "<div>Data login<br>"; 
			echo "Username : fauziganteng <br>"; 
			echo "Password : 1234"; 
			echo "</div>"; 
		} 
?>
</body>
</html>