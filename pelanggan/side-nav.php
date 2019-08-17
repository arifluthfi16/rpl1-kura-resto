<?php
$no_meja = $_SESSION['no_meja'];

?>

<div class="card mt-3" style="">
    <div class="card-header text-white bg-primary"><center>Daftar Pesanan</center></div>
    <div class="card-body p-2">
            <table class="table table-borderless table-sm">
                <tr>
                    <td width="50%">No Meja</td>
                    <td><center><?php echo $no_meja?></center></td>
                </tr>
            </table>
            <ul class="nav flex-column">
                <table class="table table-sm table-bordered" id="tablePesan">
                    <tr>
                        <td width="30%">Makanan</td>
                        <td width="30%" >Banyak</td>
                        <td>Sub Total</td>
                    </tr>
                </table>
            </ul>
        </div>
    <div class="card-header text-white bg-primary">
        <center>Total</center>
    </div>

    <div class="card-body">
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
            </div>
            <input type="text" class="form-control" id="totalHargaPesan" placeholder="Total" disabled>
        </div>
        <button onclick="sendAjaxRequest('<?php echo $no_meja?>')" class="btn btn-info float-right">Pesan Sekarang</button>
    </div>
</div>