<?php
if (!isset($_SESSION["id_pegawai"]))
header("Location: ../index.php");
include_once("functions.php");

$nama = $_SESSION["n_pegawai"];
$jabatan = $_SESSION["jabatan"];
?>

<div class="card mt-3" style="">
    <div class="card-header text-white bg-primary"><center>PEGAWAI</center></div>
    <div class="card-body">
        <ul class="nav flex-column ml-3">
            <li class="nav-item text-">
                <center><img class="img-circle" src="../img/koki.jpg" width="132" height="132" style="border-radius: 100%;"></center>
            </li>
            <li class="nav-item mt-3">
                <p><center><?php echo $nama; ?></center></p>
            </li>
            <li class="nav-item">
                <p><center><?php echo $jabatan; ?></center></p>
            </li>
        </ul>
    </div>


        <div class="card-header text-white bg-primary"><center>MENU</center></div>
        <div class="card-body p-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link actived" href="pesanan-list.php"><i class="fas fa-list-alt mr-2 btn-lg"></i>LIST PESANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="menu-list.php"><i class="fas fa-stream mr-2 btn-lg"></i>LIST MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="listbbaku.php"><i class="fas fa-bars mr-2 btn-lg text-dark"></i>LIST BAHAN BAKU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="reqbbaku.php"><i class="far fa-sticky-note mr-2 btn-lg text-dark"></i>REQ BAHAN BAKU</a>
                </li>
            </ul>
        </div>
</div>