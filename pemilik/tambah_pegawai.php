<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>View Data Pegawai</title></head>
<script type="text/javascript" language="javascript"> 
	function hanyaAngka(evt) {
    	var charCode = (evt.which) ? evt.which : event.keyCode
    		if (charCode > 31 && (charCode < 48 || charCode > 57))
    		return false;
    	return true;
	}
	function validasi() {
		//validasi id pegawai
		var id_pegawai=document.frm.id_pegawai.value.trim(); 
		if(id_pegawai.length==0){ 
			alert("NIP tidak boleh kosong."); 
			document.frm.id_pegawai.focus(); 
			return false; 
		}
		//validasi nama pegawai
		var n_pegawai=document.frm.n_pegawai.value.trim(); 
		if(n_pegawai.length==0){ 
			alert("Nama pegawai tidak boleh kosong."); 
			document.frm.n_pegawai.focus(); 
			return false; 
		}
		//validasi jabatan
		var jabatan=document.frm.jabatan.value.trim(); 
		if(jabatan.length==0){ 
			alert("Jabatan tidak boleh kosong."); 
			document.frm.jabatan.focus(); 
			return false; 
		}
		//validasi username
		var username=document.frm.username.value.trim(); 
		if(username.length==0){ 
			alert("Username tidak boleh kosong."); 
			document.frm.username.focus(); 
			return false; 
		}
		//validasi password
		var password=document.frm.password.value.trim(); 
		if(password.length==0){ 
			alert("Password tidak boleh kosong."); 
			document.frm.password.focus(); 
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
						    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pemilik > Pegawai > Tambah Data Pegawai</a>
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
						<form method="post" name="frm" action="save_pegawai.php" onsubmit="return validasi()">
							<div class="form-group">
							    <label for="exampleFormControlInput1">NIP</label>
							    <input type="text" name="id_pegawai" class="form-control" id="exampleFormControlInput1">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Nama Pegawai</label>
							    <input type="text" name="n_pegawai" class="form-control" id="exampleFormControlInput1">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlSelect1">Pilih Jabatan</label>
							    <select class="form-control" id="exampleFormControlSelect1" name="jabatan">
							      	<option value="">Pilih Jabatan</option>
									<option value="customer service">Customer Service</option>
									<option value="koki">Koki</option>
									<option value="pantry">Pantry</option>
									<option value="pelayan">Pelayan</option>
									<option value="kasir">Kasir</option>
							    </select>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Username</label>
							    <input type="text" name="username" class="form-control" id="exampleFormControlInput1">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Password</label>
							    <input type="text" name="password" class="form-control" id="exampleFormControlInput1">
							</div>
							<button type="submit" name="TblSimpan" class="btn btn-success mr-2"><i class="fas fa-sd-card mr-2"></i>Simpan</button>
							<button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="pemilik.js"></script>
</html>