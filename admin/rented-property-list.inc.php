<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_admin();

  
$res = $Objnew->RentedPropertyList();
while ($row = mysqli_fetch_assoc($res)) {
    $property_details_array[] = $row;
}  

//print_r($property_details_array);



?>

