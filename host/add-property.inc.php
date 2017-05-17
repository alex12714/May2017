<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();
//****************fetch categoryroomtype***********
$res = $Objnew->categoryroomtype();
while ($row = mysqli_fetch_assoc($res)) {
    $categoryroomtype_arr[] = $row;
}
//****************fetch aminites***********
$result = $Objnew->amenitiesdet();
while ($row_det = mysqli_fetch_assoc($result)) {
    $amenitiesdet_arr[] = $row_det;
}
//****************fetch getcountry***********
$result_coun = $Objnew->getcountry();
while ($row_res = mysqli_fetch_assoc($result_coun)) {
    $country_det_arr[] = $row_res;
}

//*************select ptoperty type********

$res = $Objnew->Selectpropertytype();
while ($row = mysqli_fetch_assoc($res)) {
    $propertytype_list_details[] = $row;
}



$host_id = $_SESSION['host_id'];
// Google HQ
//******************start count total property 28-oct-2016****************//
$Objnew->host_id = $host_id;
$sel_property = $Objnew->SelectPropertyByHost();
 $row_property = mysqli_fetch_assoc($sel_property);
   $count_total_property=  mysqli_num_rows($sel_property);
 //*********allwoed property***********//
  $sel_allowed = $Objnew->AllowedAddPropertyToHost();
  $row_allowed = mysqli_fetch_assoc($sel_allowed);
  $allowed_to_add_property=  $row_allowed['total_number_of_property'];
///******************End count total property 28-oct-2016****************//
  //*********allwoed property***********//
$remaining_add_property=$allowed_to_add_property-$count_total_property;


if ($_POST) {

    $genrated_id = $Objnew->genrated_id = common::StrToDB($_REQUEST['genrated_id']);


    $Objnew->host_id = $host_id;
    $Objnew->user_type = "HO";
    $room_type = implode(',', $_REQUEST['room_type']);
    $Objnew->room_type = $room_type;
    $Objnew->property_type = common::StrToDB($_REQUEST['property_type']);


    $Objnew->accommodate = common::StrToDB($_REQUEST['accommodate']);
    $Objnew->beds = common::StrToDB($_REQUEST['beds']);
    $Objnew->guests = common::StrToDB($_REQUEST['guests']);

    if (!empty($_REQUEST['check_in'])) {
        $check_in = date('Y-m-d', strtotime($_REQUEST['check_in']));
        $Objnew->check_in = $check_in;
    }
    if (!empty($_REQUEST['check_out'])) {
        $check_out = date('Y-m-d', strtotime($_REQUEST['check_out']));
        $Objnew->check_out = $check_out;
    }

    $Objnew->title = common::StrToDB($_REQUEST['title']);
    $Objnew->bathrooms = common::StrToDB($_REQUEST['bathrooms']);
//    $Objnew->phone_number = common::StrToDB($_REQUEST['phone_number']);
//*********************addresss***********//

    $Objnew->country = common::StrToDB($_REQUEST['country']);
    $Objnew->city = common::StrToDB($_REQUEST['city']);
    $Objnew->state = common::StrToDB($_REQUEST['state']);
    $Objnew->zip_code = common::StrToDB($_REQUEST['zip_code']);
    $Objnew->address = common::StrToDB($_REQUEST['address']);

    //*********************ammintees***********//
    $amenities = implode(',', $_REQUEST['amenities']);
    $Objnew->amenities = common::StrToDB($amenities);
    $Objnew->description = common::StrToDB($_REQUEST['description']);
    $Objnew->house_rules = common::StrToDB($_REQUEST['house_rules']);
    $Objnew->about_this_list = common::StrToDB($_REQUEST['about_this_list']);
    $Objnew->availability = common::StrToDB($_REQUEST['availability']);
    //*********************price***********//

    $Objnew->property_price = common::StrToDB($_REQUEST['property_price']);
    $Objnew->extra_people = common::StrToDB($_REQUEST['extra_people']);
    $Objnew->weekly_discount = common::StrToDB($_REQUEST['weekly_discount']);
    $Objnew->cancellation = common::StrToDB($_REQUEST['cancellation']);
    $Objnew->cleaning_fee = common::StrToDB($_REQUEST['cleaning_fee']);
    $Objnew->security_deposit = common::StrToDB($_REQUEST['security_deposit']);
    $Objnew->monthly_discount = common::StrToDB($_REQUEST['monthly_discount']);





//**************************************//

    $Objnew->map_location = $_REQUEST['map_location'];

    $Objnew->latitude = $_REQUEST['latitude'];
    $Objnew->longitude = $_REQUEST['longitude'];



// echo $genrated_id = $Objnew->genrated_id = common::StrToDB($_REQUEST['genrated_id'])."sdas";
//*********************************GET latitude AND longitude BY COUNTRY NAME









    if ($genrated_id == "") {
        ECHO $result = $Objnew->addproperty();
    } else {
        ECHO $result = $Objnew->updateproperty();
       
    }
}




//$latitude='0';
//$longitude='0';

//$g_id = explode("*", $result);
//$Objnew->property_id = $g_id[1];
//$res = $Objnew->viewpropertydet();
//$row = mysqli_fetch_assoc($res);
//echo $country = $row['country'];
?>

