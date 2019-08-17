<div class="card mt-3" style="">
    <div class="card-header text-white bg-primary"><center>PEGAWAI</center></div>
    <div class="card-body">
        <ul class="nav flex-column">
            <li class="nav-item text-">
                <center><img class="img-circle" src="1632.jpg" width="132" height="132" style="border-radius: 100%;"></center>
            </li>
            <li class="nav-item mt-3">
                <p><center><?php echo $_SESSION['n_pegawai']; ?></center></p>
            </li>
            <li class="nav-item">
                <p><center>Pelayan</center></p>
            </li>
        </ul>
    </div>


        <div class="card-header text-white bg-primary"><center>MENU</center></div>
        <div class="card-body p-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link actived" href="index.php"><i class="far fa-list-alt mr-2 btn-lg"></i></i>REVIEW PESANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link actived" href="riwayatPesanan.php"><i class="fas fa-th-list mr-2 btn-lg"></i>RIWAYAT PESANAN</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link actived" href="requestPembayaran.php"><i class="fas fa-file-invoice-dollar mr-2 btn-lg"></i>DAFTAR REQUEST PEMBAYARAN</a>
                </li>
            </ul>
        </div>
</div>