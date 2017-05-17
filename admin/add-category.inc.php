<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

//****************fetch selectpropertylist***********
$Objnew = new class_admin();
$Objnew->edit_id = common::StrToDB($_REQUEST['edit_id']);
if($_REQUEST['edit_id']!=""){
$res = $Objnew->Selectcategoryforedit();
$row_cat = mysqli_fetch_assoc($res);
$category_id = $row_cat['category_id'];
 $category_name = $row_cat['category_name'];
}
$error_flag = 0;

$admin=$_SESSION['admin_id'];
if ($_POST) {

    if (!empty($_REQUEST['category_name'])) {
        $category_name = $_REQUEST['category_name'];
        $Objnew->category_name = common::StrToDB($category_name);
    }


    if ($category_name == "") {
        $error_flag = 1;
        $error_msg['category'] = "Please enter  category name";
    }
    if ($error_flag == 0) {

        if ($_REQUEST['edit_id'] == "") {
            $Objnew->admin = common::StrToDB($admin);
            $res = $Objnew->Insertcategory();
            if($res=='success'){
                $category_name= "";
                $msg="Added Successfully";
            }
        } elseif ($_REQUEST['edit_id'] != "") {
            $res = $Objnew->Updatecategory();
            if($res=='success'){
                header("location:categorylisting.php");
            }
            
        }
    }
}
?>

