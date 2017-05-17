<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();

 $res = $Objnew->SelectTestimonials();
while ($row = mysqli_fetch_assoc($res)) {
    $testimonials_list_details[] = $row;
}


if (($_REQUEST['action'] == 'delete') && ($_REQUEST['testimonials_id'])) {

    $Objnew->testimonials_id = common::StrToDB($_REQUEST['testimonials_id']);
     $res1 = $Objnew->DeleteTestimonials();
    
    if ($res1 == 'succuess') {
        echo "dasd";
        header("Location:testimonials-list.php");
    }
}
?>
