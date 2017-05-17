<?php
ob_start();
include 'propertylist.inc.php';
?>


<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <div style="background: #1FBBA6;color: #fff;font-weight: bold;padding: 10px;border-radius: 3px;">
                <?php if ($_REQUEST['host_id'] == 'allproperty') {
                    ?>Property List<?php } else { ?>
                    Property of <?php echo $firstname; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php if ($_REQUEST['host_id'] == 'allproperty') { ?>
    <form role="form" id="pppp" action="" method="post" class="form-horizontal">
        <div class="box">
            <div class="box-body">
                <div class="clearfix"></div><br/>
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label"><strong>Host</strong></label>
                        <div  class="col-sm-8">
                            <select class='form-control' name="host_id" id="host_id">
                                <option value="">Select Host</option>
                                <?php
                                $i = 1;
                                foreach ((array) $host_list_details as $det) {
                                    ?>
                                    <option value="<?php echo $det['user_id']; ?>">
                                        <?php echo $det['firstname']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success submit"><span class="fa fa-search"></span> Search</button>
                    </div>
                </div>
                <div class="clearfix"></div><br/>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
<?php } ?>
<div class="clearfix"></div>

<section id="content">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body" id='displayajaxsearchhostpropertydata'>
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
                                        <div class="col-md-6" style="border-right: 1px #ddd solid;">
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


                                        <div class="col-md-4" style="border-right: 1px #ddd solid;">
                                            <div class="clearfix"></div><br/>
                                            <div class="col-md-12 padnoneright">
                                                <a  href='' data-toggle="modal" data-target="#vendordet" onclick="view_property_details('<?php echo $detials['property_id']; ?>')" class="btn btn-warning btn-sm btn-block text-uppercase" style="margin-bottom: 5px;"><strong>View Details</strong></a>
                                                <div class="clearfix"></div>
                                                <a href='' data-toggle="modal" data-target="#propertyphotos" onclick="view_property_photos('<?php echo $detials['property_id']; ?>')" class="btn btn-info btn-sm btn-block text-uppercase"><strong>View Property Photos</strong></a>

                                            </div>
                                            <div class="clearfix"></div><br/><br/>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <div class="clearfix"></div><br/>
                                            <label class="switch switch-green">
                                                <input type="checkbox" class="switch-input" <?php if ($detials['added_status'] == '1') { ?>checked=""<?php } ?>/>
                                                <span class="switch-label" onclick="hideshowproperty('<?php echo $detials['property_id']; ?>')" data-on="On" data-off="Off"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                            <div class="clearfix"></div><br/>
                                            <button class="btn btn-danger btn-sm btn-block text-uppercase" onclick="removepropertyDiv('<?php echo $detials['property_id']; ?>');" style="border-radius: 15px;"><span class="fa fa-trash-o"></span> Remove</button>
                                            <div class="clearfix"></div><br/>
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

<div class="modal fade" id="propertyphotos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="modal-title heading font1"><strong>Property Photos</strong></div>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body propertyimage-info-details" id="">

                </div>
                <div class="clearfix"></div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/admin-master.php';
?>