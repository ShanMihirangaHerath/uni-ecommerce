<?php 
include "connection.php";

$province = $_GET['province_id'];

$district_resultset = Database::search("SELECT * FROM `district` 
WHERE `province_province_id` = '" . $province . "'");

$district_num = $district_resultset->num_rows;

for($x = 0; $x < $district_num; $x++){
    $district_data = $district_resultset->fetch_assoc();
?>
    <option value="<?php echo $district_data['district_id']; ?>">
        <?php echo $district_data['district_name']; ?>
    </option>
<?php
}