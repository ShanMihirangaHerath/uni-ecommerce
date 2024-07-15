<?php

include "connection.php";
include "Exception.php";
include "PHPMailer.php";
include "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["email"])){
    $email = $_GET["email"];
    

    $user_resultset = Database::search("SELECT * FROM `users` WHERE `email` = '". $email. "'");
    $user_num = $user_resultset->num_rows;

    if($user_num == 1){
        $code = uniqid();
        Database::iud("UPDATE `users` SET `v_code` = '". $code. "' WHERE `email` = '". $email. "'");

        // email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yoshanchalith100@gmail.com'; //sender's email
        $mail->Password = 'pfiz fgck gngv uqoc'; //sender's app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('yoshanchalith100@gmail.com', 'Reset Password'); //sender's email, sender's name
        $mail->addReplyTo('yoshanchalith100@gmail.com', 'Reset Password'); //sender's email, sender's name
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'E-shop Forgot Password Verification Code'; //subject of the email
        $bodyContent = '<h1 style="text-align:center; color: red;">E-shop Forgot Password Verification Code is '. $code.'</h1>'; //content of the email
        $mail->Body    = $bodyContent;

        if(!$mail->send()){
            echo ("Message could not be sent.");
        }else{
            echo ("Message has been sent");
        }

    }else{
        echo ("Invalid Email");
    }
}else{
    echo ("Enter Email");
}
