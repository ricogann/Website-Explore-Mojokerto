<?php

    require("../em_frontend/config/koneksi.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/SMTP.php';
    require './PHPMailer-master/src/PHPMailer.php';

    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $code = random_int(0, 999999);

    $sql = "SELECT * FROM accounts where email='$email'";
    $query = mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0){
        echo '<script>alert("Email sudah terdaftar");</script>';
    }else{
        $sql = "INSERT INTO accounts (nama,email,pass,code)VALUES('$nama','$email','$password','$code')";
        $query = mysqli_query($con,$sql);

        try{

            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'ricoputraanugerah@gmail.com';                     //SMTP username
            $mail->Password   = 'sxjaxpdueibvxfej';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            $mail->setFrom('no-reply@yourwebsite.com', 'Your Website Services');
            $mail->addAddress($email);
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Password Verification - Explore Mojokerto';
            $body = "Hi,<br>To access for a new password, here's the link : <br> http://localhost/em_frontend/confirmEmail.php?code=".$code;
            $mail->Body    = $body;
            $mail->AltBody = 'Reset Password Verification';
    
    
            $mail->send();
            echo '<script>alert("Message Sent");</script>';
            
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        header("location: ../em_frontend/login.php");
    }

?>