<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Tambah Meja</title></head>
<script type="text/javascript" language="javascript"> 
	function hanyaAngka(evt) {
    	var charCode = (evt.which) ? evt.which : event.keyCode
    		if (charCode > 31 && (charCode < 48 || charCode > 57))
    		return false;
    	return true;
	}
	function validasi() {
		//validasi no meja
		var no_meja=document.frm.no_meja.value.trim(); 
		if(no_meja.length==0){ 
			alert("No meja tidak boleh kosong."); 
			document.frm.no_meja.focus(); 
			return false; 
		}
		//validasi username meja
		var username_meja=document.frm.username_meja.value.trim(); 
		if(username_meja.length==0){ 
			alert("Username meja tidak boleh kosong."); 
			document.frm.username_meja.focus(); 
			return false; 
		}
		//validasi password
		var password_meja=document.frm.password_meja.value.trim(); 
		if(password_meja.length==0){ 
			alert("Jabatan tidak boleh kosong."); 
			document.frm.password_meja.focus(); 
			return false; 
		}
	return true;
	} 
</script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="pemilik.css">
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
						    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pemilik > Pegawai > Tambah Data Meja</a>
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
						<form method="post" name="frm" action="save_meja.php" onsubmit="return validasi()">
							<div class="form-group">
							    <label for="exampleFormControlInput1">No Meja</label>
							    <input type="text" name="no_meja" class="form-control" id="exampleFormControlInput1" onkeypress="return hanyaAngka(event)">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Username</label>
							    <input type="text" name="username_meja" class="form-control" id="exampleFormControlInput1">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Password</label>
							    <input type="password" name="password_meja" class="form-control" id="exampleFormControlInput1">
							</div>
							<button type="submit" name="TblSimpan" class="btn btn-success"><i class="fas fa-sd-card mr-2"></i>Simpan</button>
							<button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</form>
</body>
</html>