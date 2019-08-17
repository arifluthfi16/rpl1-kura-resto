<?php
    require_once ('PelayanController.php');
    $id_pesanan = $_GET['id_pesanan'];

    $p = new PelayanController();

    if($p->deletePesanan($id_pesanan)){
        echo "Sukses";
    }else{
        echo "Error";
    }

?>