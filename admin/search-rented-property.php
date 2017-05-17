<?php
include_once '../classes/class_admin.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";






//****************fetch selectpropertylist***********


$Objnew = new class_admin();


if ($_POST) {



    if ($_REQUEST['check_in'] != "" && $_REQUEST['check_out'] != "") {

        $Objnew->check_in = date('Y-m-d', strtotime($_REQUEST['check_in']));
        $Objnew->check_out = date('Y-m-d', strtotime($_REQUEST['check_out']));
    } 

$res = $Objnew->RentedPropertyList();
while ($row = mysqli_fetch_assoc($res)) {
    $property_details_array[] = $row;
}
}
//print_r($booking_list_details);
?>

<div class="clearfix"></div><br/>
<?php if (!empty($property_details_array)) { ?>
    <div class="col-md-12">
        <?php
        $i = 1;
        foreach ((array) $property_details_array as $detials) {

            $Objnew->property_id = $detials['property_id'];
            $res = $Objnew->getpropertyimage();
            $row_t = mysqli_fetch_assoc($res);
            $image = $row_t['image_name'];

            $Objnew->country_id = $detials['country'];
            $res1 = $Objnew->selectcountry();
            $row = mysqli_fetch_assoc($res1);
            $country_name = $row['printable_name'];

            $Objnew->state_id = $detials['state'];
            $res2 = $Objnew->getstate();
            $row = mysqli_fetch_assoc($res2);
            $state_name = $row['state_name'];
            $amenities = explode(",", $detials['amenities']);
            $room_type = explode(",", $detials['room_type']);
            ?>
<?php if($detials['property_id']!="") { ?>
            <div class="well well-sm" id='removepoperty<?php echo $detials['property_id']; ?>'>
                <div class="media btm-zero">
                    <div class="media-left pull-left">
                        <a href="#">
                            <?php if ($image != "") { ?>
                                <img class="media-object thumbnail" src="../uploads/<?php echo $image; ?>" alt="..." width="160" style="margin-bottom: 0px;"/>
                            <?php } else { ?>
                                <img class="media-object thumbnail" src="../images/no-image.jpg" alt="..." width="160" style="margin-bottom: 0px;"/>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="col-md-5" style="border-right: 1px #ddd solid;">
                            <h4 class="media-heading" style="color: #d5a10e;"><?php echo $detials['title']; ?></h4>
                            <div>
                                <!--<h6><strong><u>Kind Of Place</u></strong> :</h6>--> 
                                <?php if (in_array('1', $room_type)) { ?>
                                    <img src="../images/entire.png"> Entire home/apt<br/>
                                <?PHP } ?>
                                <?php if (in_array('2', $room_type)) { ?>
                                    <img src="../images/private.png"> Private room<br/>
                                <?PHP } ?>
                                <?php if (in_array('3', $room_type)) { ?>
                                    <img src="../images/shared.png"> Shared room<br/>
                                <?PHP } ?>

                                <h6><strong>Property Price</strong> : <?php if ($detials['property_price'] != "") { ?>
                                        <?php echo "$" . $detials['property_price']; ?>
                                    <?php } else { ?>
                                        <?php echo "N/A" ?>
                                    <?php };
                                    ?></h6>
        <!--                                                <a href="propertylist.php?property_id=<?php echo $detials['property_id']; ?>&action=show" > <label for="radio1" name="public" class=" btn btn-info cb-enable <?php if ($detials['property_price'] == '2') { ?> selected <?php } ?>" ><span>Show</span></label></a>
                                <a href="propertylist.php?property_id=<?php echo $detials['property_id']; ?>&action=hide" ><label for="radio2"  name="private" class="btn btn-info cb-disable <?php if ($detials['property_price'] == '3') { ?> selected <?php } ?> "><span>hide</span></label></a>-->

                            </div>
                            <div class="clearfix"></div><br/>
                        </div>



                        <div class="col-md-3 text-center" style="border-right: 1px #ddd solid;">
                            <div class="clearfix"></div><br/>

                            <a href='' data-toggle="modal" data-target="#rentedproperty" onclick="view_rented_propertycheckin('<?php echo $detials['property_id']; ?>')" class="btn btn-primary btn-xs text-uppercase" >View  rented Dates</a>
                            <!--                                            <label class="switch switch-green">-->

        <!--                                                <input type="checkbox" class="switch-input" <?php if ($detials['added_status'] == '1') { ?>checked=""<?php } ?>/>
        <span class="switch-label" onclick="hideshowproperty('<?php echo $detials['property_id']; ?>')" data-on="On" data-off="Off"></span>
        <span class="switch-handle"></span>-->
                            <!--</label>-->
                            <div class="clearfix"></div><br/>
                            <!--<button class="btn btn-danger btn-sm btn-block text-uppercase" onclick="removepropertyDiv('<?php echo $detials['property_id']; ?>');" style="border-radius: 15px;"><span class="fa fa-trash-o"></span> Remove</button>-->
                            <div class="clearfix"></div><br/>
                        </div>
                        <div class="col-md-4" >
                            <div class="clearfix"></div><br/>
                            <div class="col-md-12 padnoneright">
                                <a  href='' data-toggle="modal" data-target="#vendordet" onclick="view_property_details('<?php echo $detials['property_id']; ?>')" class="btn btn-warning btn-sm btn-block text-uppercase" style="margin-bottom: 5px;"><strong>View Details</strong></a>
                                <div class="clearfix"></div>
                                <a href='' data-toggle="modal" data-target="#propertyphotos" onclick="view_property_photos('<?php echo $detials['property_id']; ?>')" class="btn btn-info btn-sm btn-block text-uppercase" style="margin-bottom: 5px;"><strong>View Property Photos</strong></a>
                                <div class="clearfix"></div>
                                <a href='' data-toggle="modal" data-target="#login" onclick="view_host_deatils('<?php echo $detials['added_by']; ?>')" class="btn btn-danger btn-sm btn-block text-uppercase">View Host Details</a>
                            </div>
                            <div class="clearfix"></div><br/><br/>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
            <?php
            $i++;
        }
        ?>
    </div>
<?php } else { ?>
    <div class="alert alert-info text-center">
        No Data Found
    </div>
<?php } ?>
<div class="clearfix"></div>