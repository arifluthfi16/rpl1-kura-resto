<?php


    session_start();

    //  Include Stuff
    include_once ('PelangganController.php');

    // Checking is it login or not
    if($_SESSION['no_meja'] == ''){
        header('Location: login.php');
    }

    // Initiate The Controller Object
    $p = new PelangganController();

    // Getting Menu Data
    $data = $p->getMenu();
?>
<head>
    <?php require_once ('../includes/header.php');?>
    <!-- Custome JS For This File Here -->
    <script src="js/pesan.js" type="text/javascript"></script>

</head>
<body>
<div class="container-fluid">
    <?php require_once ('../includes/navbar_pelanggan.php');?>

    <div class="row">

        <div class="col-lg-9 mt-3">
            <?php
                $j = floor(sizeof($data) / 4);
                $j = ($j%4 == 0) ? (sizeof($data)) : $j+1;
                $flag = 0;

                for($i = 0; $i < $j; $i++){
                    ?>
                    <div class="card-deck mb-4">
                        <?php
                            for($k=$flag; $k <= $flag+3;$k++){
                                
                                ?>
                                <div class="col-lg-3">
                                    <div class="card mr-0 ml-0">
                                        <img src="../gambar_menu/<?php echo $data[$k][2]?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $data[$k][1]?></h5>
                                            <p class="card-text"><?php echo $data[$k][4]?></p>
                                            <p class="card-text"><?php echo $data[$k][3]?></p>
                                            <button class="btn btn-success float-right" onclick="addToTablePesan('<?php echo $data[$k][0]?>','<?php echo $data[$k][1]?>','<?php echo $data[$k][3]?>');">Pesan</button>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if(!isset($data[$k+1])){
                                    break;
                                }
                            }
                        ?>
                    </div>
                <?php
                    if(!isset($data[$k+1])){
                        break;
                    }
                    $flag += 4;
                }
            ?>
        </div>
        <div class="col-lg-3">
            <?php require_once ('side-nav.php');?>
        </div>
    </div>



</div>
</div>
</body>
</html>