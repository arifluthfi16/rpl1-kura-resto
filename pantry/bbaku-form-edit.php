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
	<title>Edit Bahan Baku</title>
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
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_bbaku"])){
	$db=dbConnect();
	$id_bbaku=$db->escape_string($_GET["id_bbaku"]);
	if($data_bbaku=getDataBahanBaku($id_bbaku)){// cari data produk, kalau ada simpan di $data
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
	                    <form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
	                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Cari Bahan Baku" name="pencarian">
	                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari</button>
	                    </form>
	                </div>
	                <div class="card-body">
	                	<div class="box">
		                	<form method="post" name="frm" action="bbaku-update.php" onsubmit="return validasidata()">
		                		<div class="form-group">
								   <label for="exampleFormControlInput1">Id Bahan Baku</label>
								   <input type="text" class="form-control" id="exampleFormControlInput1" name="id_bbaku" size="16" maxlength="15" value="<?php echo $data_bbaku["id_bbaku"];?>" readonly>
								</div>
								<div class="form-group">
								   <label for="exampleFormControlInput1">Nama Bahan Baku</label>
								   <input type="text" class="form-control" id="exampleFormControlInput1" name="n_bbaku" size="30" maxlength="50" value="<?php echo $data_bbaku["n_bbaku"];?>">
								</div>
								<div class="form-group">
								   <label for="exampleFormControlInput1">Stok</label>
								   <input type="text" class="form-control" id="exampleFormControlInput1" name="stok" size="7" maxlength="6" value="<?php echo $data_bbaku["stok"];?>" onkeypress='return hanyaAngka(event)' placeholder='Angka...'/>
								</div>
								<div class="form-group">
								   <label for="exampleFormControlInput1">Tanggal Kadaluarsa</label>
								   <input type="text" class="form-control" id="exampleFormControlInput1" name="tgl_kadaluarsa_dulu" size="9" maxlength="8" value="<?php echo $data_bbaku["tgl_kadaluarsa"];?>" readonly ><br>
								   <tr><td>Tanggal Kadaluarsa Baru</td>			
									<td><input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_kadaluarsa_baru">
									</td></tr>

								</div>
								<button class="btn btn-success btn-sm p-2 mr-2" type="submit" name="TblUpdate"><i class="fas fa-sd-card mr-2"></i>Simpan</button>
								<button class="btn btn-danger btn-sm p-2" type="reset"><i class="fas fa-retweet mr-2"></i>Reset</button>
								</form>
						</div>
                </div>
        </div>
    </div>
              		<?php
	}
	else
		echo "Bahan Baku dengan Id : $id_bbaku tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "id_bbaku tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>
