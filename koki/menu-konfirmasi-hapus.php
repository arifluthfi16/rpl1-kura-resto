<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Hapus Menu</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_menu"])){
	$db=dbConnect();
	$id_menu=$db->escape_string($_GET["id_menu"]);
	if($data = getDataMenu($id_menu)){// cari menu, kalau ada simpan di $data_req
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
					       	<a class="nav-link" href="reqbbaku.php" tabindex="-1" aria-disabled="true">Koki > Req Bahan Baku > Hapus Req Bahan Baku</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="req-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Req Bahan Baku" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
                	<div class="box">
						<form method="post" name="frm" action="menu-hapus.php">
						<input type="hidden" name="id_menu" value="<?php echo $data["id_menu"];?>">
							<div class="form-group">
								<label for="exampleFormControlInput1">Id Menu</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data["id_menu"];?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Nama Menu</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data["n_menu"];?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlFile1">Gambar</label><br>
								<img src="../gambar_menu/<?php echo $data["gambar"];?>" width="225" height="200">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Harga</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data["harga"];?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Harga</label>
								<input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data["kategori"];?>">
							</div>
							<button type="submit" name="TblHapus" class="btn btn-danger">Hapus</button>			
						</form>
		<?php
	}
	else
		echo "Menu dengan Id : $id_menu tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "Id Menu tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>