<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";

$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
//********arib_property_tbl********
$title = common::StrFromDb($row['title']);

$amenities = explode(",", $row['amenities']);
$description = common::StrFromDb($row['description']);
$house_rules = common::StrFromDb($row['house_rules']);
$about_this_list = common::StrFromDb($row['about_this_list']);
$availability = common::StrFromDb($row['availability']);

//******** arib_space_tbl********

$accommodation = $row['accommodation'];
$bathrooms = $row['bathrooms'];
$guests = $row['guests'];
$beds = $row['beds'];
$property_type = $row['property_type'];
$room_type = explode(",", $row['room_type']);
$check_in_date = $row['check_in'];
$check_out_date = $row['check_out'];


if ($check_in_date != '0000-00-00 00:00:00' && $check_in_date!= '1970-01-01' &&  $check_in_date != '') {
        $check_in = date('d-m-Y', strtotime($check_in_date));
    }
if ($check_out_date != '0000-00-00 00:00:00' && $check_out_date!= '1970-01-01' &&  $check_out_date != '') {
        $check_out = date('d-m-Y', strtotime($check_out_date));
    }

//******** arib_property_price_tbl********
$property_price = $row['property_price'];
$extra_people = $row['extra_people'];
$monthly_discount = $row['monthly_discount'];
$weekly_discount = $row['weekly_discount'];
$cancellation = $row['cancellation'];
$cleaning_fee = $row['cleaning_fee'];
$security_deposit = $row['security_deposit'];

//******** arib_property_address_tbl********
$country = $row['country'];
$state = $row['state'];
$city = common::StrFromDb($row['city']);
$address = common::StrFromDb($row['address']);
$zip_code = $row['zip_code'];

$Objnew->country_id = $country;
$res1 = $Objnew->selectcountry();
$row = mysqli_fetch_assoc($res1);
$country_name = $row['printable_name'];

$Objnew->state_id = $state;
$res2 = $Objnew->getstate();
$row = mysqli_fetch_assoc($res2);
$state_name = $row['state_name'];
//****************fetch categoryroomtype***********
$res = $Objnew->categoryroomtype();
while ($row = mysqli_fetch_assoc($res)) {
    $categoryroomtype_arr[] = $row;
}
//****************fetch aminites***********
$result = $Objnew->amenitiesdet();
while ($row_det = mysqli_fetch_assoc($result)) {
    $amenitiesdet_arr[] = $row_det;
}

$host_id = $_SESSION['host_id'];
$property_id = $_REQUEST['property_id'];

if ($_REQUEST['property_id'] != "") {
    $Objnew->property_id = $_REQUEST['property_id'];
    $R = $Objnew->selectpricingdet();
    $row_res = mysqli_fetch_assoc($R);

    $extra_people = $row_res['extra_people'];
    $property_price = $row_res['property_price'];
    $monthly_discount = $row_res['monthly_discount'];
    $weekly_discount = $row_res['weekly_discount'];
    $cancellation = $row_res['cancellation'];
    $cleaning_fee = $row_res['cleaning_fee'];
    $security_deposit = $row_res['security_deposit'];
}

//*************select ptoperty type********

 $res = $Objnew->Selectpropertytype();
while ($row = mysqli_fetch_assoc($res)) {
    $propertytype_list_details[] = $row;
}



// echo $genrated_id = $Objnew->genrated_id = common::StrToDB($_REQUEST['genrated_id'])."sdas";
?>
<!------------first step------------------------>





<script type="text/javascript" src="../jquerycalender/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycalender/jquery-ui.css"/>

<script type="text/javascript">
                                            $(function() {

                                                $(".checkindatepicker").datepicker({
                                                    minDate: 0, maxDate: "+12M",
                                                    dateFormat: 'yy-mm-dd',
                                                    changeMonth: true,
                                                    changeYear: true,
                                                   

                                                });
                                            });
                                            $(function() {

                                                $(".checkoutdatepicker").datepicker({
                                                    minDate: "1D", maxDate: "+12M",
                                                    dateFormat: 'yy-mm-dd',
                                                    changeMonth: true,
                                                    changeYear: true,
                                                   

                                                });
                                            });
                                            
                                            var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

                                    $.fn.modal.Constructor.prototype.enforceFocus = function() {
                                    };

                                    $confModal.on('hidden', function() {
                                        $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
                                    });

                                    $confModal.modal({backdrop: false});
</script>



