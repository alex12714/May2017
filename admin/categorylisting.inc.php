<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();

$res = $Objnew->Selectcategory();
while ($row = mysqli_fetch_assoc($res)) {
    $category_list_details[] = $row;
}


if (($_REQUEST['action'] == 'delete') && ($_REQUEST['category_id'])) {

    $Objnew->category_id = common::StrToDB($_REQUEST['category_id']);
     $res1 = $Objnew->Deletecategory();
    
    if ($res1 == 'succuess') {
        echo "dasd";
        header("Location:categorylisting.php");
    }
}
?>
