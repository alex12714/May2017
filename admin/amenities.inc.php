<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

//****************fetch selectpropertylist***********
$Objnew = new class_admin();
$Objnew->edit_id = common::StrToDB($_REQUEST['edit_id']);
if($_REQUEST['edit_id']!=""){
$res = $Objnew->Selectamenitiesforedit();
$row_cat = mysqli_fetch_assoc($res);
$amenti_id= $row_cat['amenti_id'];
 $amenities = $row_cat['amenities'];
}
$error_flag = 0;

$admin=$_SESSION['admin_id'];
if ($_POST) {

    if (!empty($_REQUEST['amenities'])) {
        $amenities = $_REQUEST['amenities'];
        $Objnew->amenities = common::StrToDB($amenities);
    }


    if ($amenities == "") {
        $error_flag = 1;
        $error_msg['amenities'] = "Please enter  amenitie";
    }
    if ($error_flag == 0) {

        if ($_REQUEST['edit_id'] == "") {
          
            $res = $Objnew->Insertamenities();
            if($res=='success'){
                $amenities= "";
                $msg="Added Successfully";
            }
        } elseif ($_REQUEST['edit_id'] != "") {
            $res = $Objnew->Updateamenities();
            if($res=='success'){
                header("location:amenitieslisting.php");
            }
            
        }
    }
}
?>

