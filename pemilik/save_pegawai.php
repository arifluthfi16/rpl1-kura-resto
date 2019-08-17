<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Pegawai</title></head>
<body>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_pegawai  =$db->escape_string($_POST["id_pegawai"]);
		$n_pegawai	 =$db->escape_string($_POST["n_pegawai"]);
		$jabatan     =$db->escape_string($_POST["jabatan"]);
		$username  	 =$db->escape_string($_POST["username"]);
		$password	 =$db->escape_string($_POST["password"]);
		// Susun query insert
		$sql="INSERT INTO pegawai(id_pegawai, n_pegawai, jabatan, username, password)
			  VALUES('$id_pegawai', '$n_pegawai', '$jabatan', '$username', '$password')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ 
				// jika ada penambahan data
				header("Location: pegawai.php");
			}
		} else {
			header("Location: pegawai.php");
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
