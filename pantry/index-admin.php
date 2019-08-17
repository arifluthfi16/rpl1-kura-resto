<?php
	session_start();
	if(!isset($_SESSION["id_admin"]))
		header("Location: index.php?error=4");
?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pengelolaan Data</title></head>
<body>
<?php banner();?>
<?php navigator();?>

<h1>Menu Administrator</h1>
Selamat Datang <?php echo $_SESSION["username"];?><br>
Silahkan pilih aktivitas yang ingin ada lakukan dengan mengklik menu yang ada.

</body>
</html>