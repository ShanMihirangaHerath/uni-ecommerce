<?php

session_start();
include "connection.php";

$email = $_SESSION['uid']['email'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mobile = $_POST['mobile'];
$line1 = $_POST['line1'];
$line2 = $_POST['line2'];
$city = $_POST['city'];
$district = $_POST['district'];
$province = $_POST['province'];
$postalCode = $_POST['postal_code'];

$user_resultset = Database::search("SELECT * FROM `users` WHERE `email` = '" . $email . "'");

if ($user_resultset->num_rows == 1) {
    Database::iud("UPDATE `users` 
    SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `mobile` = '" . $mobile . "' 
    WHERE `email` = '" . $email . "'");

    $addresses_resultset = Database::search("SELECT * FROM `user_has_address` WHERE `users_email` = '" . $email . "'");

    if ($addresses_resultset->num_rows == 1) {
        Database::iud("UPDATE `user_has_address` 
        SET `city_city_id` = '" . $city . "', `line1` = '" . $line1 . "', 
        `line2` = '" . $line2 . "', `postal_code` = '" . $postalCode . "' 
        WHERE `users_email` = '" . $email . "'");
    } else {
        Database::iud("INSERT INTO `user_has_address`
        (`users_email`,`city_city_id`,`line1`,`line2`,`postal_code`) VALUES 
        ('" . $email . "', '" . $city . "', '" . $line1 . "', '" . $line2 . "', '" . $postalCode . "')");
    }

    if (sizeof($_FILES) == 1) {
        $image = $_FILES['i'];
        $image_extension =  $image["type"];

        $allowed_image_extension = array("image/jpeg", "image/jpg", "image/png", "image/svg+xml");

        if (in_array($image_extension, $allowed_image_extension)) {
            $new_extension;

            if ($image_extension == "image/jpeg") {
                $new_extension = ".jpeg";
            } else if ($image_extension == "image/jpg") {
                $new_extension = ".jpg";
            } else if ($image_extension == "image/png") {
                $new_extension = ".png";
            } else if ($image_extension == "image/svg+xml") {
                $new_extension = ".svg";
            }

            $file_name = "resources/profile_images//" . $fname . "_" . uniqid() . $new_extension;
            move_uploaded_file($image["tmp_name"], $file_name);

            $image_resultset = Database::search("SELECT * FROM `profile_img` 
            WHERE `users_email` = '" . $email . "'");

            if ($image_resultset->num_rows == 1) {
                Database::iud("UPDATE `profile_img` 
                SET `img_path` = '" . $file_name . "' 
                WHERE `users_email` = '" . $email . "'");
                echo("Successfully Updated!");
            } else {
                Database::iud("INSERT INTO `profile_img`
                (`users_email`,`img_path`) VALUES 
                ('" . $email . "', '" . $file_name . "')");
                echo("Successfully Updated!");
            }
        }
    } else if (sizeof($_FILES) == 0) {
        echo ("You have not uploaded any image");
    } else {
        echo ("You can only upload one image");
    }
} else {
    echo ("Invalid User");
}
