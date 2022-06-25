<?php

    require("../em_frontend/config/koneksi.php");

    if(isset($_POST['code'])){
        
        $code = $_POST['code'];
        $sql = "SELECT * FROM accounts where code = '$code'";
        $query = mysqli_query($con,$sql);
        $up_code = random_int(0, 999999);

        if(mysqli_num_rows($query) > 0){

            $user = mysqli_fetch_assoc($query);
            $code = $user['code'];
            $sql = "UPDATE accounts set code=$up_code where code=$code";
            $query = mysqli_query($con,$sql);
            if($query){
                header("location: ../em_frontend/resetpass.php");
            }else{
                echo "YAH GAGAL ERROR : ".$query;
            }
        }else{
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else{
        echo "code ga nih!";
    }

?>