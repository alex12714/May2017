<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();

$res = $Objnew->hostlist();
while ($row = mysqli_fetch_assoc($res)) {
    $host_list_details[] = $row;
}


?>
