<?php

include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";

$Objnew = new class_admin();

$res = $Objnew->guestlist();
while ($row = mysqli_fetch_assoc($res)) {
    $guest_list_details[] = $row;
}

//$i = 1;
//foreach ((array) $host_list_details as $det) {
//    $i++;
//}
?>
