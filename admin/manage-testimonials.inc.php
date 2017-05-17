<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

//****************fetch selectpropertylist***********
$Objnew = new class_admin();
$Objnew->edit_id = common::StrToDB($_REQUEST['edit_id']);
if($_REQUEST['edit_id']!=""){
$res = $Objnew->Selectatestimonialsforedit();
$row_test = mysqli_fetch_assoc($res);
$testimonials_id= $row_test['testimonials_id'];
$title= $row_test['title'];
$description= $row_test['description'];
 $image = $row_test['logo_image'];
}
$error_flag = 0;

$admin=$_SESSION['admin_id'];
if ($_POST) {

    if (!empty($_REQUEST['title'])) {
        $Objnew->title = common::StrToDB($_REQUEST['title']);
    }
    if (!empty($_REQUEST['description'])) {
       
        $Objnew->description = common::StrToDB($_REQUEST['description']);
    }


    if ($_REQUEST['title'] == "") {
        $error_flag = 1;
        $error_msg['title'] = "Please enter title";
    }
    if ($_REQUEST['description'] == "") {
        $error_flag = 1;
        $error_msg['description'] = "Please enter description";
    }
    if ($error_flag == 0) {
        
        if ($_FILES['logo_image']['name'] != "") {
        $doc_modefied_name1 = mt_rand(1111, 9999);
        $file_true_name = $_FILES['logo_image']['name'];
        $logo_img = "TM_" . $doc_modefied_name1 . $_FILES['logo_image']['name'];
        $file_img_temp1 = $_FILES['logo_image']['tmp_name'];
        $file_img_type1 = $_FILES['logo_image']['type'];

        $logo_image = new SimpleImage();
        $logo_image->load($file_img_temp1);
        $logo_image->resize(200, 200);
//        $logo_image->resizeToWidth(150);        

        $logo_image->save("../uploads/$logo_img");
    }
    
        if (empty($_FILES['logo_image']['name'])) {
            $logo_img = $image;
        }
//    
    
     $Objnew->logo_img = common::StrToDB($logo_img);

        if ($_REQUEST['edit_id'] == "") {
          
            $res = $Objnew->InsertTestimonials();
            if($res=='success'){
                $title= "";
                $description= "";
               
                $msg="Added Successfully";
            }
        } elseif ($_REQUEST['edit_id'] != "") {
            $res = $Objnew->UpdateTestimonials();
            if($res=='success'){
                header("location:testimonials-list.php");
            }
            
        }
    }
}
?>

