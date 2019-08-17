<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Hapus Data Pegawai</title></head>
<body>
<?php
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$id_pegawai  =$db->escape_string($_POST["id_pegawai"]);
		// Susun query delete
		$sql="DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0) // jika ada data terhapus
				header("Location: pegawai.php");
			else // Jika sql sukses tapi tidak ada data yang dihapus
				header("Location: pegawai.php");
		}
		else{ // gagal query
			header("Location: pegawai.php");
		}
		header("Location: pegawai.php");
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>