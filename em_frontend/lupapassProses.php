<?php

    require("../em_frontend/config/koneksi.php");
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/SMTP.php';
    require './PHPMailer-master/src/PHPMailer.php';

    $email = $_POST['email'];

    $sql = "SELECT * FROM accounts where email='$email'";
    $query = mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0){
        try{
            $user = mysqli_fetch_assoc($query);
            $code = $user['code'];
            session_start();
            $_SESSION['user'] = $user;
            
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
            $body = "Hi,<br>To access for a new password, here's your code :".$code;
            $mail->Body    = $body;
            $mail->AltBody = 'Reset Password Verification';
    
    
            $mail->send();
            echo '<script>alert("Message Sent");</script>';
            header("location: ../em_frontend/kode.php");
            }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }else{
        echo '<script>alert("Email tidak ada");</script>';
    }

?>