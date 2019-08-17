<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Hapus Req Bahan Baku</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>


<?php
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$id_req_bbaku  =$db->escape_string($_POST["id_req_bbaku"]);
		// Susun query delete
		$sql="DELETE FROM req_bbaku WHERE id_req_bbaku='$id_req_bbaku'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0) // jika ada data terhapus
				echo "<script>alert('Data berhasil dihapus');</script>";
				echo "<script>location='reqbbaku.php';</script>";
		}
		else{ // gagal query
			echo "Data gagal dihapus. <br>";
		}
		
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>