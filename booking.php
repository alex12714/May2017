<?php
ob_start();
include 'booking.inc.php';
?>


</div>
<div class="clearfix"></div><br/><br/>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>