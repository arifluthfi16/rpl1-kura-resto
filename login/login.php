<?php include_once("../functions.php"); ?>
<?php
$db=dbConnect();
if($db->connect_errno == 0){
	if(isset($_POST["TblLogin"])){
		$username=$db->escape_string($_POST["username"]);
		$password=$db->escape_string($_POST["password"]);
		$sql="SELECT * FROM pegawai WHERE username='$username' and password='$password'";
		$res=$db->query($sql);
		if($res){
			if($res->num_rows==1){
				$data=$res->fetch_assoc();
				session_start();
				$_SESSION["id_pegawai"] = $data["id_pegawai"];
				$_SESSION["n_pegawai"] = $data["n_pegawai"];
				$_SESSION["jabatan"] = $data["jabatan"];
				if($data["jabatan"] == "customer service"){
					header("Location: ../customerservice/index.php");
					} else if ($data["jabatan"] == "kasir"){
						header("Location: ../kasir/kasir.php");
						} else if ($data["jabatan"] == "koki"){
							header("Location: ../koki/pesanan-list.php");
							} else if ($data["jabatan"] == "pantry"){
								header("Location: ../pantry/bbaku.php");
								} else if ($data["jabatan"] == "pelayan"){
									header("Location: ../pelayan/pelayan.php");
									} else if ($data["jabatan"] == "pemilik"){
										header("Location: ../pemilik/pemilik.php");
									}
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