<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Req Bahan Baku</title></head>
<body>

<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_bbaku	   =$db->escape_string($_POST["id_bbaku"]);
		$jumlah        =$db->escape_string($_POST["jumlah"]);

		// Susun query insert
		$sql="INSERT INTO req_bbaku(id_bbaku,jumlah)
			  VALUES('$id_bbaku','$jumlah')";
		// Eksekusi query insert
		$res=$db->query($sql);
		echo "<script>alert('Data berhasil tersimpan');</script>";
		echo "<script>location='reqbbaku.php';</script>";
	
		}	
	
	else{
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
	}
}
?>
</body>
</html>
