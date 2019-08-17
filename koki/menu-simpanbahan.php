<?php
include_once("functions.php");
$db=dbConnect();
if(isset($_GET["id_bbaku"])){
        $id_bbaku=$db->escape_string($_GET["id_bbaku"]);
        $id_menu=$db->escape_string($_GET["id_menu"]);

        $sql="INSERT INTO detail_menu(id_menu,id_bbaku)
        VALUES('$id_menu','$id_bbaku')";
        // Eksekusi query delete
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0) // jika ada data terhapus
                echo "<script>alert('Bahan berhasil ditambahkan');</script>";
                echo "<script>location='menu-daftarbahan.php?id_menu= $id_menu';</script>";
        }
        else{ // gagal query
            echo "Data gagal ditambahkan. <br>";
        }
    }
?>
    