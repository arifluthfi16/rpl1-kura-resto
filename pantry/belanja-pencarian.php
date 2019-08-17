<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Pencarian Data Bahan Baku</title></head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Data Bahan Baku</h1>
<?php
$db=dbConnect();


if($db->connect_errno==0){

	if (ISSET($_POST['submit'])){
		$cari = $_POST['pencarian'];

		$sql="SELECT * FROM bahan_baku WHERE n_bbaku like '%$cari%' ORDER BY n_bbaku";
		$res=$db->query($sql);

	if($res){
		?>
		

<form action="belanja-tambah-cari.php" method="post">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	  <input type="text" placeholder="Cari Bahan Baku" aria-label="Search" name="pencarian">
	  <button type="submit" name="submit">Cari</button>
</form>
</tr>
</table>


<br>

<table border="1">
		<tr><th>Id Bahan Baku</th><th>Nama Bahan Baku</th><th>Aksi</th>
			</tr>
		<?php
		$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
		foreach($data as $barisdata){ // telusuri satu per satu
			?>
			<tr>
			<td><?php echo $barisdata["id_bbaku"];?></td>
			<td><?php echo $barisdata["n_bbaku"];?></td>
			<td><a href="belanja-tambah-jumlah.php?id_bbaku=<?php echo $barisdata["id_bbaku"];?>"><button>Tambah ke Data Belanja</button></a> </td>
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
}
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>