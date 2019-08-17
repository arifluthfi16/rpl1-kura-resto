<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><meta http-equiv="refresh" content="60"/><title>List Menu</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
//query untuk update keterangan menu secara otomatis
$sql="SELECT * FROM detail_menu JOIN bahan_baku ON detail_menu.id_bbaku = bahan_baku.id_bbaku ";
$res=$db->query($sql);
$data=$res->fetch_all(MYSQLI_ASSOC);
foreach($data as $barisdata){
$jumlah_bbaku = $barisdata["stok"];
$id_menu_update = $barisdata["id_menu"];
if($jumlah_bbaku < 1)
{
	// Susun query update
	$sql="UPDATE menu SET keterangan='Tidak Tersedia' WHERE id_menu='$id_menu_update'";
	// Eksekusi query update
	$res=$db->query($sql);

}
else
{
	$sql="UPDATE menu SET keterangan='Tersedia' WHERE id_menu='$id_menu_update'";
	$res=$db->query($sql);
}
}

$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM menu  ORDER BY n_menu";
	$res=$db->query($sql);
	if($res){
		$no= 1;
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
					       	<a class="nav-link" href="menu-list.php" tabindex="-1" aria-disabled="true">Koki > List Menu</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="menu-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari List Menu" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
					<a href="menu-tambah.php"><button class="btn btn-success btn-sm mb-2"><i class="fas fa-plus mr-2"></i>Tambah Menu</button></a>
					<table class="table" style="width: 100%;">
					  	<thead class="thead-light">
					  		<tr>
						  		<th scope="col">No</th>
						  		<th scope="col">Nama Menu</th>
						  		<th scope="col">Gambar</th>
						  		<th scope="col">Bahan</th>
						  		<th scope="col">Harga</th>
						  		<th scope="col">keterangan</th>
	            				<th scope="col">Kategori</th>
	            				<th scope="col">Aksi</th>
	            			</tr>
	            		</thead>
							<?php
								$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
					            foreach($data as $barisdata){ // telusuri satu per satu	
					               
							?>

								<tr>
					                <td><?php echo $no;?></td>
					                <td><?php echo $barisdata["n_menu"];?></td>
					                <td><img src="../gambar_menu/<?php echo $barisdata["gambar"];?>" width="180" height="150"></td>
					                <td>

					                <?php //mencari bahan baku yg terdapat pada menu
					                $id_menu = $barisdata["id_menu"];
					                $sql="SELECT * FROM detail_menu JOIN menu ON detail_menu.id_menu = menu.id_menu
					                      JOIN bahan_baku ON detail_menu.id_bbaku = bahan_baku.id_bbaku WHERE menu.id_menu = '$id_menu' ";
					                $res=$db->query($sql);
					                if($res){
					                    $dataa=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
					                    foreach($dataa as $barisdataa){ // telusuri satu per satu	
					                ?>
					                <?php echo $barisdataa["n_bbaku"];?> <br>
					                <?php }
					                }
					                ?>
					                </td> 
					                
					                <td><?php echo $barisdata["harga"];?></td>
									<td><?php echo $barisdata["keterangan"];?></td>
									<td><?php echo $barisdata["kategori"];?></td>
					                <td>
									<a href="menu-daftarbahan.php?id_menu=<?php echo $barisdata["id_menu"];?>" data-toggle="tooltip" title="Edit Bahan Baku" data-placement="left"><button class="btn btn-success btn-sm mb-1"><i class="fas fa-edit"></i></button></a><br>
					                <a href="menu-edit.php?id_menu=<?php echo $barisdata["id_menu"];?>" data-toggle="tooltip" title="Edit List Menu" data-placement="left"><button class="btn btn-info btn-sm mb-1"><i class="fas fa-edit"></i></button></a><br>
					                <a href="menu-konfirmasi-hapus.php?id_menu=<?php echo $barisdata["id_menu"];?>" data-toggle="tooltip" title="Hapus Data List Menu" data-placement="left"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></a></td>
								</tr>
								<?php
							
								$no++;
								
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
<script type="text/javascript" src="koki.js"></script>
</html>