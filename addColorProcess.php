<?php 
include "connection.php";

$color = $_GET["color"];

$color_resultset = Database::search("SELECT * FROM color WHERE color_name LIKE '%" . $color . "%'");
;

if($color_resultset->num_rows > 0) {
    echo ("This Color Already Exists");
}else {
    Database::iud("INSERT INTO `color`(`color_name`) VALUES ('". $color ."')");
    echo ("Successfully Added");
}
