<?php

include "connection.php";

$email = $_POST['email'];
$v_code = $_POST['verificationCode'];
$password = $_POST['newPassword'];
$confirmPassword = $_POST['rePassword'];

if(!isset($password)){
    echo ("Enter Password");
}if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be atleast 5 characters and less than 20 characters");
}else if(!isset($confirmPassword)){
    echo ("Confirm Password");
}if(strlen($confirmPassword) < 5 || strlen($confirmPassword) > 20){
    echo ("Confirm Password must be atleast 5 characters and less than 20 characters");
}else if($password != $confirmPassword){
    echo ("Password and Confirm Password must be same");
}else{
    $user_resultset = Database::search("SELECT * FROM `users` WHERE `email` = '".$email. "' AND `v_code` = '".$v_code. "'");
    $user_num = $user_resultset->num_rows;

    if($user_num == 1){
        Database::iud("UPDATE `users` SET `password` = '".$confirmPassword. "' WHERE `v_code` = '".$v_code. "'");
        echo ("Password Updated Successfully");
    }else{
        echo ("Invalid Verification Code");
    }
}