<div class="">
    <div class="col-md-4">
        <div class="form-group">
            <h2 class="top-zero">What kind of place are you listing?</h2>
        </div>
        <input type="hidden" name="genrated_id"  class="form-control genrated_id" value="<?php
        echo $_REQUEST['property_id'];
        ;
        ?>" />
               <?php
               $i = 0;
               foreach ((array) $categoryroomtype_arr as $det) {
                   ?>
                   <?php if ($i === 0) { ?>
                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type"  value="<?php echo $det['category_id']; ?>"<?php
                        if (in_array($det['category_id'], $room_type)) {
                            echo "checked";
                            ?><?php } ?>/><span class="fa fa-check"></span>&nbsp;<img src="../images/entire.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>
                                                               
                                                                <?php } else if ($i === 1) { ?>
                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"<?php
                        if (in_array($det['category_id'], $room_type)) {
                            echo "checked";
                            ?><?php } ?>/><span class="fa fa-check"></span>&nbsp;<img src="../images/private.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>
                                                               
                                                                <?php } else if ($i === 2) { ?>
                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"<?php
                        if (in_array($det['category_id'], $room_type)) {
                            echo "checked";
                            ?><?php } ?>/><span class="fa fa-check"></span>&nbsp;<img src="../images/shared.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>
                                                                <?php }else{ ?>
         <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"<?php if (in_array($det['category_id'], $room_type)) {    echo "checked";  ?><?php } ?>/><span class="fa fa-check"></span>&nbsp;&nbsp; <?php echo $det['category_name']; ?></label></div>
                                                                <?php }?>
                                                                <?php
                                                                $i++;
                                                            }
                                                            ?>
        <div class="clearfix"></div>
        <div>
            <h2>What type of property is this?</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="property_type" id="property_type">
                           <option value="">Select One</option>
                                                                                                <?php foreach ((array) $propertytype_list_details as $det) {?>
                                                <option value="<?php echo $det['property_type'];?>"<?php if ($det['property_type']==$property_type){ echo 'Selected'; } ?>><?php echo $det['property_type'];?></option>
                                                <?php } ?>

                        </select>
                    </div>
                </div>
            </div>
        </div>        
    </div>


    <div class="col-md-4">  
        <div>
            <h2 class="top-zero">Name your place</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" placeholder="Title"/>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="top-zero">Zip Code</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="text" name="zip_code" id="zip_code" value="<?php echo $zip_code; ?>" class="form-control" placeholder="Zip Code"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h2 class="top-zero">Address</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="5" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="clearfix"></div>
<hr/>
<!--------------------second step------------->
<div class="">

    <div class="col-md-6">                            
        <div>
            <h2 class="top-zero">Available To Book</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="accommodate" id="accommodate">
                            <option value="1">Select</option>
                            <option value="Studio"<?php
                            if ($accommodation == 'Studio') {
                                echo 'selected';
                                ?><?php } ?>>Studio</option>
                                    <?php
                                    for ($i = 1; $i <= 15; $i++) {
                                        ?>
                                <option value="<?php echo $i; ?>"<?php
                                if ($accommodation == $i) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $i . '&nbsp;Bedrooms'; ?></option>
                                    <?php } ?>
                            <option value="17">16+ Bedrooms</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="top-zero">Available Beds</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="beds" id="beds">
                            <option value="">Select</option>
                            <?php
                            for ($i = 1; $i <= 15; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"<?php
                                if ($beds == $i) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $i . '&nbsp;beds'; ?></option>
                                    <?php } ?>
                            <option value="17">16+ beds</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="clearfix"></div>
        <div>
            <h2 class="top-zero">Max Guests</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="guests" id="guests" >
                            <option value="">Select</option>
                            <?php
                            for ($i = 1; $i <= 15; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"<?php
                                if ($guests == $i) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $i . '&nbsp;guest'; ?></option>
                                    <?php } ?>
                            <option value="17">16+ guest</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="top-zero">Available Bathrooms</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="bathrooms" id="bathrooms">
                            <option value="">Select</option>
                            <?php
                            for ($i = 0; $i <= 15; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"<?php
                                if ($bathrooms == $i) {
                                    echo "SELECTED";
                                }
                                ?>><?php echo $i; ?></option>
                                    <?php } ?>
                            <option value="17">16+</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="clearfix"></div>
<hr/>
<!------------------step 3-------------------->

<div class="">
    <div class="col-md-12">
        <div>
            <h2 class="top-zero">What amenities do you offer?</h2>
            <div class="form-group">
                <div class="row">
                    <?php foreach ((array) $amenitiesdet_arr as $det) { ?>
                        <div class="col-md-3">
                            <div class="checkbox custom-checkbox"><label><input type="checkbox" name="amenities[]"  value="<?php echo $det['amenities']; ?>"<?php
                                    if (in_array($det['amenities'], $amenities)) {
                                        echo "checked";
                                        ?><?php } ?>/><span class="fa fa-check"></span> &nbsp; <?php echo $det['amenities']; ?></label></div>
                        </div>
                    <?php } ?>                                     
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-4">

        <div>
            <h2>Full Description</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="description" id="description" class="form-control" placeholder="Full Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Available</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="availability" id="availability" placeholder="Available" value="<?php echo $availability; ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h2>Short Description</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="about_this_list" id="about_this_list" class="form-control" placeholder="Short Description" ><?php echo $about_this_list; ?></textarea>
                    </div>
                </div>
            </div>
            <div>
                <h2>Check In</h2>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="check_in" id="check_in"  class="checkindatepicker form-control" placeholder="Check In" value="<?php echo $check_in; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            <h2>House Rules</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="house_rules" id="house_rules" class="form-control" placeholder="House Rules"><?php echo $house_rules; ?></textarea>
                    </div>
                </div>
            </div>
        </div>                           
        <div>
            <h2>Check Out</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="check_out" id="check_out" class="checkoutdatepicker form-control" placeholder="Check Out" value="<?php echo $check_out; ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<hr/>

<div class="">

    <iframe src="../host/photoupload.php?id=<?php echo $_REQUEST['property_id']; ?>" width="100%" frameBorder="0" scrolling="no" height="330px">

    </iframe> 

    <div class="clearfix"></div><br/>
</div>
<span class="image-info-details"></span>