<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>List Bahan Baku</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
$db=dbConnect();


if($db->connect_errno==0){

	if (ISSET($_POST['submit'])){
		$cari = $_POST['pencarian'];

		$sql="SELECT * FROM bahan_baku WHERE n_bbaku like '%$cari%' ORDER BY n_bbaku";
		$res=$db->query($sql);

	if($res){
		$nomor= 1;
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
					       	<a class="nav-link" href="listbbaku.php" tabindex="-1" aria-disabled="true">Koki > List Bahan Baku</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="bbaku-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
					<table class="table" style="width: 100%;">
					  	<thead class="thead-light">
					  		<tr>
						  		<th scope="col">No</th>
						  		<th scope="col">Nama Bahan Baku</th>
						  		<th scope="col">Stok</th>
						  		<th scope="col">Tanggal Kadaluarsa</th>
						  	
	            			</tr>
	            		</thead>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $barisdata["n_bbaku"];?></td>
			<td><?php echo $barisdata["stok"];?></td>
			<td><?php echo $barisdata["tgl_kadaluarsa"];?></td>
			
			
			</tr>
			<?php
			$nomor++;
			}
			?>
		</table>
		<br>
		<br>
		<br>
		<?php
		$res->free();
	}else
		echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
}
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>