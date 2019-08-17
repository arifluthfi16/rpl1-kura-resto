<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Hapus Data Meja</title></head>
<body>
<?php
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$no_meja  =$db->escape_string($_POST["no_meja"]);
		// Susun query delete
		$sql="DELETE FROM meja WHERE no_meja='$no_meja'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0) // jika ada data terhapus
				header("Location: meja.php");
			else // Jika sql sukses tapi tidak ada data yang dihapus
				header("Location: meja.php");
		}
		else{ // gagal query
			header("Location: meja.php");
		}
		header("Location: meja.php");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>