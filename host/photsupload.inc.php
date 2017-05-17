<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";

//$host_id = $_SESSION['host_id'];
$Objnew = new class_host();
//$Objnew->host_id=$host_id;
//$Objnew->user_type="HO";
//$res = $Objnew->selectlast_id();
//list($property_id)= mysqli_fetch_row($res);
//
$gen_id = $_REQUEST['id'];






if ($_POST['tab1_btn']) {

    $genrated_id = $_REQUEST['gen_id'];

    $imgnamearr = array();
    $i = 0;




    foreach ($_FILES['uploadimg']['name'] as $uplimg) {
        $file['name'][] = $_FILES['uploadimg']['name'][$i];
        $file['tmp_name'][] = $_FILES['uploadimg']['tmp_name'][$i];
        $i++;
    }

    $j = 0;
    foreach ($file['name'] as $imgname) {
        if (!empty($file['tmp_name'][$j])) {
            $tmpname[] = $file['tmp_name'][$j];
            $imgnamearr[] = $imgname;
            $value = explode(".", $imgname);
            $name_img[] = $value[0];
            $ext[] = $value[1];
            $allowext = array("jpeg", "jpg", "JPG", "JPEG", 'png', 'PNG', 'tiff', 'TIFF');
            if (!in_array($value[1], $allowext)) {
                $error_flag = 1;
                $err_msg['uploadimg'] = $ext[$j] . $ad_addprostep2_typenotallowed_err_msg_lang;
            }
        }
        $j++;
    }


    $imgval = new simpleImage();
    $i = 0;
    if (!empty($imgnamearr)) {
        foreach ($imgnamearr as $filenameval) {
            if ($filenameval != "") {

                $imgval->load($tmpname[$i]);

                $imgval->resize(450, 300);
//                $height = $imgval->getHeight();
//                $width = $imgval->getWidth();
//
//                $w = $width;
//                $h = $height;
//                $new_w = 450;
//                $new_h = 300;
//                if ($w > $h) {
//                    if ($w > 450) {
//                        $new_w = 450;
//                        $new_h = $new_w * ($h / $w);
//                    }
//                } else {
//                    if ($h > 300) {
//                        $new_h = 300;
//                        $new_w = $new_h * ($w / $h);
//                    }
//                }

                $randnumber = mt_rand(1111, 9999);
                $realimagename[] = $name_img[$i] . '.' . $ext[$i];
                $imgval->save("../uploads/" . $randnumber . '_' . $realimagename[$i]);
 $imgval->resize(1260, 400);
 $imgval->save("../uploads/".'L' . $randnumber . '_' . $realimagename[$i]);
                $imagename[] = $randnumber . '_' . $name_img[$i] . '.' . $ext[$i];
            }
            $i++;
        }
    }

    $Objnew->genrated_id = $genrated_id;
    $Objnew->imagename = $imagename;

    if (!empty($imagename)) {
        $Objnew->genrated_id = $genrated_id;
        $res = $Objnew->deleteimg();
    }



    if (!empty($imagename)) {
        $res = $Objnew->uploadimg();
    }
//    $last_id=  mysql_insert_id($res);
    if ($res == 1) {
        $msg = "Image Successfully Uploaded";

//        $Objnew->property_id = $genrated_id;
//        $res = $Objnew->getpropertyimage();
//        while ($row = mysqli_fetch_assoc($res)) {
//            $show_property[] = $row;
//        }
//        print_r($show_property);
    }
}
$Objnew->property_id = $gen_id;
$res = $Objnew->getpropertyimage();
while ($row = mysqli_fetch_assoc($res)) {
    $show_property[] = $row;
}
?>

