<?php

    require('./config/koneksi.php');

    require ("../em_frontend/config/koneksi.php");
    session_start();

    if(isset($_SESSION['isLogin'])){
        $_SESSION['user'];
    }else{
        echo"Login dulu gan!";
    }

    $result = mysqli_query($con,"SELECT * from data_titikawal");
    $myArrays = array();

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
          $arr2 = explode(',',$row["nama"]);
          $myArrays[$i] = $arr2;   
            $i++;
        }
    }

    $result1 = mysqli_query($con,"SELECT * from preferensi_wisata");
    $myArrays1 = array();

    if ($result1->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row1 = $result1->fetch_assoc()) {
          $myArrays1[$i] = $row1["nama"];   
            $i++;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore mojokerto | Maari kita eksplor...</title>
    <link rel="stylesheet" href="op.css">
</head>

<body>
    <div class="container">
        <div class="container-initial">
            <nav class="nav-dashboard">
                <div class="profil-nav-dashboard">
                    <img src="./assets/profil.png" alt="profil" width="60px">
                </div>
                <?php
                    $nama = explode(" ", $_SESSION['user']['nama'])[0];
                ?>
                <h2 class="name-dashboard">hi.... <br><?php echo $nama?></h2>
                <button class="btn-nav-dashboard">
                    <img src="./assets/notif.png" alt="notif ico">
                </button>
            </nav>



            <div class="content-initial">
                <div class="jumbotron-initial">
                    <img src="./assets/init1.png" alt="wisata1">
                </div>
                <form action="./pkt_wst.php" method="POST">
                <div class="container-input-initial">
                    <label for="titik_awal" class="label-input-intial">Pilih Titik Awal</label> <br>
                    <select name="titik_awal" id="titik_awal" class="select-initial">
                        <?php foreach ($myArrays as $value) { ?>
                            
                            <option value="<?= "$value[0],$value[1]" ?>" class="option-initial"><?= $value[0] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container-input-initial">
                    <label for="preferensi" class="label-input-intial">Preferensi Wisata</label> <br>
                    <select name="preferensi" id="preferensi" class="select-initial">
                        <?php foreach ($myArrays1 as $value) { ?>
                            <option value="<?= $value ?>" class="option-initial"><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn-dashboard">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>