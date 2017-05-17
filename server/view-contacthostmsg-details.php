<?php
include_once '../classes/class_host.php';
////include_once '../classes/mail_class.php';
include_once '../classes/common.php';
//
//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->contact_id = $_REQUEST['contact_id'];
$RES_1 = $Objnew->contactmsg();
$row = mysqli_fetch_assoc($RES_1);
$message = $row['message'];
?>

<div class="clearfix"></div><br/>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-info text-justify">
        <p><?php echo $message; ?></p>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

