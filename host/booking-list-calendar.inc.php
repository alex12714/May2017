<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();
$Objnew->property_id = $_REQUEST['property_id'];
//$Objnew->property_id = 30;


$result_checkincheckoutdate = $Objnew->getcheckincheckoutdate();
$row_res = mysqli_fetch_assoc($result_checkincheckoutdate);
$property_checkin=$row_res['check_in'];
$property_check_out=$row_res['check_out'];
 $startTime = date('Y/m/d', strtotime($property_checkin));
  $endTime = date('Y/m/d', strtotime($property_check_out));

 $day = 86400;
    $format = 'Y/m/d';
    $startTime = strtotime($startTime);
    $endTime = strtotime($endTime);
    $numDays = round(($endTime - $startTime) / $day) + 1;
    $propertydate = array();
        
    for ($i = 0; $i < $numDays; $i++) {
        $propertydate[] = date($format, ($startTime + ($i * $day)));
    }
 
 
 
 
$result_bookingdate = $Objnew->getbookingdate();
while ($row = mysqli_fetch_assoc($result_bookingdate)) {
    $booking_deatils[]=$row;
}

// foreach($booking_deatils as $booking_det){
//     $booking_check_in=date('Y/m/d', strtotime($booking_det['check_in']));
//     $booking_ch_out=date('Y/m/d', strtotime($booking_det['check_out']));
//
//     $day1 = 86400;
//    $format = 'Y/m/d';
//     $booking_check = strtotime($booking_check_in);
//     $booking_out = strtotime($booking_ch_out);
//    $numDays1 = round(($booking_out - $booking_check) / $day1) + 1;
//    $bookingdate = array();
//        
//    for ($i = 0; $i < $numDays1; $i++) {
//        $bookingdate[] = date($format, ($booking_check + ($i * $day1)));
//    }
//    
////     print_r($bookingdate);
//     foreach($bookingdate as $RR){
//         echo $RR;
//     }
// }
// print_r($bookingdate);
  

?>

