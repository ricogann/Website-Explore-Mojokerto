<?php
    
    require("../em_frontend/config/koneksi.php");
    session_start();
    $id = $_SESSION['user']['id'];

    if(isset($_POST['pass1']) && isset($_POST['pass2'])){

        $new_pass = $_POST['pass1'];
        $confirm_pass = $_POST['pass2'];


        $sql = "SELECT * FROM accounts where id = '$id'";
        $query = mysqli_query($con,$sql);

        if(mysqli_num_rows($query) > 0){

            if($new_pass!=$confirm_pass){
                echo "tidak sama!";
            }else{
                $confirm_pass = password_hash($confirm_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE accounts set pass='$confirm_pass' where id=$id";
                $query = mysqli_query($con,$sql);
                
                if($query){
                    header("location: ../em_frontend/login.php");
                }else{
                    echo "YAH GAGAL ERROR : ".$query;
                }
            }
        }else{
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else{
        echo "code ga nih!";
    }

?>