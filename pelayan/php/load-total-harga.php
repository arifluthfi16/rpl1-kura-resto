<?php
$id_pesanan = $_GET['id_pesanan'];

require_once ('../PelayanController.php');
$p = new PelayanController();

$detailReview = $p->getDetailPesanan($id_pesanan);
$noMeja = $detailReview[0]['no_meja'];
$totalHarga = $detailReview[0]['total_harga'];
?>

<table class="table table-bordered">
    <thead>
    <th>No Meja</th>
    <th>Total Harga</th>
    </thead>
    <tr>
        <td><?php echo $noMeja?></td>
        <td><?php echo $totalHarga ?></td>
    </tr>
</table>
