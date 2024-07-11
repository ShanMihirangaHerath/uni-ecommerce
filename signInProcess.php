<?php
session_start();
include "connection.php";

$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember'];

if(empty($email)){
    echo ("Enter Email");
}else if(strlen($email)>100){
    echo ("Email must be atleast 100 characters");
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email");
}else if(empty($password)){
    echo ("Enter Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be atleast 5 characters and less than 20 characters");
}else{
    $resultset = Database::search("SELECT * FROM `users` WHERE `email` = '". $email. "' AND `password` = '". $password. "'");
    $num = $resultset->num_rows;

    if($num == 1){
        echo ("Successfully Logged In!");
        $data = $resultset->fetch_assoc();
        $_SESSION["uid"] = $data;
        if($remember == "true"){
            setcookie("email", $email, time()+(60*60*24*365));
            setcookie("password", $password, time()+(60*60*24*365));
        }else{
            setcookie("email", "");
            setcookie("password", "");
        }
    }else{
        echo ("Invalid Email or Password");
    }
}
