<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();

$error_flag==0;

//****************fetch selectpropertylist***********
//$Objnew = new class_host();

$Objnew->host_id = $_SESSION['host_id'];
$RES = $Objnew->selecthostdeatils();
$row = mysqli_fetch_assoc($RES);
$firstname = $row['firstname'];
$email = $row['email'];
$last_name = $row['last_name'];
$gender = $row['gender'];
$dob1 = $row['dob'];
$phone_number = $row['phone_number'];
$alternate_number = $row['alternate_number'];
$whereyoulive = common::StrFromDb($row['whereyoulive']);
$description = common::StrFromDb($row['description']);
$image = common::StrFromDb($row['logo_img']);
if ($dob1 != '0000-00-00 00:00:00' && $dob1!= '1970-01-01' &&  $dob1 != '') {
        $dob = date('d-m-Y', strtotime($dob1));
    }


if ($_POST) {

    $Objnew->host_id = $_SESSION['host_id'];
    $Objnew->first_name = common::StrToDB($_REQUEST['firstname']);
    $Objnew->email = $_REQUEST['email'];
    $Objnew->last_name = $_REQUEST['last_name'];
    $Objnew->gender = $_REQUEST['gender'];
    $Objnew->dob = $_REQUEST['dob'];
    $Objnew->phone_number = $_REQUEST['phone_number'];
    $Objnew->alternate_number = $_REQUEST['alternate_number'];
    $Objnew->whereyoulive = common::StrToDB($_REQUEST['whereyoulive']);
    $Objnew->description = common::StrToDB($_REQUEST['description']);

 if (!empty($_REQUEST['dob'])) {
        $dob = date('Y-m-d', strtotime($_REQUEST['dob']));
        $Objnew->dob = common::StrToDB($dob);
    }

    $R = $Objnew->emailcheck();
    $count=  mysqli_num_rows($R);
    if($count > 0){
       $error_flag = 1;
            $error_msg['email'] = "Email id is alredy exist.";
    }
    
    if ($_FILES['logo_image']['name'] != "") {
        $doc_modefied_name1 = mt_rand(1111, 9999);
        $file_true_name = $_FILES['logo_image']['name'];
        $logo_img = "item_" . $doc_modefied_name1 . $_FILES['logo_image']['name'];
        $file_img_temp1 = $_FILES['logo_image']['tmp_name'];
        $file_img_type1 = $_FILES['logo_image']['type'];

        $logo_image = new SimpleImage();
        $logo_image->load($file_img_temp1);
        $logo_image->resize(70, 80);
//        $logo_image->resizeToWidth(150);        

        $logo_image->save("../uploads/$logo_img");
    }
    
        if (empty($_FILES['logo_image']['name'])) {
            $logo_img = $image;
        }
//    
    
     $Objnew->logo_img = common::StrToDB($logo_img);
    
    if($error_flag==0){
    $result = $Objnew->updatehostprofile();
    }
     if ($result == 'succuess') {
         header("location:profile.php");
                               
                             } 
}
?>

