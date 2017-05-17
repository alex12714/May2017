<?php

include "session/session.php";
include_once 'classes/class_guest.php';

$Objnew = new class_guest();
$Objnew->guest_id = $_SESSION['guest_id'];
$RES = $Objnew->selecthostdeatils();
$row = mysqli_fetch_assoc($RES);
$firstname = $row['firstname'];
?>