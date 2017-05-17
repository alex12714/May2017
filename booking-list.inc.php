<?php

include_once 'classes/class_guest.php';
include_once 'classes/image.php';
include_once 'classes/common.php';
include_once "session/guest_session.php";


if($_SESSION['guest_id']==""){
    header("Location:index.php");
}


//****************fetch selectpropertylist***********

$Objnew = new class_guest();

$Objnew->guest_id = $_SESSION['guest_id'];
//$res_property = $Objnew->selectpropertylist();
// $Objnew->property_id = $_REQUEST['property_id'];

$today_date = date("Y-m-d");

$date = strtotime($today_date);
$date = strtotime("+7 day", $date);
$endofweekdate = date("Y-m-d", $date);

$Objnew->today_date = $today_date;
$Objnew->endofweekdate = $endofweekdate;

$result = $Objnew->BookingsRequestList();
while($row= mysqli_fetch_assoc($result)){
    $booking_list_details[]=$row;
}





?>

