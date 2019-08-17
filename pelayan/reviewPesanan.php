<?php session_start() ?>
<?php

$id_pesanan = $_GET['id_pesanan'];

require_once ('PelayanController.php');
$p = new PelayanController();

$detailReview = $p->getDetailPesanan($id_pesanan);
$noMeja = $detailReview[0]['no_meja'];
$totalHarga = $detailReview[0]['total_harga'];
?>
<!doctype html>
<html lang="en">
<head>
    <?php require_once ('../includes/header.php');?>
</head>
<body>
<div class="container-fluid">
    <?php require_once ('../includes/navbar.php');?>

    <div class="row">
        <div class="col-md-3">
            <?php require_once('side-nav.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="card mt-3">
                <div class="card-header">
                    <form class="form-inline my-2 my-lg-0 ml-auto float-right">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Cari Menu</button>
                    </form>
                </div>
                <div class="card-body">
                    <h3>Id Pesanan : <?php echo $id_pesanan?></h3>
                    <div id="target-load-total">
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
                    </div>

                    <hr>
                    <div class="row d-flex justify-content-end">
                        <button class="btn btn-success mr-3 mb-3">Tambah Pesanan</button>
                    </div>
                    <div id="target-load-detail">
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
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="php/prosesUpdate.php" method="post">
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary">Save changes</input>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="js/pelayan.js"></script>
</html>