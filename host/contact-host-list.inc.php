<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->host_id = $_SESSION['host_id'];
$res_property = $Objnew->selectpropertylist();
// $Objnew->property_id = $_REQUEST['property_id'];



$result = $Objnew->contacttohostmsg();
while($row= mysqli_fetch_assoc($result)){
    $contacthost_list_details[]=$row;
}





?>

