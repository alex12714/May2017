<?php

include_once '../classes/class_admin.php';
include_once '../classes/common.php';
include_once '../session/session.php';


$Objnew = new class_admin();
$Object_common = new common();


if ($_POST) {

    $Objnew->email = $_REQUEST['email'];
    $Objnew->password = $_REQUEST['logpassword'];
    $response = $Objnew->Login();

    $count = mysqli_num_rows($response);
    if ($count > 0) {
        $row = mysqli_fetch_array($response);
         $usre_id = $row['user_id'];
        $user_type = $row['user_type'];

        if ($user_type == "AD") {
            $_SESSION['admin_id'] = $usre_id;
            echo "admin";
        }
    } else {
        echo "error";
    }
}
?>