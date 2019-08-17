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
<title>Tambah Data belanjaan</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">

<script type="text/javascript" language="javascript"> 
	function validasidata() {
		

		//validasi jumlah belanja bahan baku harus diisi
		var jumlah=document.frm.jumlah.value.trim(); 
		if(jumlah.length==0)
			{ 
				alert("Jumlah Bahan Baku yang Dibelanjakan Tidak Boleh Kosong."); 
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
                    <ul class="nav nav-pills card-header-pills">
					      	<li class="nav-item">
					        	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Bahan Baku</a>
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
                		<a href="belanja-databahan.php"><button class="btn btn-secondary btn-sm mb-2" data-toggle="tooltip" title="Pilih Bahan Baku yang akan ditambah Stok nya"><i class="fas fa-plus mr-2"></i>Pilih Bahan Baku</button></a>
						<form method="post" name="frm" action="belanja-simpan.php?id_bbaku=<?php echo $id_bbaku; ?>" onsubmit="return validasidata()">
							<table border="0">
								<tr><td>Id Bahan Baku</td>
								    <td><input type="text" name="id_bbaku" class="form-control" id="exampleFormControlInput1" size="16" maxlength="15"
									     value="<?php echo $data_bbaku["id_bbaku"];?>" readonly></td></tr>

								<tr><td>Nama Bahan Baku</td>
								    <td><input type="text" name="n_bbaku" class="form-control" id="exampleFormControlInput1" size="30" maxlength="50"
										 value="<?php echo $data_bbaku["n_bbaku"];?>"></td></tr>

								<tr><td>Jumlah</td>
									<td><input type="text" name="jumlah" class="form-control" id="exampleFormControlInput1" size="7" maxlength="6"
										 onkeypress='return hanyaAngka(event)' placeholder='Angka...'/></td></tr>

								<tr><td>Sub Harga</td>
									<td><input type="text" name="subharga" class="form-control" id="exampleFormControlInput1" size="7" maxlength="6"
										 onkeypress='return hanyaAngka(event)' placeholder='Angka...'/></td></tr>

								</form>

								<tr><td></td>
									<td>
									<br>
										<button type="submit" name="TblSimpan" value="Simpan" class="btn btn-success mr-2"><i class="far fa-save mr-2"></i>Simpan</button>
										<input type="reset" class="btn btn-danger"></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<td>
</table>
</form>
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