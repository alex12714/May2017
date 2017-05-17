<?php
ob_start();
include 'propertylist.inc.php';

?>


<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">
                Property Listings                
            </h2>
        </div>
        <ul class="breadcrumbs pull-right" style="padding-top: 13px;list-style: none;">
            <li><a href="add-property.php" class="btn btn-warning pull-right"><strong>+ Add Property</strong></a></li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<section id="content">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
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

                            <div class="well well-sm">
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
                                        <div class="col-md-4" style="border-right: 1px #ddd solid;">
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
                                        </div>


                                        <div class="col-md-4">
                                            <div class="clearfix"></div><br/>
                                            <div class="col-md-12 padnoneright">
                                                <a  href='' data-toggle="modal" data-target="#vendordet" onclick="view_property_details('<?php echo $detials['property_id']; ?>')" class="btn btn-warning btn-sm btn-block text-uppercase" style="margin-bottom: 5px;"><strong>View Details</strong></a>
                                                <div class="clearfix"></div>
                                                <a href='' data-toggle="modal" data-target="#login" onclick="view_property_photos('<?php echo $detials['property_id']; ?>')" class="btn btn-danger btn-sm btn-block text-uppercase"><strong>View Property Photos</strong></a>
                                                <a href='booking-list.php?property_id=<?php echo $detials['property_id'] ?>' class="btn btn-info btn-sm btn-block text-uppercase"><strong>View Bookings</strong></a>
                                                <a href='' data-toggle="modal" data-target="#bookingcalendar" onclick="view_calender_booking('<?php echo $detials['property_id']; ?>')" class="btn btn-danger btn-sm btn-block text-uppercase"><strong>Booking on Calendar</strong></a>
                                                
                                                <!--<a href='booking-list-calendar.php?property_id=<?php echo $detials['property_id'] ?>' class="btn btn-info btn-sm btn-block text-uppercase"><strong>View in calendar</strong></a>-->
                                            </div>
                                            <div class="clearfix"></div><br/>
                                        </div>
                                        <div class="col-md-4" style="border-left: 1px #ddd solid;">
                                            <label class="switch switch-green">
                                                <input type="checkbox" class="switch-input" <?php if ($detials['added_status'] == '1') { ?>checked=""<?php } ?>/>
                                                <span class="switch-label" onclick="hideshowproperty('<?php echo $detials['property_id']; ?>')" data-on="On" data-off="Off"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                            <div class="clearfix"></div><br/>
                                            <div class="col-md-12 padnoneright">
                                                <a  href='' data-toggle="modal" data-target="#pricing" onclick="view_price_details('<?php echo $detials['property_id']; ?>')" class="btn btn-info btn-sm btn-block text-uppercase"><strong>update Pricing</strong></a>
                                                <a href='' data-toggle="modal" data-target="#updatelocation" onclick="view_update_location('<?php echo $detials['property_id']; ?>')" class="btn btn-primary btn-sm btn-block text-uppercase"><strong>Update Location</strong></a>
                                                <a href='' data-toggle="modal" data-target="#updatedeatils" onclick="view_update_details('<?php echo $detials['property_id']; ?>')" class="btn btn-success btn-sm btn-block text-uppercase"><strong>Update Details</strong></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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




            </div>
        </div>
    </div>
    <div class="clearfix"></div><br/>
</section>
<div class="clearfix"></div>
<!-- Footer -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Property Photos</strong></div>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body image-info-details" id="">

                </div>
                <div class="clearfix"></div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="pricing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="removemsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Update Pricing</strong></div>
            </div>
            <form role="form" id="updatepricing" action="" method="post">
                <div class="modal-body">
                    <div class="col-sm-12"><br/><span id="pricingmsg"></span></div>
                </div>
                <div class="price-info-details" id="">

                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="updatedeatils" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="removemsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Update Details</strong></div>
            </div>
            <form role="form" id="updateinfo" action="" method="post">
                <div class="modal-body">
                    <div class="col-sm-12"><br/><span id="propertyupdate"></span></div>
                </div>

                <div class="modal-body property-info-details" id="">
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" name=""  id="" class="btn btn-green isThemeBtn clickable pull-right"><span class="glyphicon glyphicon-floppy-save"></span> Update</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="updatelocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Update Location</strong></div>
            </div>
            <iframe id="myupdatelocationFrame" width="100%" frameBorder="0" scrolling="no" height="990px">

            </iframe> 
            <div class="clearfix"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="bookingcalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Booking Calendar</strong></div>
            </div>
                       
            <iframe id="bookinglistcalendar" width="100%" frameBorder="0" scrolling="no" height="300px">

            </iframe> 
            <div class="clearfix"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/host-master.php';
?>