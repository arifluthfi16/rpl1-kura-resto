<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Hapus Req Bahan Baku</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_req_bbaku"])){
	$db=dbConnect();
	$id_req_bbaku=$db->escape_string($_GET["id_req_bbaku"]);
	if($data = getDataReqBahanBaku($id_req_bbaku)){// cari req bahan baku, kalau ada simpan di $data_req
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
						<form method="post" name="frm" action="reqbb-hapus.php" enctype="multipart/form-data" onsubmit="return validasidata()">
						<table border="0">

						    <tr><td>Id Req Bahan Baku</td>
						        <td><input type="text" name="id_req_bbaku" size="16" maxlength="15"
						            value="<?php echo $data["id_req_bbaku"];?>" class="form-control" id="exampleFormControlInput1" readonly></td></tr>

						    <tr><td>Nama Bahan Baku</td>
						        <td><input type="text" name="n_bbaku" size="30" maxlength="50"
						            value="<?php echo $data["n_bbaku"];?>" class="form-control" id="exampleFormControlInput1" readonly></td></tr>

						    <tr><td>Jumlah</td>
						        <td><input type="text" name="jumlah" size="7" maxlength="6"
						            value="<?php echo $data["jumlah"];?>" class="form-control" id="exampleFormControlInput1" readonly></td>
						  

						</form>
						<tr>
						<td><br><input type="submit" name="TblHapus" value="Hapus" class="btn btn-danger"></td>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	else
		echo "Request dengan Id : $id_req_bbaku tidak ada. Penghapusan dibatalkan";
?>
<?php
}
else
	echo "Id Req Bahan Baku tidak ada. Penghapusan dibatalkan.";
?>
</body>
</html>