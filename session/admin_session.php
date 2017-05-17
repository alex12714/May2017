<?php

if (session_id() == "") {
    session_start();
}
if ($_SESSION['admin_id'] == "") {
    header("location:index.php");
}
?>