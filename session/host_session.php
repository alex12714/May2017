<?php

if (session_id() == "") {
    session_start();
}
if ($_SESSION['host_id'] == "") {
    header("location:../index.php");
}
?>