<?php

include_once 'classes/class_host.php';
include_once 'classes/common.php';
include_once 'session/session.php';


$Objnew = new class_host();
$Object_common = new common();


if ($_POST) {
$guestbook= $_REQUEST['guestbooking'];
    $Objnew->email = $_REQUEST['email'];
   
    $Objnew->password = $_REQUEST['logpassword'];
    $response = $Objnew->Login();
   
    $count = mysqli_num_rows($response);
    if ($count > 0) {
        $row = mysqli_fetch_array($response);
         $usre_id = $row['user_id'];
        $user_type = $row['user_type'];

        if ($user_type == "HO") {
            $_SESSION['host_id'] = $usre_id;
            echo "host";
        }
         else if($guestbook!=""){
        if ($user_type == "GU") {
            $_SESSION['guest_id'] = $usre_id;
           
            echo "guestbook".'*' . $guestbook;
            }
        }else if($user_type == "GU") {
            $_SESSION['guest_id'] = $usre_id;
           
            echo "guest";
            }
    
    } else {
        echo "error";
    }
}
?>