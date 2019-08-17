<?php
require_once ('../PelayanController.php');
$id_detail_pesanan = $_GET['id_detail_pesanan'];

$p = new PelayanController();

if($p->deleteInfoMenuPesanan($id_detail_pesanan)){
    echo "Sukses";
}else{
    echo "Error";
}

?>