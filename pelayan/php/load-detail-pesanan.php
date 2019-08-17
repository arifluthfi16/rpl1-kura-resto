<?php
require_once ('../PelayanController.php');
$p = new PelayanController();

$id_pesanan = $_GET['id_pesanan'];

$detailReview = $p->getDetailPesanan($id_pesanan);
?>

<table class="table table-bordered" id="detailReviewLoadTarget" width="">
    <thead>
    <th>#</th>
    <th>Nama Menu</th>
    <th>Gambar</th>
    <th>Jumlah</th>
    <th>Harga</th>
    <th>Subharga</th>
    <th>Aksi</th>
    </thead>
    <?php
    for ($i=0;$i<sizeof($detailReview);$i++){
        $namaMenu = $detailReview[$i]['n_menu'];
        $jumlah = $detailReview[$i]['jumlah'];
        $harga = $detailReview[$i]['harga'];
        $subharga = $detailReview[$i]['subharga'];
        $gambar = $detailReview[$i]['gambar'];
        $id_detail_pesanan = $detailReview[$i]['id_detail_pesanan'];

        echo "
                                    <tr>
                                        <td>$i</td>
                                        <td>$namaMenu</td>
                                        <td>$gambar</td>
                                        <td>$jumlah</td>
                                        <td>$harga</td>
                                        <td>$subharga</td>
                                        <td>
                                            <button class='btn btn-info btn-sm' onclick='openEditModal($id_detail_pesanan)'>Edit</button>
                                            <button class='btn btn-danger btn-sm' onclick='deleteDetailPesanan($id_detail_pesanan,$id_pesanan)'>Delete</button>
                                        </td>
                                    </tr>
                                    ";
    }
    ?>
</table>
