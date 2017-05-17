<?php

include_once 'classes/class_host.php';
include_once 'classes/common.php';
include_once 'session/session.php';

$Objnew = new class_host();


if ($_POST) {
    $Objnew->subscribeemail = common::StrToDB($_REQUEST['subscribeemail']);
    
    
    
    $res = $Objnew->addsubscribeemail();
    
    if ($res == 'succuess') {
        echo "succuess";
    }else if ($res == 'exist') {
         echo "exist";
    }
}
?>

