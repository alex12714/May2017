<?php

include_once 'session/session.php';
include_once 'classes/class_search.php';
include_once 'classes/common.php';
include_once 'classes/class_host.php';

if($_SESSION['guest_id']==""){
    header("Location:index.php");
}

$Objnew = new class_search();

$Objnew->guest_id = $_SESSION['guest_id'];
$Objnew->wishist_category_id= $_REQUEST['wishist_category_id'];

$res_pro = $Objnew->wishlistpropertydeatils();
while ($row_abc = mysqli_fetch_assoc($res_pro)) {
    $search_property_arr[] = $row_abc;
}



if (($_REQUEST['action'] == 'delete') && ($_REQUEST['property_id'])) {
$wishist_category_id=$_REQUEST['wishist_category_id'];
    $Objnew->property_id = common::StrToDB($_REQUEST['property_id']);
    $res = $Objnew->removewishlistproperty();
    if ($res == 'succuess') {
        header("Location:wishlist-list-property-deatils.php?wishist_category_id=$wishist_category_id");
    }
}
?>