<?php
require_once ('../PelayanController.php');
$p = new PelayanController();

$id_detail_pesanan = $_GET['id_detail_pesanan'];

$dataDetail = $p->getInfoMenuPesanan($id_detail_pesanan);

$nama  = $dataDetail['n_menu'];
$jumlah = $dataDetail['jumlah'];
$harga = $dataDetail['harga'];
$id_pesanan = $dataDetail['id_pesanan'];

?>

<h5><?php echo $nama ?></h5>
<div class="form-group">
    <label for="jumlah">Jumlah</label>
    <input type="number" class="form-control" name="jumlah" value="<?php echo $jumlah?>">
    <input type="text" hidden name="id_detail_pesanan" value="<?php echo $id_detail_pesanan?>">
    <input type="text" hidden name="harga" value="<?php echo $harga?>">
    <input type="text" hidden name="id_pesanan" value="<?php echo $id_pesanan?>">
</div>
