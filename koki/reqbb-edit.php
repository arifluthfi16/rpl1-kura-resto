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
<title>Edit Data Req Bahan Baku</title>

<script type="text/javascript" language="javascript"> 
	function validasidata() {
		
		//validasi nama harus diisi
		var n_bbaku=document.frm.n_bbaku.value.trim(); 
		if(n_bbaku.length==0)
			{ 
				alert("Nama Bahan Baku Tidak Boleh Kosong."); 
				document.frm.n_bbaku.focus(); 
				return false; 
			} 

		//validasi jumlah harus diisi
		var jumlah=document.frm.jumlah.value.trim(); 
		if(jumlah.length==0)
			{ 
				alert("Jumlah Bahan Baku Tidak Boleh Kosong."); 
				document.frm.jumlah.focus(); 
				return false; 
			} 

		
		//validasi tgl kadaluarsa
		var tgl_kadaluarsa_baru=document.frm.tgl_kadaluarsa_baru.value.trim(); 
		if(tgl_kadaluarsa_baru.length==0)
			{ 
				alert("Tanggal Kadaluarsa Harus Diisi."); 
				document.frm.tgl_kadaluarsa_baru.focus(); 
				return false; 
			} 	
	
	
	return true;
	} 
	</script>

	<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_req_bbaku"])){
	$db=dbConnect();
	$id_req_bbaku=$db->escape_string($_GET["id_req_bbaku"]);
	if($data=getDataReqBahanBaku($id_req_bbaku)){// cari data req baku, kalau ada simpan di $data
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
					       	<a class="nav-link" href="reqbbaku.php" tabindex="-1" aria-disabled="true">Koki > Req Bahan Baku > Edit Req Bahan Baku</a>
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
						<form method="post" name="frm" action="reqbb-update.php" enctype="multipart/form-data" onsubmit="return validasidata()">
						<table border="0">

						    <tr><td>Id Req Bahan Baku</td>
						        <td><input type="text" name="id_req_bbaku" size="16" maxlength="15"
						            value="<?php echo $data["id_req_bbaku"];?>" class="form-control" id="exampleFormControlInput1" readonly></td></tr>

						    <tr><td>Nama Bahan Baku</td>
						        <td><input type="text" name="n_bbaku" size="30" maxlength="50"
						            value="<?php echo $data["n_bbaku"];?>" class="form-control" id="exampleFormControlInput1" readonly></td></tr>

						    <tr><td>Jumlah</td>
						        <td><input type="text" name="jumlah" size="7" maxlength="6"
						            value="<?php echo $data["jumlah"];?>" onkeypress='return hanyaAngka(event)' placeholder='Angka...' class="form-control" id="exampleFormControlInput1"></td>
						  

						</form>
						<tr>
						<td><br><input type="submit" name="TblUpdate" value="Update" class="btn btn-success"></td>
						<td><br><input type="reset" value="Reset" class="btn btn-danger"></td></tr>
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
		echo "Req Bahan Baku dengan Id : $id_req_bbaku tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "Id Req Bahan Baku tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>