<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><title>Tambah Belanja</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<h1>Data Bahan Baku</h1>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM bahan_baku ";
	$res=$db->query($sql);
	if($res){
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
					        	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry > Belanja Data Bahan</a>
					      	</li>
      						<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
		                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" data-toggle="tooltip" title="Cari Nama Bahan Baku"><i class="fas fa-search mr-2"></i>Cari
		                        </button>
	                    	</form>
    					</ul>
                </div>
                <div class="card-body"> 
                	<table class="table" style="width: 100%;">
					 	<thead class="thead-light">
						  	<tr>
						  		<th scope="col">Id Bahan Baku</th>
						  		<th scope="col">Nama Bahan Baku</th>
						  		<th scope="col">Aksi</th>
						  	</tr>
					  	</thead>
						<?php
						$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
						foreach($data as $barisdata){ // telusuri satu per satu
							?>
							<tr>
							<td><?php echo $barisdata["id_bbaku"];?></td>
							<td><?php echo $barisdata["n_bbaku"];?></td>
							<td><a href="belanja-tambah-jumlah.php?id_bbaku=<?php echo $barisdata["id_bbaku"];?>"><button class="btn btn-success"><i class="fas fa-folder-plus mr-2"></i>Tambah ke Data Belanja</button></a> </td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="pantry.js"></script>
</body>
</html>