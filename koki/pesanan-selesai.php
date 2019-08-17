<?php
session_start();
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");
$db=dbConnect();
?>
<!DOCTYPE html>
<html><head><title>Proses Pesanan</title></head>
<body>


<?php

	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id_pesanan  		     =$db->escape_string($_GET["id_pesanan"]);
		$keterangan	  			 =$db->escape_string($_GET["keterangan"]);
   
                
            // Susun query update
            $sql="UPDATE pesanan SET keterangan='Selesai Dibuat' WHERE id_pesanan='$id_pesanan'";
            // Eksekusi query update
            $res=$db->query($sql);
            if($res){
                if($db->affected_rows>0){ // jika ada update data dan alihkan ke halaman req bbaku
                    echo "<script>alert('Pesanan Selesai');</script>";
                    echo "<script>location='pesanan-list.php';</script>";
                }
            }
        }
  
        

		