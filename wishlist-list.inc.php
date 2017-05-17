<?php

include_once 'session/session.php';
include_once 'classes/class_search.php';
include_once 'classes/common.php';
include_once 'classes/class_host.php';


if($_SESSION['guest_id']==""){
    header("Location:index.php");
}
$Objnew = new class_search();
$Obj = new class_host();

$Objnew->guest_id = $_SESSION['guest_id'];

$res_pro = $Objnew->wishlistcategory();
while ($row_abc = mysqli_fetch_assoc($res_pro)) {
    $wishlistproperty_arr[] = $row_abc;
}

$Obj->guest_id = $_SESSION['guest_id'];
 $res_wishlist_popup = $Obj->fetchwishlistcategory();
while ($row_wishlist_popup = mysqli_fetch_assoc($res_wishlist_popup)) {
    $wishlist_details_arr[] = $row_wishlist_popup;
}

$Obj->host_id = $_SESSION['guest_id'];
$RES = $Obj->selecthostdeatils();
$row = mysqli_fetch_assoc($RES);
$firstname = $row['firstname'];

?>