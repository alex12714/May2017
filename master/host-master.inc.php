<?php

include "../session/session.php";
include_once '../classes/class_host.php';

$Objnew = new class_host();
$Objnew->host_id = $_SESSION['host_id'];
$RES = $Objnew->selecthostdeatils();
$row = mysqli_fetch_assoc($RES);
$firstname = $row['firstname'];
?>