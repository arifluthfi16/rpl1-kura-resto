<?php
include_once ('PelangganController.php');

$p = new PelangganController();

$data = $_POST['data'];
$ar =  $data['outObject'];
$no_meja = $data['no_meja'];
$tgl_pesanan = date('Y-m-d');
$total = 0;
foreach ($ar as $item){
    $total+=$item['subharga'];
}

try{
    //Beggining transaction
    $p->db->begin_transaction();
    // SQL Buat Pesanan
    $sql = "INSERT INTO pesanan(id_pegawai,no_meja,tgl_pesanan,total_harga,keterangan,status_aktif) VALUES('1','$no_meja','$tgl_pesanan',$total,'kosong',1)";
    $PS = $p->db->prepare($sql);

    // If There is no error when creating order, then it will insert orders.
    if($PS->execute()){
        $sql = "SELECT id_pesanan from pesanan order by id_pesanan desc limit 1";
        // Getting the lastest id
        $latest_id = $p->db->query($sql)->fetch_assoc()['id_pesanan'];
        // Inserting Details
        foreach ($ar as $item ){
            $harga = (int)$item['subharga'] / (int)$item['jum'];
            $subHarga = $harga*$item['jum'];
            $id = $item['id'];
            $jum = $item['jum'];
            $sql = "INSERT INTO detail_pesanan(id_pesanan, id_menu,jumlah,subharga) values ('$latest_id','$id','$jum',$subHarga) ";
            $p->db->prepare($sql)->execute();
        }
    }

    $p->db->commit();
    echo "Succeed";
}catch (Exception $e){
    $p->db->rollback();
    echo "Error";
}






?>
