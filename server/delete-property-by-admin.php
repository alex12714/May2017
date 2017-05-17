<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';

//****************fetch selectpropertylist***********

$Objnew = new class_admin();

if ($_REQUEST['property_id']) {
    $Objnew->property_id = $_REQUEST['property_id'];
    $res = $Objnew->deleteproperty();
    if($res=='succuess'){
        echo 'succuess';
    }
    
}



?>
