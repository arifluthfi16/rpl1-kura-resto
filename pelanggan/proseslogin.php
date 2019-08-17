<?php
    include_once ('PelangganController.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $p = new PelangganController();


    if($p->loginMejaController($username,$password) !== "0"){
        session_start();
        $_SESSION['no_meja'] = $p->loginMejaController($username,$password);

        header("Location: index.php");
    }else{
        //Login Salah
    }



?>