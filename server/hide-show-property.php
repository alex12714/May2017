<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';






//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$RES = $Objnew->hideshowproperty();
$row = mysqli_fetch_assoc($RES);
 $added_status = $row['added_status'];
if ($added_status == '1') {
    $Objnew->property_id = $_REQUEST['property_id'];
    $Objnew->added_status = "2";
    $R = $Objnew->updatehideshowproperty();
} elseif ($added_status == '2') {
    $Objnew->property_id = $_REQUEST['property_id'];
    $Objnew->added_status = "1";
    $R = $Objnew->updatehideshowproperty();
}

?>



