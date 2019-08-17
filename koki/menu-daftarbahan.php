<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><title>Edit Bahan Pada Menu</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
if(isset($_GET["id_menu"])){
    $db=dbConnect();
    $id_menu=$db->escape_string($_GET["id_menu"]);
	if($db->connect_errno==0){
        $sql="SELECT * FROM detail_menu JOIN bahan_baku ON detail_menu.id_bbaku = bahan_baku.id_bbaku 
              WHERE detail_menu.id_menu='$id_menu' ORDER BY bahan_baku.n_bbaku";
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
					       	<a class="nav-link" href="menu-list.php" tabindex="-1" aria-disabled="true">Koki > List Menu > Daftar Bahan</a>
					    </li>
      					<form class="form-inline my-2 my-lg-0 ml-auto float-right" action="menu-pencarian.php" method="post">
		                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Menu" aria-label="Search" name="pencarian">
		                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search mr-2"></i>Cari 
		                    </button>
	                    </form>
    				</ul>
                </div>
                <div class="card-body">
					<a href="menu-tambahbahan.php?id_menu=<?php echo $id_menu;?>"><button class="btn btn-success btn-sm mb-2"><i class="fas fa-plus mr-2"></i>Tambah Bahan</button></a>
					<table class="table" style="width: 100%;">
					  	<thead class="thead-light">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Bahan Baku</th>
								<th scope="col">Stok</th>
							    <th scope="col">Tanggal Kadaluarsa</th>
							    <th scope="col">Aksi</th>
							</tr>
							<?php
							$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
							foreach($data as $barisdata){ // telusuri satu per satu
					            $id_bbaku = $barisdata["id_bbaku"];
					            ?>
					    </thead>   	
					            <tr>
						            <td><?php echo $nomor;?></td>
									<td><?php echo $barisdata["n_bbaku"];?></td>
									<td><?php echo $barisdata["stok"];?></td>
									<td><?php echo $barisdata["tgl_kadaluarsa"];?></td>
									<td>
						            <a href="menu-hapusbahan.php?id_bbaku=<?php echo $barisdata["id_bbaku"];?>&id_menu=<?php echo $id_menu;?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt mr-2"></i>Hapus</button></a>  </td>
								</tr>
								<?php
					            $nomor++;
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
}



?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="koki.js"></script>
</html>