<?php

if (session_id() == "") {
    session_start();
}
if ($_SESSION['guest_id'] == "") {
    header("location:../index.php");
}
?>