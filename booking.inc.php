<?php

include_once 'classes/class_host.php';

include_once 'classes/common.php';
include_once "session/session.php";

$Objnew = new class_host();

$log = new common();


$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
//********arib_property_tbl********
$title = common::StrFromDb($row['title']);

$property_price = $row['property_price'];


$error_flag = 0;
if ($_POST) {

    $Objnew->guest_id = $_SESSION['guest_id'];
    if (!empty($_REQUEST['check_in_date'])) {
        $check_in_date = $Objnew->check_in = $_REQUEST['check_in_date'];
    }
    if (!empty($_REQUEST['check_out_date'])) {
        $check_out_date = $Objnew->check_out = $_REQUEST['check_out_date'];
    }

    $title = $_REQUEST['title'];
    $property_val_id = $Objnew->property_id = $_REQUEST['property_val_id'];

    $Objnew->property_id = $_REQUEST['property_val_id'];
    $res_res = $Objnew->viewpropertydet();
    $row_price = mysqli_fetch_assoc($res_res);
    $price_per_night = $row_price['property_price'];
    $weekly_discount = $row_price['weekly_discount'];
    $monthly_discount = $row_price['monthly_discount'];

    if ($check_in_date != "" && $check_out_date != "") {

        if ($check_in_date <= $check_out_date) {
            $check_in = $check_in_date;
            $check_out = $check_out_date;
            $no_of_night = (strtotime($check_out) - strtotime($check_in)) / 24 / 3600;
        }
    }


//*******************per nigiht****************//
    if ($no_of_night <= 5) {

        $total_property_price = ($price_per_night * $no_of_night);
    } else if ($no_of_night >= 5 && $no_of_night <= 29) {
        if ($weekly_discount != "") {
            $date2 = strtotime($check_out_date);
            $date1 = strtotime($check_in_date);
            $seconds = $date1 - $date2;
            $weeks = floor($seconds / 604800);
            $total_weeks = substr($weeks, 1);
            $total_property_price = ($weekly_discount * $total_weeks);
        } else {
            //************************weekly_discount value NULL**********//
            $total_property_price = ($price_per_night * $no_of_night);
        }
    } else if ($no_of_night >= 29) {

        if ($monthly_discount != "") {

            $date1 = ($check_in_date);
            $date2 = ($check_out_date);

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $day1 = date('d', $ts1);
            $day2 = date('d', $ts2);

            $total_months = (($year2 - $year1) * 12) + ($month2 - $month1) + ($day2 - $day1);

            $total_property_price = ($monthly_discount * $total_months);
        } else {
            //************************weekly_discount value NULL**********//
            $total_property_price = ($price_per_night * $no_of_night);
        }
    }
    $Objnew->property_price = $total_property_price;

    if ($check_in_date == "" && $check_out_date != "") {
        $error_flag = 1;
        echo "checkinblank";
    }
    if ($check_out_date == "" && $check_in_date != "") {
        $error_flag = 1;
        echo "checkout";
    }
    if ($check_in_date == "" && $check_out_date == "") {
        $error_flag = 1;
        echo "checkincekoutblank";
    }


    if ($check_out_date != "") {
        if ($check_in_date > $check_out_date) {
            $error_flag = 1;
            echo "checkoutgrater";
//            $error_msg['check_out_date']='Check out date must be grater  in check in date';
        } else {
            
        }
    }
    $strtitle = substr($title, 0, 2);
    $newtitle = strtoupper($strtitle);
    $bookingidtitle = str_replace(' ', 'B', $newtitle);
    if ($error_flag == 0) {
        $new_booking_id = $log->GetID($bookingidtitle, 'booking');
        $Objnew->new_booking_id = $new_booking_id;
        $result = $Objnew->addbooking();
    }
    if ($result == 'succuess') {
        echo "booked";
    }
}
?>