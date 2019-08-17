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
<h1>Hapus Data Belanja</h1>
<?php
if(isset($_GET["id_belanja"])){
	$db=dbConnect();
	$id_belanja=$db->escape_string($_GET["id_belanja"]);
	if($data_belanja=getDataBelanja($id_belanja)){// cari data belanja, kalau ada simpan di $data_belanja
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
					        	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Hapus Data Belanja</a>
					      	</li>
      						<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
		                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari	                        </button>
	                    	</form>
    					</ul>
	                </div>
	                <div class="card-body">
	                	<div class="box">
							<form method="post" name="frm" action="belanja-hapus.php">
							<input type="hidden" name="id_belanja" value="<?php echo $data_belanja["id_belanja"];?>">

							<div class="form-group">
									<label for="exampleFormControlInput1">Id Bahan Baku</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_belanja["id_belanja"];?>">
							</div>
							<div class="form-group">
									<label for="exampleFormControlInput1">Nama Bahan Baku</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_belanja["n_bbaku"];?>">
							</div>
							<div class="form-group">
									<label for="exampleFormControlInput1">Jumlah</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_belanja["jumlah"];?>">
							</div>
							<div class="form-group">
									<label for="exampleFormControlInput1">Sub Harga</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_belanja["subharga"];?>">
							</div>
							<div class="form-group">
									<label for="exampleFormControlInput1">Tanggal Belanja</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_belanja["tgl_belanja"];?>">
							</div>
							<tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus" class="btn btn-danger"></td></tr>
							</table>
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
		echo "Belanja dengan Id : $id_belanja tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "id_belanja tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>