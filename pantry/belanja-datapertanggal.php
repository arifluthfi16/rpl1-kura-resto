
<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();

$koneksi = new mysqli("localhost","root","","kura_resto");
$hitungtotal=0;
?>

<!DOCTYPE html>
<html><head><title>Data Belanja</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pantry.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
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
					        	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pantry >  Cari Data Per Tanggal</a>
					      	</li>
      						<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="pencarian">
		                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari Menu
		                        </button>
	                    	</form>
    					</ul>
	                </div>
	                <div class="card-body">
	                	<div class="box">
					        <form method="get">
									<label>PILIH TANGGAL BELANJA</label>
									<input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1">
									<input type="submit" value="FILTER" class="btn btn-info mt-3 mb-3">
							</form>
								<?php
								  if(isset($_GET['tanggal'])){
								    $tgl = $_GET['tanggal'];
								    $ambildata = $koneksi->query("SELECT * FROM belanja JOIN bahan_baku ON belanja.id_bbaku = bahan_baku.id_bbaku WHERE tgl_belanja = '$tgl' ");
								    //cek bila tanggal belanja ditemukan maka
								        if($koneksi->affected_rows > 0){  
								?>
						</div>
								    Berikut adalah data belanja pada tanggal <?php echo $tgl; ?>	
										 <table class="table mt-2" style="width: 100%;">
					  						<thead class="thead-light">
												<tr>
													<th scope="col">Id Belanja</th>
													<th scope="col">Nama Bahan Baku</th>
													<th scope="col">Jumlah</th>
										            <th scope="col">Subharga</th>
										            <th scope="col">Tanggal Belanja</th>
													</tr>
												<?php
												while($pecahdata = $ambildata->fetch_assoc()){  // ambil seluruh baris data
												?>
													<tr>
										                <td><?php echo $pecahdata["id_belanja"];?></td>
										                <td><?php echo $pecahdata["n_bbaku"];?></td>
										                <td><?php echo $pecahdata["jumlah"];?></td>
										                <td><?php echo $pecahdata["subharga"];?></td>
										                <td><?php echo $pecahdata["tgl_belanja"];?></td>
													</tr>
												    <?php $hitungtotal += $pecahdata["subharga"]; ?>
										            <?php } ?>
										        
										    
										      <tr>
										        <th colspan="3">Total Belanja</th>
										        <th colspan="2">Rp. <?php echo number_format($hitungtotal); ?></th>
										      </tr> 
								     
								        <?php }  
								  		}
										?> 	
										</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

</body>
</html>