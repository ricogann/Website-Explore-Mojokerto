<?php
    require('./config/koneksi.php');

    $value1 = $_POST['titik_awal'];
    $value2 = $_POST['preferensi'];

    $hasila = mysqli_query($con,"SELECT * from data_titikawal where nama='$value1'");
    $titik = mysqli_fetch_assoc($hasila);
    $id_titik = $titik['id'];

    $hasil = mysqli_query($con,"SELECT * from preferensi_wisata where nama='$value2'");
    $user = mysqli_fetch_assoc($hasil);
    $id = $user['id'];

    $result = mysqli_query($con,"SELECT * from paket_wisata where id_preferensi=$id");
    $myArrays = array();

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $myArrays[$i] = $row;
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
        <form action="main.php" method="POST">
        <div class="container-paket">
            
            <?php  foreach($myArrays as $arr) {?>
                <div class="card-paket">
                    
                    <?php
                        $arr2 = explode(',',$arr["nama"]);
                        $i = 0;
                    ?>
                    
                    <h2 class="title-paket"><?php echo $arr2[$i]; ?></h2>
                    
                    <img src="./assets/<?php echo $arr["foto"] ?>" alt="paket-img" class="img-paket">

                    <p class="desc-card-paket">
                        Bernostalgia dengan kembali menikmati dan mengagumi peninggalan prasejarah Majapahit.
                    </p>
                    <input type="text" name="titik_awal" id="titik_awal" value="<?= $id_titik; ?>" hidden>
                </div>
                <button class="btn-card-paket" name="id" value="<?= $arr['id']; ?>">Mulai</button>
        
            <?php } ?>
        </div>
        </form>
    </div>
</body>
</html>