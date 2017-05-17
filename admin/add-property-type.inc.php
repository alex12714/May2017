<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

//****************fetch selectpropertylist***********
$Objnew = new class_admin();
$Objnew->edit_id = common::StrToDB($_REQUEST['edit_id']);
if($_REQUEST['edit_id']!=""){
$res = $Objnew->Selectpropertytypeforedit();
$row_cat = mysqli_fetch_assoc($res);

 $property_type = $row_cat['property_type'];
}
$error_flag = 0;

$admin=$_SESSION['admin_id'];
if ($_POST) {

    if (!empty($_REQUEST['property_type'])) {
        $property_type = $_REQUEST['property_type'];
        $Objnew->property_type = common::StrToDB($property_type);
    }


    if ($property_type == "") {
        $error_flag = 1;
        $error_msg['property_type'] = "Please enter  property type";
    }
    if ($error_flag == 0) {

        if ($_REQUEST['edit_id'] == "") {
          
            $res = $Objnew->Insertpropertytype();
            if($res=='success'){
                $property_type= "";
                $msg="Added Successfully";
            }
        } elseif ($_REQUEST['edit_id'] != "") {
            $res = $Objnew->Updatepropertytype();
            if($res=='success'){
                header("location:propertytypelisting.php");
            }
            
        }
    }
}
?>

