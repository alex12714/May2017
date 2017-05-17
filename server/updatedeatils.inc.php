<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();
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
        $check_in= date('Y-m-d', strtotime($_REQUEST['check_in']));
        $Objnew->check_in =$check_in;
    }
     if (!empty($_REQUEST['check_out'])) {
        $check_out= date('Y-m-d', strtotime($_REQUEST['check_out']));
         $Objnew->check_out = $check_out;
    }
    
    $Objnew->title = common::StrToDB($_REQUEST['title']);
    $Objnew->bathrooms = common::StrToDB($_REQUEST['bathrooms']);
//    $Objnew->phone_number = common::StrToDB($_REQUEST['phone_number']);
//*********************addresss***********//
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


        ECHO $result = $Objnew->updatepropertydaetils();
    }

?>