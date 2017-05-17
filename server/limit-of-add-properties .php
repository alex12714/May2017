<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';






//****************fetch selectpropertylist***********

$Objnew = new class_admin();

$Objnew->total_number_of_property = $_REQUEST['total_number_of_property'];
$Objnew->host_id_for_limit = $_REQUEST['host_id_for_limit'];
$RES = $Objnew->limitofaddproperties ();
if($RES=='succuess'){
    echo "1";
}

?>



