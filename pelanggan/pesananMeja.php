<?php
session_start();

//  Include Stuff
include_once('PelangganController.php');

// Checking is it login or not
if ($_SESSION['no_meja'] == '') {
    header('Location: login.php');
}

// Initiate The Controller Object
$p = new PelangganController();

// Getting Menu Data
$data = $p->getPesananMeja($_SESSION['no_meja']);

function array_create_associative_menu_detail($array, $id, $value,$total){
    $array['id_pesanan'] = $id;
    $array['total'] = $total;
    $array['detail_pesanan'] = $value;
    return $array;
}

function create_card_detail_pesanan($header,$img_link,$title,$jumlah,$harga){
    ?>
    <div class="col-lg-3">
        <div class="card">
            <img src="../gambar_menu/<?php echo $img_link?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $title?>
                </h5>
                <table width="100%">
                    <tr>
                        <td>Jumlah</td>
                        <td><?php echo $jumlah?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><?php echo $harga?></td>
                    </tr>
                    <tr>
                        <td>Subharga</td>
                        <td><?php echo (int)$jumlah*(int)$harga?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
}


// Form the data
$dataPesanan = [];

foreach ($data as $item){
    $temp = array();
    $id_pesanan = $item['id_pesanan'];
    $total = $item['total_harga'];
    $detailPesanan = $p->getDetailPesanan($id_pesanan);
    $detail = array_create_associative_menu_detail($dataPesanan, $id_pesanan,$detailPesanan,$total);
    array_push($dataPesanan,$detail);
}

function finalTotalPrice($dataPesanan){
    $temp = 0;
    foreach ($dataPesanan as $item){
        $temp += (int)$item['total'];
    }

    return $temp;
}

?>
<head>
    <?php require_once('../includes/header.php'); ?>
    <!-- Custome JS For This File Here -->
    <script src="js/pesan.js" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid">
    <?php require_once('../includes/navbar_pelanggan.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-3">
                    <h3 class="display-5">Daftar menu yang dipesan</h3>
                </div>
                <?php
                for($i=0;$i<sizeof($dataPesanan);$i++){
                    ?>
                    <div class="row">
                        <?php
                        foreach($dataPesanan[$i]['detail_pesanan'] as $item){
                            create_card_detail_pesanan("Hedaer",$item['gambar'],$item['n_menu'],$item['jumlah'],$item['subharga']);

                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-3">
                <?php require_once ('side-nav-daftar-pesanan.php')?>
            </div>
        </div>
    </div>
</div>
</body>
</html>