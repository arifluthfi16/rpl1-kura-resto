<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Req Bahan Baku</title></head>
<body>


<?php




if(isset($_POST["TblUpdate"])){
 
	$db=dbConnect();
	if($db->connect_errno==0){

		// ambil data file
		$namaFile = $_FILES['gambar_baru']['name'];
		$namaSementara = $_FILES['gambar_baru']['tmp_name'];
		// tentukan lokasi file akan dipindahkan
		$dirUpload = "../gambar_menu/";

		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		// Bersihkan data
		$id_menu  		     =$db->escape_string($_POST["id_menu"]);
		$n_menu	  			 =$db->escape_string($_POST["n_menu"]);
        $gambar_dulu	  	 =$db->escape_string($_POST["gambar"]);
        $gambar_baru    	 =$namaFile;
        $harga	  			 =$db->escape_string($_POST["harga"]);
        $kategori	  		 =$db->escape_string($_POST["kategori"]);
        
        


        if(empty($gambar_baru) )
        {
            $gambar = $gambar_dulu;
        }

        else 
        {
            $gambar = $gambar_baru;
           
        }
        
      
    
    
       

		// Susun query update
		$sql="UPDATE menu SET n_menu='$n_menu', gambar='$gambar', harga='$harga', kategori='$kategori' WHERE id_menu='$id_menu'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data dan alihkan ke halaman req bbaku
				echo "<script>alert('Data Menu Berhasil Diubah');</script>";
				echo "<script>location='menu-list.php';</script>";
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				echo "<script>alert('Data berhasil terupdate namun tidak mengalami perubahan, edit kembali');</script>";
				echo "<script>location='javascript:history.back()';</script>";
			}
		}
		else{ // gagal query
			echo "<script>alert('Data gagal diupdate');</script>";
			echo "<script>location='javascript:history.back()';</script>";
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>