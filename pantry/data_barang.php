<?php 
session_start();
if (!isset($_SESSION["id_admin"]))
	header("Location: index.php?error=4");

include_once("functions.php");?>
<!DOCTYPE html>
<html><head></head>
<body>
<h1>Data Produk</h1>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM barang JOIN jenis ON
        barang.id_jenis=jenis.id_jenis JOIN admin ON
        barang.id_admin=admin.id_admin  ORDER BY id_barang";
	$res=$db->query($sql);
	if($res){
		?>
		
		<br>

		<table border="1">
		<tr><th>Id Barang</th><th>Jenis</th><th>Admin</th>
		    <th>Nama Barang</th><th>Harga</th><th>Stok</th>
			<th>Keterangan</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_barang"];?></td>
			<td><?php echo $barisdata["nama_jenis"];?></td>
			<td><?php echo $barisdata["username"];?></td>
			<td><?php echo $barisdata["nama_barang"];?></td>
			<td><?php echo $barisdata["harga"];?></td>
			<td><?php echo $barisdata["stok"];?></td>
			<td><?php echo $barisdata["keterangan"];?></td>
			
		    </tr>
			<?php
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
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>