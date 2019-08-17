<?php include_once("../functions.php"); ?>
<?php
$db=dbConnect();
if($db->connect_errno == 0){
	if(isset($_POST["TblLogin"])){
		$username_meja = $db->escape_string($_POST["username_meja"]);
		$password_meja = $db->escape_string($_POST["password_meja"]);
		$sql="SELECT * FROM meja WHERE username_meja='$username_meja' and password_meja='$password_meja'";
		$res=$db->query($sql);
		if($res){
			if($res->num_rows==1){
				$data=$res->fetch_assoc();
				session_start();
				$_SESSION["no_meja"] = $data["no_meja"];
				header("Location: ../pelanggan/menu_utama.php");
			}
			else
				echo "<script>alert('Username atau Passsword salah !');history.go(-1);</script>";
		}
	}
	else
		echo "<script>alert('Error database. Silahkan hubungi administrator');history.go(-1);</script>";
}
else
	echo "<script>alert('Koneksi ke Database gagal. Autentikasi gagal');history.go(-1);</script>";
?>