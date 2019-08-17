<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Meja</title></head>
<body>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$no_meja        =$db->escape_string($_POST["no_meja"]);
		$username_meja	=$db->escape_string($_POST["username_meja"]);
		$password_meja  =$db->escape_string($_POST["password_meja"]);
		// Susun query insert
		$sql="INSERT INTO meja(no_meja, username_meja, password_meja)
			  VALUES('$id_pegawai', '$username_meja', '$password_meja')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ 
				// jika ada penambahan data
				header("Location: meja.php");
			}
		} else {
			header("Location: meja.php");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
