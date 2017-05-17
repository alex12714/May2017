<?php

include_once 'session/session.php';
include_once 'classes/class_guest.php';
include_once 'classes/common.php';





$Objnew = new class_guest();

 $res = $Objnew->SelectTestimonials();
while ($row = mysqli_fetch_assoc($res)) {
    $testimonials_list_details[] = $row;
}

//
//
if ($_REQUEST['latitude'] != "" && $_REQUEST['longitude'] != "") {
    $_REQUEST['latitude'];
    $_REQUEST['longitude'];
} else {
    $_REQUEST['latitude'] = '0';
    $_REQUEST['longitude'] = '0';
}
?>