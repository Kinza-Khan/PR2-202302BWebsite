<?php
include('query.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['sendEmail'])){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kinzaaptech@gmail.com';                     //SMTP username
    $mail->Password   = 'rxabcdxbwiyenden';                               //SMTP password
    $mail->SMTPSecure ="tls";             //Enable implicit TLS encryption
    $mail->Port= 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('kinzaaptech@gmail.com', 'kinza khan');
    $mail->addAddress($_POST['userEmail']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thank You For Shopping Here';
    $mail->Body    = 'We are really thanks to you ';


    $mail->send();
    // update status in invoice table
    $email = $_POST['userEmail'];
    $query = $pdo->prepare("update invoice set status = 'approve' where  u_email = :email");
    $query->bindParam('email',$email);
    $query->execute();
    echo '<script>alert("Message has been sent");location.assign("invoice.php")</script>';



} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



}