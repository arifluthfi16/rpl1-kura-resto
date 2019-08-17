<?php session_start() ?>
<?php
    require_once ('PelayanController.php');
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
                    <div id="loadTarget">
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
                    </div>

                </div>
            </div>
        </div>
    </div>




</div>
</div>
</body>
    <script src="js/pelayan.js"></script>
    <script>
        $(window).ready(function () {
            setInterval(loadPesanan, 5000);
        })
    </script>
</html>