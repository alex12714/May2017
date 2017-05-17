<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->host_id = $_SESSION['host_id'];
$res = $Objnew->selectpropertylist();
while ($row = mysqli_fetch_assoc($res)) {
    $property_details_array[] = $row;
}


if ($_POST) {

    $Objnew->host_id = $_SESSION['host_id'];

    $Objnew->property_id = common::StrToDB($_REQUEST['property_id']);
    $Objnew->property_price = common::StrToDB($_REQUEST['property_price']);
    $Objnew->extra_people = common::StrToDB($_REQUEST['extra_people']);
    $Objnew->weekly_discount = common::StrToDB($_REQUEST['weekly_discount']);
    $Objnew->cancellation = common::StrToDB($_REQUEST['cancellation']);
    $Objnew->cleaning_fee = common::StrToDB($_REQUEST['cleaning_fee']);
    $Objnew->security_deposit = common::StrToDB($_REQUEST['security_deposit']);
    $Objnew->monthly_discount = common::StrToDB($_REQUEST['monthly_discount']);
    ECHO $result = $Objnew->updatepricing();
}

if (($_REQUEST['action'] == 'show') && ($_REQUEST['property_id'])) {

    $Objnew->property_id = common::StrToDB($_REQUEST['property_id']);
    $res = $Objnew->showproperty();
    if ($res == 'succuess') {
        header("Location:propertylist.php");
    }
}
if (($_REQUEST['action'] == 'hide') && ($_REQUEST['property_id'])) {

    $Objnew->property_id = common::StrToDB($_REQUEST['property_id']);
    $res = $Objnew->hideproperty();
    if ($res == 'succuess') {
        header("Location:propertylist.php");
    }
}
?>

