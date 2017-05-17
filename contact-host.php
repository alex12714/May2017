<?php

include_once 'classes/class_host.php';
include_once 'classes/common.php';
include_once 'session/session.php';

$Objnew = new class_host();

$Objnew->guest_id = $_SESSION['guest_id'];
if ($_POST) {

    $Objnew->property_id = common::StrToDB($_REQUEST['property_val_id']);
    $Objnew->checkindate = common::StrToDB($_REQUEST['checkindate']);
    $Objnew->checkoutdate = common::StrToDB($_REQUEST['checkoutdate']);
    $Objnew->guests = common::StrToDB($_REQUEST['guests']);
    $Objnew->message = common::StrToDB($_REQUEST['message']);

   echo $res = $Objnew->contacttohost();

    if ($res == 'succuss') {
        echo "succuess";
    }
}
?>

