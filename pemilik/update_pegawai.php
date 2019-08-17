<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Pegawawi</title></head>
<body>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_pegawai  =$db->escape_string($_POST["id_pegawai"]);
		$n_pegawai	 =$db->escape_string($_POST["n_pegawai"]);
		$jabatan     =$db->escape_string($_POST["jabatan"]);
		$username  	 =$db->escape_string($_POST["username"]);
		$password	 =$db->escape_string($_POST["password"]);
		// Susun query update
		$sql="UPDATE pegawai SET 
			  n_pegawai='$n_pegawai', jabatan='$jabatan', username='$username', password='$password'
			  WHERE id_pegawai='$id_pegawai'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				header("Location: pegawai.php");
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				header("Location: pegawai.php");
			}
		}
		else{ // gagal query
			header("Location: pegawai.php");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>