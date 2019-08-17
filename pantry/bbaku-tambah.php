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
	<title>Tambah Bahan Baku</title>
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
					       	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Bahan Baku > Tambah Bahan Baku</a>
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
	                	<form method="post" name="frm" action="bbaku-simpan.php"  onsubmit="return validasidata()">
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Nama Bahan Baku</label>
						    <input type="text" name="n_bbaku" class="form-control" id="exampleFormControlInput1">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Stok</label>
						    <input type="text" name="stok" class="form-control" id="exampleFormControlInput1">
						  </div>
						  <div class="form-group">
						    <label for="exampleFormControlInput1">Tanggal Kadaluarsa</label>
						    <input type="date" name="tgl_kadaluarsa" class="form-control" id="exampleFormControlInput1" onkeypress='return hanyaAngka(event)' placeholder='Angka...'/>
						  </div>
						  <button class="btn btn-success my-2 my-sm-0" type="submit" name="TblSimpan"><i class="fas fa-sd-card mr-2"></i>Simpan</button>
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
