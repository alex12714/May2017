<?php

include_once 'session/session.php';
include_once 'classes/class_search.php';
//include_once 'classes/common.php';
//include_once 'classes/class_host.php';



$obj = new class_search();


    $res_pro = $obj->recentaddedproperty();
    while ($row_abc = mysqli_fetch_assoc($res_pro)) {
        $recentadded_property_arr[] = $row_abc;
    }


    

?>