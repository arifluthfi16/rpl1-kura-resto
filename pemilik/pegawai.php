<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
?>
<?php include_once("../functions.php"); ?>
<!DOCTYPE html>
<html><head><title>Pemilik</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="pemilik.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
$db=dbConnect();
if($db->connect_errno==0) {
	$sql="SELECT * FROM pegawai where jabatan <> 'pemilik'";
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
					       	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Pemilik > Pegawai</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="#" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Pegawai" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit" data-toggle="tooltip" title="Lakukan Pencarian" data-placement="bottom"><i class="fas fa-search"></i>
		                    </button>
	                    </form>
    				</ul>
                </div>
		
				<div class="card-body">
                	<a href="tambah_pegawai.php" class="btn btn-success mb-2" data-toggle="tooltip" title="Tambah Data Pegawai" data-placement="right"><i class="fas fa-user-plus mr-2"></i>Tambah</a>
                    <table class="table" style="width: 100%;">
					  	<thead class="thead-light">
							<tr>
								<th scope="col">NIP</th>
								<th scope="col">Nama Pegawai</th>
								<th scope="col">Jabatan</th>
							    <th scope="col">Username</th>
							    <th scope="col">Password</th>
							    <th scope="col">Aksi</th>
							</tr>
						</thead>
							<?php
							$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
							foreach($data as $barisdata){ // telusuri satu per satu
								?>
								<tr>
								<td><?php echo $barisdata["id_pegawai"];?></td>
								<td><?php echo $barisdata["n_pegawai"];?></td>
								<td><?php echo $barisdata["jabatan"];?></td>
								<td><?php echo $barisdata["username"];?></td>
								<td><?php echo $barisdata["password"];?></td>
								<td>
									<a href="edit_pegawai.php?id_pegawai=<?php echo $barisdata["id_pegawai"];?>"><button class="btn btn-info btn-sm mr-2"><i class="fas fa-user-edit mr-2"></i>Edit</button></a>
									<a href="hapus_pegawai.php?id_pegawai=<?php echo $barisdata["id_pegawai"];?>"><button class="btn btn-danger btn-sm"><i class="fas fa-user-slash mr-2"></i>Hapus</button></a>
								</td>
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
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="pemilik.js"></script>
</html>