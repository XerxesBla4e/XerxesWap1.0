<?php
include("../connection.php");

if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'C:\wamp\composer\vendor\autoload.php';

date_default_timezone_set('Etc/UTC');

function send_password_reset($name,$email,$token){
   
            
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();  
        $mail->SMPTDebug = 2;
        $mail->SMTPAuth   = true; 
                                       
        $mail->Host       =  'smtp.gmail.com';                                      
        $mail->Username   = 'mugasha@gmail.com';                     
        $mail->Password   = 'secret';    
    
        $mail->SMTPSecure = 'tls';     
        $mail->Port       = 587;      
        $mail->SMTPOptions = array(
           'ssl' => array(
               'verify_peer'=>false,
               'verify_peer_name'=>false,
               'allow_self_signed'=>true
           )
        );                          
       
        $mail->setFrom('mugasha@gmail.com', $name);
        $mail->addAddress('Mugashab@gmail.com');     
       
        $mail->isHTML(true);                                  
        $mail->Subject = 'Reset password notification';
    
        $mail_template = "
           <h2>Hello</h2>
           <h3>You are receiving this email coz you requested a password reset</h3>
           <br/><br/>
           <a href='http://127.0.0.1/mvie/admin/password-change.php?token=$token&email=$email'>Click Me</a>
        ";
    
        $mail->Body = $mail_template;
        $mail->send();
       
    } catch (Exception $e) {
        echo "Mailer Error: {$e->ErrorInfo}";
    }
   
}

if(isset($_POST["pass_reset_link"])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM accounts WHERE email='$email' LIMIT 1";
    $res = mysqli_query($con,$check_email);

    if(mysqli_num_rows($res)>0)
    {
      $row= mysqli_fetch_array($res);
      $name = $row['name'];
      $email = $row['email'];

      $update_token = "UPDATE accounts SET verify_token = '$token' WHERE email='$email' LIMIT 1";
      $updt_res = mysqli_query($con, $update_token);

      if($updt_res){
         send_password_reset($name,$email,$token);
         $_SESSION['status'] = "We emailed you a password reset link";
         header("Location:".HOMEURL.'admin/pass_reset.php');
         exit(0);
      }else{
        $_SESSION['status'] = "Oops! something went wrong";
        header("Location:".HOMEURL.'admin/pass_reset.php');
        exit(0);
      }
    }else{
        $_SESSION['status'] = "No Email Found";
        header("Location:".HOMEURL.'admin/pass_reset.php');
        exit(0);
    }
}
?>