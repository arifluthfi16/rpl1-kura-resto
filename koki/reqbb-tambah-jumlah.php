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
<title>Tambah Req Bahan Baku</title>

<script type="text/javascript" language="javascript"> 
	function validasidata() {
		

		//validasi jumlah belanja bahan baku harus diisi
		var jumlah=document.frm.jumlah.value.trim(); 
		if(jumlah.length==0)
			{ 
				alert("Jumlah Req Bahan Baku Tidak Boleh Kosong."); 
				document.frm.jumlah.focus(); 
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
					       	<a class="nav-link" href="reqbbaku.php" tabindex="-1" aria-disabled="true">Koki > Req Bahan Baku > Tambah Req Bahan Baku</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Menu" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
                	<div class="box">
						Masukkan Jumlah Req bahan baku
						<?php
						if(isset($_GET["id_bbaku"])){
							$db=dbConnect();
							$id_bbaku=$db->escape_string($_GET["id_bbaku"]);
							if($data_bbaku=getDataBahanBaku($id_bbaku)){// cari data req, kalau ada simpan di $data
								?>

							<a href="reqbb-tambah.php"><button>Pilih Bahan Baku</button></a>
							<form method="post" name="frm" action="reqbb-simpan.php?id_bbaku=<?php echo $id_bbaku; ?>" onsubmit="return validasidata()">
								<div class="form-group">
								    <label for="exampleFormControlInput1">Id Bahan Baku</label>
								    <input type="text" name="id_bbaku" class="form-control" id="exampleFormControlInput1" value="<?php echo $data_bbaku["id_bbaku"];?>" readonly>
							    </div>
								<div class="form-group">
								    <label for="exampleFormControlInput1">Nama Bahan Baku</label>
								    <input type="text" name="n_bbaku" class="form-control" id="exampleFormControlFile1" value="<?php echo $data_bbaku["n_bbaku"];?>" readonly>
							    </div>
							    <div class="form-group">
								    <label for="exampleFormControlInput1">Jumlah</label>
								    <input type="text" name="jumlah" class="form-control" id="exampleFormControlInput1" onkeypress='return hanyaAngka(event)' placeholder='Angka...'/>
						    	</div>
						    	<button type="submit" name="TblSimpan" class="btn btn-success"><i class="fas fa-sd-card mr-2"></i>Simpan</button>
						    	<button type="reset" class="btn btn-danger"><i class="fas fa-undo mr-2"></i>Reset</button>
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
		echo "Bahan Baku dengan Id : $id_bbaku tidak ada. Request dibatalkan";
?>
<?php
}
else
	echo "id_bbaku tidak ada. Request dibatalkan.";
?>
</body>
</html>