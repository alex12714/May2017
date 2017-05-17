<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();

 $res = $Objnew->Selectpropertytype();
while ($row = mysqli_fetch_assoc($res)) {
    $propertytype_list_details[] = $row;
}


if (($_REQUEST['action'] == 'delete') && ($_REQUEST['property_type_id'])) {

    $Objnew->property_type_id = common::StrToDB($_REQUEST['property_type_id']);
     $res1 = $Objnew->Deletepropertytype();
    
    if ($res1 == 'succuess') {
       
        header("Location:propertytypelisting.php");
    }
}
?>
