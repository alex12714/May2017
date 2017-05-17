<?php

include_once 'session/session.php';
include_once 'classes/class_search.php';
include_once 'classes/common.php';
include_once 'classes/class_host.php';



$obj = new class_search();




if ($_POST) {
    $obj->search_text = $_REQUEST['search_text'];
    $obj->latitude = $_REQUEST['latitude'];
    $obj->longitude = $_REQUEST['longitude'];
    $obj->search_radius = $_REQUEST['search_radius'];
    $obj->check_in = $_REQUEST['check_in'];
    $obj->check_out = $_REQUEST['check_out'];

     $res_pro = $obj->serachproperty();
    while ($row_abc = mysqli_fetch_assoc($res_pro)) {
        $search_property_arr[] = $row_abc;
    }
}

//print_r($search_property_arr);
// earth's radius in km = ~6371
//$radius = 6371;
//// latitude boundaries
//$max_lat = $latitude + rad2deg($search_radius / $radius);
//$min_lat = $latitude - rad2deg($search_radius / $radius);
//// longitude boundaries (longitude gets smaller when latitude increases)
//$max_lon = $longitude + rad2deg($search_radius / $radius / cos(deg2rad($latitude)));
//$min_lon = $longitude - rad2deg($search_radius / $radius / cos(deg2rad($latitude)));














$get_latitude = '0';
$get_logitude = '0';




$Objnew = new class_host();
//****************fetch categoryroomtype***********
$res = $Objnew->categoryroomtype();
while ($row = mysqli_fetch_assoc($res)) {
    $categoryroomtype_arr[] = $row;
}

//print_r($categoryroomtype_arr);
//*********************search code************************//
?>