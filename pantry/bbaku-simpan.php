<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Bahan Baku</title></head>
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
                    <form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari</button>
                    </form>
                </div>
                <div class="card-body">
					<h4>Penyimpanan Data Bahan Baku</h4>
					<?php
					if(isset($_POST["TblSimpan"])){
						$db=dbConnect();
						if($db->connect_errno==0){
							// Bersihkan data
							$n_bbaku	   =$db->escape_string($_POST["n_bbaku"]);
							$stok	   =$db->escape_string($_POST["stok"]);
							$tgl_kadaluarsa =$db->escape_string($_POST["tgl_kadaluarsa"]);
						
							// Susun query insert
							$sql="INSERT INTO bahan_baku(n_bbaku,stok,tgl_kadaluarsa)
								  VALUES('$n_bbaku','$stok','$tgl_kadaluarsa')";
							// Eksekusi query insert
							$res=$db->query($sql);
							if($res){
								if($db->affected_rows>0){ // jika ada penambahan data
									?>
									Data berhasil disimpan.<br>
									<a href="bbaku.php"><button class="btn btn-success">Lihat Data Bahan Baku</button></a>
									<?php
								}
							}
							else{
								?>
								Data gagal disimpan karena id bahan baku mungkin sudah ada.<br>
								<a href="javascript:history.back()"><button>Kembali</button></a>
								<?php
							}
						}
						else
							echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
					}
					?>
				</div>
			</div>
		</div>
</body>
</html>