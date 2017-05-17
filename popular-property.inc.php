<?php

include_once 'session/session.php';
include_once 'classes/class_search.php';
include_once 'classes/common.php';





$obj = new class_search();

$current_date = date("Y-m-d", strtotime("0 Months"));
$previousthreemonth = date("Y-m-d", strtotime("-3 Months"));
$obj->current_date = $current_date;
$obj->previousthreemonth = $previousthreemonth;
 $res_pro = $obj->popularaddedproperty();
while ($row_res= mysqli_fetch_assoc($res_pro)) {
    $popularadded_property_arr[] = $row_res;
}
?>