<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head> <meta http-equiv="refresh" content="60"/><title>List Pesanan</title></head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="koki.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
<body>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM pesanan  WHERE keterangan ='Belum Dibuat' OR keterangan ='Sedang Dibuat' ORDER BY id_pesanan";
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
					       	<a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Koki > List Pesanan</a>
					    </li>
    				</ul>
                </div>
                <div class="card-body">
					<table class="table" style="width: 100%;">
					  	<thead class="thead-light">
					  		<tr>
						  		<th scope="col">No</th>
						  		<th scope="col">Detail Pesanan</th>
						  		<th scope="col">Jumlah</th>
						  		<th scope="col">Keterangan</th>
						  		<th scope="col">Aksi</th>
	            			</tr>
	            		</thead>
		
		<?php
			$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
            foreach($data as $barisdata){ // telusuri satu per satu	
               
		?>

			<tr>
                <td><?php echo $no;?></td>
                <td>

                <?php //mencari menu apa saja yang ada pada pesanan
                $id_pesanan = $barisdata["id_pesanan"];
                $sql="SELECT * FROM detail_pesanan JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE
                      detail_pesanan.id_pesanan = '$id_pesanan' ";
                $res=$db->query($sql);
                if($res){
                    $dataa=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                    foreach($dataa as $barisdataa){ // telusuri satu per satu menu
                ?>
                <?php echo $barisdataa["n_menu"];?> <br>
                <?php }
				}
				?>
				</td>
				
				<td>
				<?php 
					foreach($dataa as $barisdataaa){ // telusuri satu per satu jumlah menu	
					?>
					<?php echo $barisdataaa["jumlah"];?> <br>
					<?php }
					
                ?>
                </td> 
                
				<td><?php echo $barisdata["keterangan"];?></td>
                <td><!-- jika keterangan pesanan = belum dibuat maka buttonnya adalah proses pesanan -->
					<?php 
					$keterangan = $barisdata["keterangan"];
					if ( $keterangan == "Belum Dibuat"){ ?>
						<a href="pesanan-prosespesanan.php?id_pesanan=<?php echo $barisdata["id_pesanan"];?>&keterangan=<?php echo $keterangan;?>"><button>Proses Pesanan</button></a> 
					
					<?php
					}        
					?>
      		
      	
      				<!-- jika keterangan pesanan = sedang dibuat maka buttonnya adalah pesanan selesai -->				
					<?php 
						
						if ( $keterangan == "Sedang Dibuat"){ ?>
							<a href="pesanan-selesai.php?id_pesanan=<?php echo $barisdata["id_pesanan"];?>&keterangan=<?php echo $keterangan;?>"><button>Pesanan Selesai</button></a> 
						
						<?php
						}        
					?>

								
			</tr>

		<?php
	
		$no++;
		
			}
		?>
		</form>
		</table>
		<br>
		<br>
		<br>
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