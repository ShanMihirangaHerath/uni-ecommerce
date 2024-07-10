<?php
include "connection.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];

if(empty($fname)){
    echo ("Enter First Name");
}else if(strlen($fname) > 45){
    echo ("First Name must be atleast 45 characters");
}else if(empty($lname)){
    echo ("Enter Last Name");
}else if(strlen($lname) > 45){
    echo ("Last Name must be atleast 45 characters");
}else if(empty($email)){
    echo ("Enter Email");
}else if(strlen($email)>100){
    echo ("Email must be atleast 100 characters");
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if(empty($password)){
    echo ("Enter Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be atleast 5 characters and less than 20 characters");
}else if(empty($mobile)){
    echo ("Enter Mobile Number");
}else if(strlen($mobile) > 10){
    echo ("Mobile Number must be atleast 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo ("Invalid Mobile Number");
}else if(empty($gender)){
    echo ("Select Gender");
}else{
    $resultset = Database::search("SELECT * FROM `users` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."'");
    $num = $resultset->num_rows;
    if($num > 0){
        echo ("Email or Mobile Number already exists");
    }else{
        $datetime = new DateTime();
        $timezone = new DateTimeZone("Asia/Colombo");
        $datetime->setTimezone($timezone);
        $date = $datetime->format("Y-m-d H:i:s");
        
        Database::iud("INSERT INTO `users`(`fname`, `lname`, `email`, `password`, `joined_date`, `mobile`, `gender_id_gender`,  `status_id_status`) VALUES 
        ('".$fname."','".$lname."','".$email."','".$password."', '".$date."','".$mobile."','".$gender."','1')");

        echo ("Successfully Registered!");
    }
}