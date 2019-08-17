<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Meja</title></head>
<body>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$no_meja        =$db->escape_string($_POST["no_meja"]);
		$username_meja  =$db->escape_string($_POST["username_meja"]);
		$password_meja  =$db->escape_string($_POST["password_meja"]);
		// Susun query update
		$sql="UPDATE meja SET 
			  username_meja='$username_meja', password_meja='$password_meja'
			  WHERE no_meja='$no_meja'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				header("Location: meja.php");
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				header("Location: meja.php");
			}
		}
		else{ // gagal query
			header("Location: meja.php");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>