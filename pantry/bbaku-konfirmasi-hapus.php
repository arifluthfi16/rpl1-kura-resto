<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hapus Bahan Baku</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_bbaku"])){
	$db=dbConnect();
	$id_bbaku=$db->escape_string($_GET["id_bbaku"]);
	if($data_bbaku=getDataBahanBaku($id_bbaku)){// cari data bahan baku, kalau ada simpan di $data_bbaku
		?>

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
					        	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Hapus Bahan Baku</a>
					      	</li>
      						<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
		                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari
		                        </button>
	                    	</form>
    					</ul>
	                </div>
	                <div class="card-body">
	                	<div class="box">
							<form method="post" name="frm" action="bbaku-hapus.php">
								<input type="hidden" name="id_bbaku" value="<?php echo $data_bbaku["id_bbaku"];?>">
								<div class="form-group">
									<label for="exampleFormControlInput1">Id Bahan Baku</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_bbaku["id_bbaku"];?>">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nama Bahan Baku</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_bbaku["n_bbaku"];?>">
								</div>
									<div class="form-group">
									<label for="exampleFormControlInput1">Stok</label>
									 <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_bbaku["stok"];?>" onkeypress='return hanyaAngka(event)' placeholder='Angka...'/>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Tanggal Kadaluarsa</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_bbaku["tgl_kadaluarsa"];?>" readonly>
								</div>
								<button class="btn btn-danger btn-sm p-2" type="submit" name="TblHapus" value="Hapus"><i class="fas fa-retweet mr-2"></i>Hapus</button>
								</form>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
		<?php
	}
	else
		echo "Bahan Baku dengan Id : $id_bbaku tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "id_bbaku tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>