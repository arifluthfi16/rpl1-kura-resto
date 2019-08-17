<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 8/16/2019
 * Time: 10:44 PM
 */
require_once ((realpath(dirname(__FILE__))).'\..\functions.php');
class PelayanController extends con
{

    // Get Seluruh daftar pesanan yang harus di review
    public function getDaftarReview(){
        $sql = "SELECT * FROM pesanan where status_review=0";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    // Get Seluruh Riwayat Pesanan
    public function getRiwayatPesanan(){
        $sql = "SELECT * FROM pesanan";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // Get Seluruh Pesanan yang Request untuk pembayaran
    public function getRequestBayar(){
        $sql = "SELECT * from pesanan where status_request_bayar=1";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    // Delete Pesanan
    public function deletePesanan($id_pesanan){
        $sql = "DELETE from pesanan where id_pesanan ='$id_pesanan'";
        if($this->db->prepare($sql)->execute()){
            return true;
        }
        return false;
    }

    // Get Detail Pesanan
    public function getDetailPesanan($id_pesanan){
        $sql = "select id_detail_pesanan,menu.n_menu, menu.gambar, menu.harga,detail_pesanan.jumlah,detail_pesanan.subharga, no_meja,total_harga from detail_pesanan
        join menu on detail_pesanan.id_menu = menu.id_menu
        join pesanan p on detail_pesanan.id_pesanan = p.id_pesanan
        where detail_pesanan.id_pesanan = $id_pesanan";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function reloadTotal($id_pesanan){
        $sql = "select total_harga from pesanan where id_pesanan=$id_pesanan";
        $data = $this->db->query($sql)->fetch_assoc();

        return $data['total_harga'];
    }

    // Get Info Detail Menu Pesanan
    public function getInfoMenuPesanan($id_detail_pesanan){
        $sql = "
                select detail_pesanan.*, m.harga, m.n_menu
                from kura_resto.detail_pesanan
                join menu m on detail_pesanan.id_menu = m.id_menu
                where id_detail_pesanan = $id_detail_pesanan
                ";

        $data = $this->db->query($sql)->fetch_assoc();
        return $data;
    }

    public function updateInfoMenuPesanan($id_detail_pesanan,$jumlah,$harga,$id_pesanan){
        $sql = "SELECT subharga from detail_pesanan where id_detail_pesanan=$id_detail_pesanan";
        $subhargaLama = $this->db->query($sql)->fetch_assoc();
        $subhargaLama = (int)$subhargaLama['subharga'];

        $sql = "SELECT total_harga from pesanan where id_pesanan = $id_pesanan";
        $totalLama = $this->db->query($sql)->fetch_assoc();
        $totalLama = (int)$totalLama['total_harga'];

        $subhargaBaru = (int)$jumlah * (int)$harga;
        $totalBaru = ($totalLama-$subhargaLama)+$subhargaBaru;

        $sql = "UPDATE pesanan set total_harga=$totalBaru where id_pesanan = $id_pesanan";
        $PS = $this->db->prepare($sql)->execute();

        $sql = "UPDATE detail_pesanan SET jumlah=$jumlah, subharga=$subhargaBaru where id_detail_pesanan=$id_detail_pesanan";
        $PS = $this->db->prepare($sql);
        if($PS->execute()){
            return true;
        }
        return false;
    }

    public function deleteInfoMenuPesanan($id_detail_pesanan){
        $sql = "SELECT subharga,id_pesanan from detail_pesanan where id_detail_pesanan=$id_detail_pesanan";
        $dataLama = $this->db->query($sql)->fetch_assoc();
        $subhargaLama = (int)$dataLama['subharga'];
        $id_pesanan = $dataLama['id_pesanan'];

        $sql = "UPDATE pesanan set total_harga=total_harga-$subhargaLama where id_pesanan = $id_pesanan";
        $PS = $this->db->prepare($sql)->execute();

        $sql = "DELETE from detail_pesanan where id_detail_pesanan='$id_detail_pesanan'";

        $status = $this->db->prepare($sql)->execute();

        if($status){
            return "success";
        }

        return "fail";
    }
}