<?php

include_once 'classes/class_host.php';
include_once 'classes/common.php';
include_once 'session/session.php';

$Objnew = new class_host();

$Objnew->guest_id = $_SESSION['guest_id'];
if ($_POST) {
    $Objnew->property_id = common::StrToDB($_REQUEST['property_val_id']);
    $Objnew->onlycreate = common::StrToDB($_REQUEST['onlycreate']);
    $Objnew->wishlist_category_name = common::StrToDB($_REQUEST['wishlist_category_name']);
    $res = $Objnew->addwishlistcategory();
    $result = explode("*", $res);
    if ($_REQUEST['onlycreate'] != "onlycreate") {
        $Objnew->wishist_category_id = common::StrToDB($result[1]);

        $res = $Objnew->addwishlist();
    }
    if ($result[0] == 'succuess') {
        echo "succuess";
    }
}
?>

