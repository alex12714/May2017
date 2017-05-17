<?php

include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";


$Objnew = new class_host();
//****************fetch categoryroomtype***********
 $Objnew->state_id = $_REQUEST['state_id'];
$res = $Objnew->selectcity();
while ($row = mysqli_fetch_assoc($res)) {
    $city_det_arr[] = $row;
}
?>


<?php if (!empty($city_det_arr)) { ?>
<option value="">Select City</option>
    <?php foreach ($city_det_arr as $details) { ?>
        <option value="<?php echo $details['city_name']; ?>"><?php echo $details['city_name']; ?></option>
    <?php } ?>
<?php } ?>





