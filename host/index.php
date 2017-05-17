<?php
ob_start();
include 'index.inc.php';


?>

 
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/host-master.php';
?>