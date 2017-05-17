<?php

//echo "asd";
include_once '../classes/class_host.php';
////include_once '../classes/mail_class.php';
include_once "../session/guest_session.php";
//
//
$Objnew = new class_host();
$Objnew->guest_id = $_SESSION['guest_id'];
$Objnew->wishist_category_id = $_REQUEST['wishlist_category_id'];
$Objnew->property_id = $_REQUEST['property_id'];

$res = $Objnew->addwishlist();




?>









