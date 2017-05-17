<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
//include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->getpropertyimage();
while ($row = mysqli_fetch_assoc($res)) {
    $show_property[] = $row;
}
?>
<?php if (!empty($show_property)) { ?>
    <?php foreach ((array) $show_property as $con) { ?>

        <div class="col-sm-3">
            <?php if ($con['image_name'] != "") { ?>
            <img src="../uploads/<?php echo $con['image_name']; ?>" class="thumbnail" style="width: 120px;height: 120px;"/>
            <?php } else { ?>
                <img src="../images/no-image.png" style="width: 120px;height: 120px;"/>
            <?php } ?>

                                        <!--<input type="checkbox" name="defaultphoto" id="new_arrivals_<?php echo $con['image']; ?>" onclick="setuserprofilepic('<?php echo $con[userid]; ?>', '<?php echo $con['image']; ?>');" value=""<?php if ($con['set_profile_photo'] == 'Y') { ?><?php echo "checked"; ?><?php } ?>/>-->  

            <div class="clearfix"></div>  
        </div>

    <?php } ?>
<?php } else { ?>
    <div class="alert alert-info text-center">
        No Data Found
    </div>
<?php } ?>

