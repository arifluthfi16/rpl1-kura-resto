<?php
require_once('PelayanController.php');
$p = new PelayanController();
$dataReview = $p->getDaftarReview();

function buatRow($no_meja,$keterangan,$total_harga,$id_pesanan){
    echo
    "<tr>
                <td>$no_meja</td>
                <td>$keterangan</td>
                <td>$total_harga</td>
                <td>
                    <a href='reviewPesanan.php?id_pesanan=$id_pesanan' class='btn btn-info'>Review</a>            
                    <btn onclick='deletePesanan($id_pesanan);' class='btn btn-danger'>Hapus</btn>            
                </td>       
            </tr>";
}
?>
    <table class="table">
        <thead>
        <th>No Meja</th>
        <th>Keterangan</th>
        <th>Total Harga</th>
        <th>Aksi</th>
        </thead>
        <?php
        foreach($dataReview as $itemReview){
            buatRow($itemReview['no_meja'],$itemReview['keterangan'],$itemReview['total_harga'],$itemReview['id_pesanan']);
        }
        ?>
    </table>
<?php

?>