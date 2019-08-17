<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 8/1/2019
 * Time: 10:36 PM
 */
include_once ('../functions.php');
class PelangganController extends con
{
    public function loginMejaController($username, $password){
        $loginValid = false;
        $no_meja = 0;

        $sql = "SELECT * FROM meja WHERE username_meja = '$username'";

        $data = $this->db->query($sql)->fetch_assoc();

        if($username == $data['username_meja'] && $password == $data['password_meja']){
            $loginValid = true;
            $no_meja = $data['no_meja'];
        }

        if($loginValid){
            return $no_meja;
        }

        return $no_meja;
    }

    public function logoutMeja(){
        session_destroy();
    }

    // Ambil menu yang tersedia
    public function getMenu(){

        $sql = "SELECT * FROM menu";

        $data = $this->db->query($sql)->fetch_all();

//        //Validasi menu
//        foreach ($data as $menu){
//
//        }

        return $data;
    }

    public function getPesananMeja($no_meja){
        $sql = "SELECT * FROM pesanan WHERE no_meja = $no_meja AND status_aktif=1";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
        
        return $data;
    } 

    public function getDetailPesanan($id_pesanan){
        $sql = "select menu.n_menu, menu.gambar, menu.harga,detail_pesanan.jumlah,detail_pesanan.subharga from detail_pesanan
        join menu on detail_pesanan.id_menu = menu.id_menu
        where detail_pesanan.id_pesanan = $id_pesanan";
        $data = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function getHargaMenu($id_menu){
        $sql = "SELECT harga from menu where id_menu = '$id_menu'";
        $data = $this->db->query($sql)->fetch_assoc();
        return (int)$data['harga'];
    }
}