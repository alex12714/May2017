<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();
$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
$country = $row['country'];
$state = $row['state'];
$city = common::StrFromDb($row['city']);
$map_location = common::StrFromDb($row['map_location']);
$longitude = $row['longitude'];
$latitude = $row['latitude'];


if ($longitude == "" || $latitude == "") {
    $country_det =$country; // Google HQ
if ($country_det != "") {
    $prepAddr = str_replace(' ', '+', $country_det);
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
    $output = json_decode($geocode);
    $get_latitude = $output->results[0]->geometry->location->lat;
    $get_logitude = $output->results[0]->geometry->location->lng;

   } 
} else {
    $get_latitude = $latitude;
    $get_logitude = $longitude;
}
$Objnew->state_id = $state;
$res2 = $Objnew->getstate();
$row = mysqli_fetch_assoc($res2);
$state_name = $row['state_name'];



$result_coun = $Objnew->getcountry();
while ($row_res = mysqli_fetch_assoc($result_coun)) {
    $country_det_arr[] = $row_res;
}
$result_coun1 = $Objnew->selstate();
while ($row_res1 = mysqli_fetch_assoc($result_coun1)) {
    $state_det_arr[] = $row_res1;
}
$result_city = $Objnew->city();
while ($row = mysqli_fetch_assoc($result_city)) {
    $city_det_arr[] = $row;
}





if ($_POST) {

    $genrated_id = $Objnew->genrated_id = common::StrToDB($_REQUEST['genrated_id']);


    $Objnew->country = common::StrToDB($_REQUEST['country']);
    $Objnew->city = common::StrToDB($_REQUEST['city']);
    $Objnew->state = common::StrToDB($_REQUEST['state']);
    $Objnew->map_location = $_REQUEST['map_location'];
    $Objnew->latitude = $_REQUEST['latitude'];
    $Objnew->longitude = $_REQUEST['longitude'];










    
        ECHO $result = $Objnew->updateaddress();
    
}
?>

