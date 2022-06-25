<?php
    require('./config/koneksi.php');

    $id = $_POST['id'];
    $id_titikawal = $_POST['titik_awal'];
    $hasil = mysqli_query($con,"SELECT * from data_titikawal where id=$id_titikawal");
    $myArrays3 = array();
    if ($hasil->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $hasil->fetch_assoc()) {
            $myArrays3[$i] = $row;
            $i++;
        }
        // var_dump($myArrays3[0]);
    }


    $result = mysqli_query($con,"SELECT * from paket_wisata where id=$id");
    $myArrays = array();
    $myArrays1 = array();

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $myArrays[$i] = $row;
            $i++;
        }
        // var_dump($myArrays[0]);
    }

    if ($result->num_rows > 0) {
        // output data of each row
        $a = 0;
        while($row1 = $result->fetch_assoc()) {
            $myArrays1[$i] = $row1;
            $i++;
        }

        // var_dump($myArrays[0]);
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
        <div class="container-main">
            <?php  foreach($myArrays as $arr) {?>
                <h2 class="title-main"><?= $arr['nama'];?></h2>
            <?php } ?>
            <p class="sub-main">Mulai Perjalanan mu Disini</p>
            <div class="container-content-main">
            <?php  foreach($myArrays3 as $arr) {?>
                <div class="card-main">
                        <?php 
                            $arr2 = explode(',',$arr["nama"]);
                            $i = 0;
                        ?>
                        <div class="br-1">
                            <img src="./assets/<?= $arr2[1]?>" alt="main1" class="img-main" width="200px" height="80px">
                        </div>
                        <div class="desc-main">
                            <?= $arr2[$i]?>
                        </div>
                    </div>
                    <div class="line-red">

                    </div>
                </div>
            <?php } ?>
            <?php  foreach($myArrays as $arr) {?>
                <div class="card-main">

                    <?php
                            
                        $arr2 = explode(',',$arr["list_wisata"]);
                        $arr3 = explode(',',$arr["list_secondary_wisata"]);
                        $i = 0;
                    ?>

                    <div class="br-1">
                        <img src="./assets/<?= $arr2[1]?>" alt="main1" class="img-main" width="200px" height="83px">
                    </div>
                    <div class="desc-main">
                        <?= $arr2[$i]?>
                    </div>
                </div>
                <div class="line-red">
                
                    <div class="secondary-main left">
                        <a href=""><?= $arr3[$i + 0]?></a>
                    </div>
                </div>
                <?php $i++;?>
            <?php } ?>

            <?php  foreach($myArrays as $arr) {?>
                <div class="card-main">

                    <?php
                            
                        $arr2 = explode(',',$arr["list_wisata"]);
                        $arr3 = explode(',',$arr["list_secondary_wisata"]);
                        $i = 3;
                        $a = 0;
                    ?>

                    <div class="br-1">
                        <img src="./assets/<?= $arr2[4]?>" alt="main1" class="img-main" width="200px" height="80px">
                    </div>
                    <div class="desc-main">
                        <?= $arr2[$i]?>
                    </div>
                </div>
                <div class="line-red">
                
                    <div class="secondary-main left">
                        <a href=""><?= $arr3[0+1]?></a>
                    </div>
                </div>
                <?php $i++;?>
            <?php } ?>
            
            <?php  foreach($myArrays as $arr) {?>
                <div class="card-main">

                    <?php
                            
                        $arr2 = explode(',',$arr["list_wisata"]);
                        $arr3 = explode(',',$arr["list_secondary_wisata"]);
                        $i = 6;
                        $a = 0;
                    ?>

                    <div class="br-1">
                        <img src="./assets/<?= $arr2[7]?>" alt="main1" class="img-main" width="200px" height="80px">
                    </div>
                    <div class="desc-main">
                        <?= $arr2[$i]?>
                    </div>
                </div>
                <div class="line-red">
                
                    <div class="secondary-main left">
                        <a href=""><?= $arr3[$a+2]?></a>
                    </div>
                </div>
                <?php $i++;?>
            <?php } ?>        
            </div>
        </div>
    </div>
</body>
<script>
    document.querySelectorAll(".card-main").forEach(e => {
        e.addEventListener("click", (e) => {
            console.log(e.target.classList.add("clicked"));
        })
    })
</script>
</html>