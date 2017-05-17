<?php

include_once 'classes/class_host.php';
include_once 'classes/image.php';
include_once 'classes/common.php';
include_once 'session/session.php';
include_once 'classes/mail_class.php';
//include_once 'classes/settings.php';
$Objnew = new class_host();
$Obj = new class_settings();



$error_flag = 0;

if ($_POST) {

   
    $Objnew->guestfirst_name = common::StrToDB($_REQUEST['guestfirst_name']);
    $Objnew->guestlast_name = common::StrToDB($_REQUEST['guestlast_name']);
    $Objnew->guestemail = common::StrToDB($_REQUEST['guestemail']);
    $Objnew->guestpassword = common::StrToDB($_REQUEST['guestpassword']);

    $result = $Objnew->guestregister();
    $name = $_REQUEST['guestfirst_name'];
    $email = $_REQUEST['guestemail'];
    $password = $_REQUEST['guestpassword'];

    if ($result == 'succuss') {

        $subject = "Successfully Register On:Airbnb";
        $message = "";
        $message = "<html>
            <body>
            <table>
            <tr><td colspan='2'>Dear $name,  <br/><td></tr>
            <tr><td colspan='2'><br/>Congratulation your account has been successfully register on Airbnb!<td></tr>
            <tr><td colspan='2'><br/>Login details as below:<td></tr>
            <tr><td colspan='2'>Email:$email</td></tr>
         <tr><td colspan='2'>Password:$password</td></tr>
         <tr><td colspan='2'><br/>Please login to your account and complete your profile.</td></tr>";


        $message.="</table>
            </body>
            </html>";

        $to = $email;
        $from_name = 'Airbnb';
        $from = $Obj->siteadmin;

        $email1 = new email($from, $from_name, $to, $subject, $message);



        echo "succuss";
    } else if ($result == 'exist') {

        echo "exist";
    }
}

?>

