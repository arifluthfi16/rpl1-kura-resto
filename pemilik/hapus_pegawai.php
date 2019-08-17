<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Hapus Data Pegawai</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="pemilik.css">
<body>
<?php
if(isset($_GET["id_pegawai"])){
	$db=dbConnect();
	$id_pegawai=$db->escape_string($_GET["id_pegawai"]);
	if($datapegawai=getDataPegawai($id_pegawai)){// cari data pegawai, kalau ada simpan di $data
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
						    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pemilik > Pegawai > Hapus Data Pegawai</a>
						</li>
	                    <form class="form-inline my-2 my-lg-0 ml-auto float-right" action="#" method="post">
			                <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Pegawai" aria-label="Search" name="pencarian">
			                <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" data-toggle="tooltip" title="Lakukan Pencarian" data-placement="bottom"><i class="fas fa-search"></i>
			                </button>
		                </form>
		            </ul>
                </div>
                <div class="card-body">
                	<div class="box">
						<form method="post" name="frm" action="delete_pegawai.php">
							<div class="form-group">
							    <label for="exampleFormControlInput1">NIP</label>
							    <input type="text" name="id_pegawai" class="form-control" id="exampleFormControlInput1" value="<?php echo $datapegawai["id_pegawai"];?>" readonly>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Nama Pegawai</label>
							    <input type="text" name="n_pegawai" class="form-control" id="exampleFormControlInput1" value="<?php echo $datapegawai["n_pegawai"];?>" readonly>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Jabatan</label>
							    <input type="text" name="jabatan" class="form-control" id="exampleFormControlInput1" value="<?php echo $datapegawai["jabatan"];?>" readonly>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Username</label>
							    <input type="text" name="username" class="form-control" id="exampleFormControlInput1" value="<?php echo $datapegawai["username"];?>" readonly>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Password</label>
							    <input type="text" name="password" class="form-control" id="exampleFormControlInput1" value="<?php echo $datapegawai["password"];?>" readonly>
							</div>
							<button type="submit" name="TblHapus" class="btn btn-danger"><i class="fas fa-user-slash mr-2"></i>Hapus</button>
		<?php
	}
	else
		echo "NIP dengan : $id_pegawai tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "NIP tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>