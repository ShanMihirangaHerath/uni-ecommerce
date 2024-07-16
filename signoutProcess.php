<?php 
session_start();

if($_SESSION['uid']) {
    $_SESSION['uid'] = null;
    session_destroy();
    echo("Successfully Logged Out!");
}
