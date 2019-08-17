<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Req Bahan Baku</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_req_bbaku  		 =$db->escape_string($_POST["id_req_bbaku"]);
		$jumlah	  			 =$db->escape_string($_POST["jumlah"]);
	
	
		// Susun query update
		$sql="UPDATE req_bbaku SET jumlah='$jumlah' WHERE id_req_bbaku='$id_req_bbaku'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data dan alihkan ke halaman req bbaku
				echo "<script>alert('Data Req Bahan Baku Sudah ditambah');</script>";
				echo "<script>location='reqbbaku.php';</script>";
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				echo "<script>alert('Data berhasil terupdate namun tidak mengalami perubahan, edit kembali');</script>";
				echo "<script>location='javascript:history.back()';</script>";
			}
		}
		else{ // gagal query
			echo "<script>alert('Data gagal diupdate');</script>";
			echo "<script>location='javascript:history.back()';</script>";
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>