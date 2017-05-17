<?php

include_once '../classes/class_host.php';
include_once '../classes/mail_class.php';
include_once '../classes/common.php';

$Objnew = new class_host();
$Obj = new class_settings();
$user_email_id = "";

$error_flag = 0;
$user_email_id = $_REQUEST['email'];


$Objnew->email = $_REQUEST['email'];
 $RES = $Objnew->forgetpassword();
 $row = mysqli_fetch_assoc($RES);
 $email=$row['email'];
$password=$row['password'];
$firstname=$row['firstname'];
//if($RES=="succuess"){
//$row = mysqli_fetch_assoc($RES);
//$email=$row['email'];
//$password=$row['password'];
//$firstname=$row['firstname'];
//}
//
//
if ($user_email_id != "") {
    

    if ($email == $user_email_id) {
  
        $url =$Obj->siteurl . "index.php";
        $subject = "Forgot Password";
        $message = "";
        $message = "<html>
            <body>
            <table>
             <tr><td colspan='2'>Dear $firstname,  <br/><td></tr>
            <tr><td colspan='2'><br/>Your login credentials are as below:<td></tr>
                        <tr><td colspan='2'><br/>Email: </a> <b>$email </b></td></tr>
            <tr><td colspan='2'>Password:</a> <b>$password</b> </td></tr>";
           
        $message.="</table>
            </body>
            </html>";

        $to = $email;
        $from_name = 'Airbnb';
       $from = $Obj->siteadmin;

        $email1 = new email($from, $from_name, $to, $subject, $message);
        ECHO "1";
    } elseif ($email != $user_email_id || $email == "") {
        ECHO "2";
    }
}





?>