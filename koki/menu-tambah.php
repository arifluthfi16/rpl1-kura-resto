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
<title>Tambah Data Menu</title>

<script type="text/javascript" language="javascript"> 
	function validasidata() {
		
		//validasi nama harus diisi
		var n_menu=document.frm.n_menu.value.trim(); 
		if(n_menu.length==0)
			{ 
				alert("Nama Menu Tidak Boleh Kosong."); 
				document.frm.n_menu.focus(); 
				return false; 
			} 

		//validasi harga harus diisi
		var harga=document.frm.harga.value.trim(); 
		if(harga.length==0)
			{ 
				alert("Harga Menu Tidak Boleh Kosong."); 
				document.frm.harga.focus(); 
				return false; 
			} 

        //validasi gambar
        var gambar=document.frm.gambar.value.trim(); 
		if(gambar.length==0)
			{ 
				alert("Gambar Menu Tidak Boleh Kosong."); 
				document.frm.gambar.focus(); 
				return false; 
			}     
		
		//validasi kategori
		var kategori=document.frm.kategori.value.trim(); 
		if(kategori.length==0)
			{ 
				alert("Kategori Harus Diisi."); 
				document.frm.kategori.focus(); 
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
					       	<a class="nav-link" href="menu-list.php" tabindex="-1" aria-disabled="true">Koki > List Menu > Tambah Menu</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="menu-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Menu" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
                	<div class="box">
						<form method="post" name="frm" action="menu-simpan.php" enctype="multipart/form-data" onsubmit="return validasidata()">
							<div class="form-group">
							    <label for="exampleFormControlInput1">Nama Menu</label>
							    <input type="text" name="n_menu" class="form-control" id="exampleFormControlInput1">
						    </div>
							<div class="form-group">
							    <label for="exampleFormControlFile1">Gambar</label>
							    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
						    </div>
						    <div class="form-group">
							    <label for="exampleFormControlInput1">Harga</label>
							    <input type="text" name="harga" class="form-control" id="exampleFormControlInput1" onkeypress='return hanyaAngka(event)' placeholder='Angka...'/>
						    </div>
						    <div class="form-group">
							    <label for="exampleFormControlInput1">Kategori</label>
							    <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1">
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
		
</body>
</html>