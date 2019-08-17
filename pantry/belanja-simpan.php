<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><title>Penyimpanan Data Belanja</title></head>
<body>


<?php

$tgl_belanja = date("Y-m-d");	

?>


<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_bbaku	   =$db->escape_string($_POST["id_bbaku"]);
		$jumlah        =$db->escape_string($_POST["jumlah"]);
        $subharga      =$db->escape_string($_POST["subharga"]);
	
		// Susun query insert
		$sql="INSERT INTO belanja(id_bbaku,tgl_belanja,jumlah,subharga)
			  VALUES('$id_bbaku','$tgl_belanja','$jumlah','$subharga')";
		// Eksekusi query insert
		$res=$db->query($sql);

		//jumlah yang sudah dimasukkan langsung terupdate dengan jumlah yang dahulu
		$koneksi = new mysqli("localhost","root","","kura_resto");
		$ambil = $koneksi->query("SELECT * from bahan_baku where id_bbaku='$id_bbaku'");
		$pecah = $ambil->fetch_assoc();
	    
		
		$jumlahdulu  = $pecah["stok"];
		$jumlahterbaru = $jumlahdulu + $jumlah;
        $koneksi->query("UPDATE bahan_baku set stok='$jumlahterbaru' where id_bbaku='$id_bbaku' ");			
		
		
			}
		
		else{
			?>
			Data gagal disimpan karena id bahan baku mungkin sudah ada.<br>
			<a href="javascript:history.back()"><button>Kembali</button></a>
			<?php
		}
	}
	
	else{
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>
<?php
echo "<script>alert('bahan baku telah dimasukkan ke data belanja');</script>";
echo "<script>location='belanja-databelanja.php';</script>";
?>