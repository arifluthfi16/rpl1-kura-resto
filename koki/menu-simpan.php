<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>

<!DOCTYPE html>
<html><head><title>Penyimpanan Menu</title></head>
<body>

<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data

		// ambil data file
		$namaFile = $_FILES['gambar']['name'];
		$namaSementara = $_FILES['gambar']['tmp_name'];
		// tentukan lokasi file akan dipindahkan
		$dirUpload = "../gambar_menu/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


		$n_menu	   =$db->escape_string($_POST["n_menu"]);
        $gambar    =$namaFile;
        $harga	   =$db->escape_string($_POST["harga"]);
        $kategori  =$db->escape_string($_POST["kategori"]);
        

		// Susun query insert
		$sql="INSERT INTO menu(n_menu,gambar,harga,keterangan,kategori)
			  VALUES('$n_menu','$gambar','$harga','-','$kategori')";
		// Eksekusi query insert
		$res=$db->query($sql);
		echo "<script>alert('Data Menu berhasil tersimpan ! Lanjutkan dengan memasukkan bahan yang dipakai dengan klik tambah/hapus bahan baku pada menu yang dibuat');</script>";
		echo "<script>location='menu-list.php';</script>";
	
		}	
	
	else{
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
	}
}
?>
</body>
</html>
