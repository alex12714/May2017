<?php

include_once '../classes/class_host.php';
include_once '../classes/common.php';

$Objnew = new class_host();
$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
//********arib_property_tbl for price********
$price_per_night = $row['property_price'];
$weekly_discount = $row['weekly_discount'];
 $monthly_discount = $row['monthly_discount'];

$check_in_date = $_REQUEST['check_in_date'];
$check_out_date = $_REQUEST['check_out_date'];


$check_in_date = date('Y-m-d', strtotime($check_in_date));
$check_out_date = date('Y-m-d', strtotime($check_out_date));

if ($check_in_date != "" && $check_out_date != "") {

    if ($check_in_date <= $check_out_date) {
        $check_in = $check_in_date;
        $check_out = $check_out_date;
        $no_of_night = (strtotime($check_out) - strtotime($check_in)) / 24 / 3600;
    }
}


//*******************per nigiht****************//
if ($no_of_night <= 5) {

    $total_price = ($price_per_night * $no_of_night);

    echo "night";
    echo "*";
    echo "<span class='fa fa-rupee'></span>&nbsp;" . $total_price;
    echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $price_per_night;
    echo "*";
    echo $no_of_night . "&nbsp;nights";
} else if ($no_of_night >= 5 && $no_of_night <= 29) {
    if ($weekly_discount != "") {
        $date2 = strtotime($check_out_date);
        $date1 = strtotime($check_in_date);
        $seconds = $date1 - $date2;
        $weeks = floor($seconds / 604800);
        $total_weeks = substr($weeks, 1);
        $weekly_total_price = ($weekly_discount * $total_weeks);

        echo "weeks";
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $weekly_total_price;
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $weekly_discount;
        echo "*";
        echo $total_weeks . "&nbsp;Weeks";
    } else {
        //************************weekly_discount value NULL**********//
        $total_price = ($price_per_night * $no_of_night);

        echo "night";
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $total_price;
         echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $price_per_night;
        echo "*";
        echo $no_of_night . "&nbsp;nights";
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
        
        $monthly_total_price = ($monthly_discount * $total_months);

        echo "month";
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $monthly_total_price;
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $monthly_discount;
        echo "*";
        echo $total_months . "&nbsp;Months";
    } else {
        //************************weekly_discount value NULL**********//
        $total_price = ($price_per_night * $no_of_night);

        echo "night";
        echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $total_price;
         echo "*";
        echo "<span class='fa fa-rupee'></span>&nbsp;" . $price_per_night;
        echo "*";
        echo $no_of_night . "&nbsp;nights";
    }
}
?>










