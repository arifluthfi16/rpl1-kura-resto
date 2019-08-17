<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Hapus Data Belanja</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<div class="container-fluid">
    <?php require_once ('../includes/navbar.php');?>
    <div class="row">
        <div class="col-md-3">
            <?php require_once('side-nav.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="card mt-3">
                <div class="card-header">
                	<ul class="nav nav-pills card-header-pills">
	                	<li class="nav-item">
						    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Hapus Belanja</a>
						</li>
	                    <form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
	                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
	                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari</button>
	                    </form>
	                </ul>
                </div>
                <div class="card-body">
					<?php
					if(isset($_POST["TblHapus"])){
						$db=dbConnect();
						if($db->connect_errno==0){
							$id_belanja  =$db->escape_string($_POST["id_belanja"]);
							// Susun query delete
							$sql="DELETE FROM belanja WHERE id_belanja='$id_belanja'";
							// Eksekusi query delete
							$res=$db->query($sql);
							if($res){
								if($db->affected_rows>0) // jika ada data terhapus
									echo "Data berhasil dihapus.<br>";
								else // Jika sql sukses tapi tidak ada data yang dihapus
									echo "Penghapusan gagal karena data yang dihapus tidak ada.<br>";
							}
							else{ // gagal query
								echo "Data gagal dihapus. <br>";
							}
							?>
							<a href="belanja-databelanja.php" class="btn btn-success">Lihat Data Belanja</a>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>