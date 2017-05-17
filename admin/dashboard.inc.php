<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();
$res = $Objnew->fetchnumberofproperty();
 $count_no_of_property= mysqli_num_rows($res);


$res_host = $Objnew->fetchnumberofhost();
 $count_no_of_host=  mysqli_num_rows($res_host);
 
 
$res_guest = $Objnew->fetchnumberofguest();
 $count_no_of_guest=  mysqli_num_rows($res_guest);
?>

