<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Edit Data Meja</title></head>
<script type="text/javascript" language="javascript"> 
	function validasi() {
		//validasi username meja
		var username_meja=document.frm.username_meja.value.trim(); 
		if(username_meja.length==0){ 
			alert("Username meja tidak boleh kosong."); 
			document.frm.username_meja.focus(); 
			return false; 
		}
		//validasi password meja
		var password_meja=document.frm.password_meja.value.trim(); 
		if(password_meja.length==0){ 
			alert("Password meja tidak boleh kosong."); 
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
<?php
if(isset($_GET["no_meja"])){
	$db=dbConnect();
	$no_meja=$db->escape_string($_GET["no_meja"]);
	if($datameja=getDataMeja($no_meja)){
	// cari data produk, kalau ada simpan di $data
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
						    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pemilik > Pegawai > Edit Data Meja</a>
						</li>
	                    <form class="form-inline my-2 my-lg-0 ml-auto float-right" action="#" method="post">
			                <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Meja" aria-label="Search" name="pencarian">
			                <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" data-toggle="tooltip" title="Lakukan Pencarian" data-placement="bottom"><i class="fas fa-search"></i>
			                </button>
		                </form>
		            </ul>
                </div>
                <div class="card-body">
                	<div class="box">
						<form method="post" name="frm" action="update_meja.php" onsubmit="return validasi()">
							<div class="form-group">
							    <label for="exampleFormControlInput1">No Meja</label>
							    <input type="text" name="no_meja" class="form-control" id="exampleFormControlInput1" value="<?php echo $datameja["no_meja"];?>" readonly>
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Username</label>
							    <input type="text" name="username_meja" class="form-control" id="exampleFormControlInput1" value="<?php echo $datameja["username_meja"];?>">
							</div>
							<div class="form-group">
							    <label for="exampleFormControlInput1">Password</label>
							    <input type="text" name="password_meja" class="form-control" id="exampleFormControlInput1" value="<?php echo $datameja["password_meja"];?>">
							</div>
							<button type="submit" name="TblUpdate" class="btn btn-success mr-2"><i class="fas fa-edit mr-2"></i>Update</button>
							<button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Reset</button>

		<?php
	}
	else
		echo "No Meja dengan : $no_meja tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "No Meja tidak ada. Pengeditan dibatalkan.";
?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="pemilik.js"></script>
</html>