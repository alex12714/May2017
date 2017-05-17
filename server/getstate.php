<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();
//****************fetch categoryroomtype***********
 $Objnew->country_id = $_REQUEST['country_id'];
$res = $Objnew->selectstate();
while ($row = mysqli_fetch_assoc($res)) {
    $state_det_arr[] = $row;
}
?>


<?php if (!empty($state_det_arr)) { ?>
<option value="">Select State</option>
    <?php foreach ($state_det_arr as $state_details) { ?>
        <option value="<?php echo $state_details['state_id']; ?>"><?php echo $state_details['state_name']; ?></option>
    <?php } ?>
<?php } ?>





