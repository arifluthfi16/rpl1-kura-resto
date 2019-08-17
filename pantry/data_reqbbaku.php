<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><title>List Req Bahan Baku</title></head>
<body>

<h1>List Req Bahan Baku</h1>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	$sql="SELECT * FROM req_bbaku JOIN bahan_baku ON bahan_baku.id_bbaku = req_bbaku.id_bbaku ORDER BY bahan_baku.n_bbaku";
	$res=$db->query($sql);
	if($res){
		$nomor= 1;
		?>
	
		
		<table border="1">
		<tr>
			<th>No</th><th>Nama Bahan Baku</th><th>Jumlah</th>
		</tr>
		
		<?php
			$data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
			foreach($data as $barisdata){ // telusuri satu per satu	
		?>

			<tr>
				<td><?php echo $nomor;?></td>
				<td><?php echo $barisdata["n_bbaku"];?></td>
				<td><?php echo $barisdata["jumlah"];?></td>
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
else
	echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>