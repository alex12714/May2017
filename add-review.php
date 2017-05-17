<?php

include_once 'classes/class_host.php';
include_once 'classes/common.php';
include_once 'session/session.php';

$Objnew = new class_host();

$Objnew->guest_id = $_SESSION['guest_id'];
if ($_POST) {
    $Objnew->property_id = common::StrToDB($_REQUEST['property_val_id']);
    
    $Objnew->description = common::StrToDB($_REQUEST['addreview']);
    
   echo $res = $Objnew->addreviewdeatils();
    
    if ($res == 'succuss') {
        echo "succuess";
    }
}
?>

