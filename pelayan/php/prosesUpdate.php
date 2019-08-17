<?php
require_once ('../PelayanController.php');

$jumlah = $_POST['jumlah'];
$id_detail_pesanan = $_POST['id_detail_pesanan'];
$harga = $_POST['harga'];
$id_pesanan = $_POST['id_pesanan'];

$p = new PelayanController();

$statusUpdate = $p->updateInfoMenuPesanan($id_detail_pesanan,$jumlah,$harga,$id_pesanan);

if($statusUpdate){
    echo "sukses";
}else{
    echo "gagal";
}

$path = realpath(dirname(__FILE__).'\..\reviewPesanan.php')."?id_detail_pesanan=$id_detail_pesanan";

?>


