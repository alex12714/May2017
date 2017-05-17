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

    $Objnew->first_name = common::StrToDB($_REQUEST['first_name']);
    $Objnew->last_name = common::StrToDB($_REQUEST['last_name']);
    $Objnew->email = common::StrToDB($_REQUEST['email']);
    $Objnew->password = common::StrToDB($_REQUEST['password']);
    // host can add only number of property
    $Objnew->total_number_of_property = '10';

    $result = $Objnew->hostregister();
    $name = $_REQUEST['first_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

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



        $subject = "New Host Register On:Airbnb";
        $message = "";
        $message = "<html>
            <body>
            <table>
            <tr><td colspan='2'><br/>Dear Admin,<td></tr>
                        <tr><td colspan='2'><strong><br/></td></tr>
                        <tr><td colspan='2'><strong>$name has been successfully register on Airbnb!</td></tr>";


        $message.="</table>
            </body>
            </html>";

        $to = $Obj->siteadmin;
//        $to = "user1@sritechnocrat.com";

        $from_name = "Airbnb";
        $from = "no-reply@gmail.com";

        $email1 = new email($from, $from_name, $to, $subject, $message);


        echo "succuss";
    } else if ($result == 'exist') {

        echo "exist";
    }
}
?>

