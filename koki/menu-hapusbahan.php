<?php
    include_once("functions.php");
    $db=dbConnect();
    if(isset($_GET["id_bbaku"])){
        $id_bbaku=$db->escape_string($_GET["id_bbaku"]);
        $id_menu=$db->escape_string($_GET["id_menu"]);
   
        $sql="DELETE FROM detail_menu WHERE id_bbaku='$id_bbaku' AND id_menu='$id_menu' ";
        // Eksekusi query delete
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0) // jika ada data terhapus
                echo "<script>alert('Bahan berhasil dihapus');</script>";
                echo "<script>location='menu-daftarbahan.php?id_menu= $id_menu';</script>";
        }
        else{ // gagal query
            echo "Data gagal dihapus. <br>";
        }
    }