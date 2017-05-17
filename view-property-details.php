<?php
ob_start();
include 'view-property-details.inc.php';
?>
<div class="clearfix"></div>
<div id="photos">
    <div id="carousel-example-generic<?php echo $_REQUEST['property_id']; ?>" class="carousel slide" data-ride="carousel">
        <?php if ($count > 0) { ?>
            <div class="carousel-inner" role="listbox">
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($res_img)) {
                    ?>


                    <?php if ($i == 0) { ?>
                        <div class="item active">
                            <div class="image">
                                <img src="uploads/<?php echo 'L' . $row['image_name']; ?>" alt="" class="img-responsive"/>
                                <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $property_price; ?> <span class="fa fa-bolt text-warning"></span></h4>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="item">
                            <div class="image">
                                <img src="uploads/<?php echo 'L' . $row['image_name']; ?>" alt="" class="img-responsive"/>
                                <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $property_price; ?> <span class="fa fa-bolt text-warning"></span></h4>
                            </div>
                        </div>
                    <?php } ?>


                    <?php
                    $i++;
                }
                ?> 
            </div>
        <?php } else { ?>

            <div class="item active">
                <div class="image">
                    <img src="images/no-img-property.jpg" alt="" class="img-responsive"/>
                    <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $property_price; ?> <span class="fa fa-bolt text-warning"></span></h4>
                </div>
            </div>

        <?php } ?>

        <a class="right carousel-control" href="#carousel-example-generic<?php echo $_REQUEST['property_id']; ?>" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <a class="left carousel-control" href="#carousel-example-generic<?php echo $_REQUEST['property_id']; ?>" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
    </div>
    <!--    <div style="background-image: url(images/bg-cover.jpg);background-repeat: no-repeat;background-size: cover;background-position: 50% 50%;height: 100%;">
    
        </div>-->
</div>
<div class="clearfix"></div><br/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2 text-center">
                <?php if ($host_image != "") { ?>

                    <img src="uploads/<?php echo $host_image; ?>" alt="" class="img-circle" width="150"/>
                <?php } else { ?>
                    <img src="images/user_pic.png" alt="" class="img-circle" width="150"/>
                <?php } ?>
                <h4></h4>
            </div>
            <div class="col-md-6">
                <h3><?php echo $title; ?></h3>
                <h5 class="text-muted">
                    <?php echo $map_location; ?>
                </h5>
                <?php if ($already_booking_property_id == $_REQUEST['property_id']) { ?>
                <div class="alert alert-warning text-center" style="font-size: 20px;font-weight: bold;">
                    Already Booked!
                </div>
                <?php } ?>
                <div class="clearfix"></div><br/>
            </div>
            <div class="col-md-4">
                <div class="pull-right">
                    <?php if ($already_booking_property_id == $_REQUEST['property_id']) { ?>
                    <!--<a href="javascript:void(0)" class="btn btn-default btn-lg btn-block text-uppercase"><span class="fa fa-check"></span> Already Booked</a>--> 
                    <?php }else {?>
                    <?php if ($_SESSION['guest_id'] != "") { ?>
                        <a href="javascript:void(0)" onclick="pernigntprice();" class="btn btn-warning btn-block text-uppercase"  data-toggle="modal" data-target="#bookingpropertypopup"><span class="fa fa-calendar"></span> Request to Book</a>

                    <?php } else { ?>
                        <span onclick="insertsigninvaluefield('<?php echo $_REQUEST['property_id']; ?>');"><a href="javascript:void(0)" onclick="regremoveerrormsg();" class="btn btn-warning btn-block text-uppercase"  data-toggle="modal" data-target="#signin"><span class="fa fa-calendar"></span> Request to Book</a></span> 
                    <?php }} ?>
                    <div class="clearfix"></div><br/>
                    <?php if ($_SESSION['guest_id'] != "") { ?>
                        <a href="javascript:void(0)"  class="btn btn-info btn-block text-uppercase"  data-toggle="modal" data-target="#contacttohost" ><span class="fa fa-envelope"></span> Contact Host</a>

                    <?php } else { ?>
                        <span onclick="insertsigninvaluefield('<?php echo $_REQUEST['property_id']; ?>');"><a href="javascript:void(0)" onclick="regremoveerrormsg();" class="btn btn-info btn-block text-uppercase"  data-toggle="modal" data-target="#signin"><span class="fa fa-envelope"></span> Contact Host</a></span>
                    <?php } ?>
                    <div class="clearfix"></div><br/>
                    <?php if ($_SESSION['guest_id'] != "") { ?>
                        <a href="javascript:void(0)"  class="btn btn-danger btn-block text-uppercase"  data-toggle="modal" data-target="#wishlist"><span class="fa fa-heart"></span> Save to Wish List</a>

                    <?php } else { ?>
                        <span onclick="insertsigninvaluefield('<?php echo $_REQUEST['property_id']; ?>');"><a href="javascript:void(0)" onclick="regremoveerrormsg();" class="btn btn-danger btn-block text-uppercase"  data-toggle="modal" data-target="#signin" ><span class="fa fa-heart"></span> Save to Wish List</a></span>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div><br/>
            <div>
                <h4><strong>About this listing</strong></h4>
                <p><?php echo $about_this_list; ?></p>
            </div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">The Space</strong></h5>
                </div>
                <div class="col-md-5 line-height">
                    Accommodates: <strong><?php
                        if ($accommodation != "") {
                            echo $accommodation . "&nbsp;Badrooms";
                        }
                        ?></strong><br/>
                    Bathrooms: <strong><?php
                        if ($bathrooms != "") {
                            echo $bathrooms . "&nbsp;Bathrooms";
                        }
                        ?></strong><br/>

                    Check In: <strong><?php echo $check_in; ?></strong><br/>
                    Check Out: <strong><?php echo $check_out; ?></strong><br/>
                </div>
                <div class="col-md-5 line-height">
                    Max Guests: <strong><?php
                        if ($guests != "") {
                            echo $guests . "&nbsp;Guests";
                        }
                        ?></strong><br/>
                    Beds: <strong><?php
                        if ($beds != "") {
                            echo $beds . "&nbsp;Beds";
                        }
                        ?></strong><br/>
                    Property type: <strong><?php echo $property_type; ?></strong><br/>
                    Room type: <strong><?php echo $room_type_deatils; ?></strong>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">Amenities</strong></h5>
                </div>
                <div class="col-md-10 line-height">
                    <?php echo $amenities_name; ?><br/>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">Prices</strong></h5>
                </div>
                <div class="col-md-5 line-height">
                    Price Per Night: <strong><span class="fa fa-rupee"></span> <?php echo $property_price; ?></strong><br/>
                    Price Per Week: <strong><?php echo $weekly_discount; ?></strong><br/>
                    Price Per Month: <strong><?php echo $monthly_discount; ?></strong><br/>
                    Cleaning Fee: <strong><?php echo $cleaning_fee; ?></strong><br/>
                </div>
                <div class="col-md-5 line-height">
                    Extra People: <strong><?php echo $extra_people; ?></strong><br/>
                    Security Deposit: <strong><?php echo $security_deposit; ?></strong><br/>
                    Cancellation: <strong><a href="#" class="text-danger"><?php echo $cancellation; ?></a></strong>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">Description</strong></h5>
                </div>
                <div class="col-md-10 line-height">
                    <p class="text-justify">
                        <?php echo $description; ?>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">House Rules</strong></h5>
                </div>
                <div class="col-md-10 line-height">
                    <p class="text-justify">
                        <?php echo $house_rules; ?>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">Availability</strong></h5>
                </div>
                <div class="col-md-5 line-height">
                    <p class="text-justify">
                        <?php echo $availability; ?>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>
            <div>
                <div class="col-md-2">
                    <h5><strong class="text-muted">Address</strong></h5>
                </div>
                <div class="col-md-10 line-height">
                    Address: <?php echo $address; ?>
                    <div class="clearfix"></div><br/>
                    <div class="col-md-4 padnoneleft">
                        Country: <?php echo $country_name; ?>
                        <div class="clearfix"></div><br/>
                        Zip Code: <?php echo $zip_code; ?><br/>
                    </div>
                    <div class="col-md-4">
                        State: <?php echo $state_name; ?><br/>
                    </div>
                    <div class="col-md-4">
                        City: <?php echo $city; ?><br/>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><br/>
        </div>
        <div class="clearfix"></div><br/>
    </div>

</div>
<div class="white-bg">
    <div class="container">
        <div class="row">   
            <div class="clearfix"></div><br/>
            <div class="col-md-10">
                <h4>
                     <?php if (!empty($review_details_arr)) { ?>
                    <?php echo $count_review; ?> Reviews
                    <?php } ?>                </h4>
            </div>
            <div class="col-md-2">
                <?php if ($_SESSION['guest_id'] != "") { ?>
                    <a href="javascript:void(0)"  class="btn btn-info btn-block"  data-toggle="modal" data-target="#addreview" >Add Review</a>

                <?php } else { ?>
                    <span onclick="insertsigninvaluefield('<?php echo $_REQUEST['property_id']; ?>');"><a href="javascript:void(0)" onclick="regremoveerrormsg();" class="btn btn-warning btn-block"  data-toggle="modal" data-target="#signin">Add Review</a></span>
                <?php } ?>

            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="clearfix"></div>

            <?php if (!empty($review_details_arr)) { ?>
                <?php
                foreach ((array) $review_details_arr as $review_det) {

                    $add_date = date("jS F, Y", strtotime($review_det['add_date']));

                    $Objnew = new class_host();
                    $Objnew->guest_id = $review_det['guest_id'];
                    $res_guest = $Objnew->selectguestsdeatils();
                    $row_guest = mysqli_fetch_assoc($res_guest);
                    $image = $row_guest['logo_img'];
//********arib_property_tbl********
                    $firstname = $row_guest['firstname'];
                    ?>
                    <?php if ($_SESSION['guest_id'] == $review_det['guest_id']) { ?>
                        <div class="media">
                            <div class="media-left pull-left text-center">

                                <?php if ($image != "") { ?>
                                    <img class="media-object img-circle pull-left" src="uploads/<?php echo $image; ?>" alt="..." style="width: 64px;height: 64px;margin-right: 10px;">
                                <?php } else { ?>
                                    <img class="media-object img-circle pull-left" src="images/user_pic.png" alt="..." style="width: 64px;height: 64px;margin-right: 10px;">
                                <?php } ?>
                                <br/>
                                Me

                            </div>
                            <div class="media-body">
                                <p>
                                    <?php echo $review_det['description']; ?>
                                </p>
                                <div class="clearfix"></div><br/>
                                <h5 class="top-zero">
                                    <?php echo $add_date; ?>
                                    <!--<a href="#" class="pull-right btn btn-default btn-sm"><span class="fa fa-thumbs-o-up"></span>&nbsp; Helpful</a>-->
                                    <div class="clearfix"></div>
                                </h5>
                                <hr/>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="media">
                            <div class="media-left pull-left text-center">
                                <?php if ($image != "") { ?>
                                    <img class="media-object img-circle pull-left" src="uploads/<?php echo $image; ?>" alt="..." style="width: 64px;height: 64px;margin-right: 10px;">
                                <?php } else { ?>
                                    <img class="media-object img-circle pull-left" src="images/user_pic.png" alt="..." style="width: 64px;height: 64px;margin-right: 10px;">
                                <?php } ?>
                                <br/>
                                <?php echo $firstname; ?>
                            </div>
                            <div class="media-body">
                                <p>
                                    <?php echo $review_det['description']; ?>
                                </p>
                                <div class="clearfix"></div><br/>
                                <h5 class="top-zero">
                                    <?php echo $add_date; ?>
                                    <!--<a href="#" class="pull-right btn btn-default btn-sm"><span class="fa fa-thumbs-o-up"></span>&nbsp; Helpful</a>-->
                                    <div class="clearfix"></div>
                                </h5>
                                <hr/>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="clearfix"></div><br/>
            </div>
        <?php } else { ?>
            <div class="alert alert-info text-center">
                <p>This place would love your review</p>
                <p>When you book this place, here’s where your review will show up!</p>
            </div>
            <div class="clearfix"></div><br/>
        <?php } ?>

    </div>
</div>

<div class="clearfix"></div>

<div class="modal fade" id="bookingpropertypopup" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupLabel">Booking</h4>
            </div>
            <form role="form" id="bookingpropert" action="" method="post">
                <div class="modal-body gutestT">
                    <div class="clearfix"></div><br/>
                    <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>
                    <input type="hidden" class="form-control"  name="property_price" id="property_price" value="<?php echo $property_price; ?>"/>
                    <input type="hidden" class="form-control"  name="title" id="title" value="<?php echo $title; ?>"/>
                    <div class="form-group">
                        <input type="text" class="form-control checkindatepickerfield eeee" onchange="pernigntprice(this.value);"   placeholder="Check In"  name="check_in_date" id="check_in_date" value="<?php echo $_REQUEST['checkin']; ?>"/>
                        <span class="text-danger ss" id="check_in_date_error"><?php echo $error_msg['check_in_date']; ?></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <input type="text" class="form-control checkoutdatepickerfield" onchange="pernigntprice(this.value);" placeholder="Check Out"  name="check_out_date" id="check_out_date" value="<?php echo $_REQUEST['checkout']; ?>"/>
                        <span class="text-danger ff" id="check_out_date_error"><?php echo $error_msg['check_out_date']; ?></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" id="noofnight">
                        <label class="col-sm-6 control-label padnone1 padnoneleft"><strong id="numberheading">Number of Night :</strong></label>
                        <div class="col-sm-6" >
                            <span id="no_of_night" class="ss"><?php echo "1 nights"; ?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label padnone1 padnoneleft"><strong id="priceheading">Price Per Night :</strong></label>
                        <div class="col-sm-6">
                            <span id="total_amount"><?php echo "<span class='fa fa-rupee'></span>&nbsp;" . $property_price; ?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" id="totalprice">
                        <label class="col-sm-6 control-label padnone1 padnoneleft"><strong>Total :</strong></label>
                        <div class="col-sm-6" >
                            <span class="booking_price"><?php echo "<span class='fa fa-rupee'></span>&nbsp;" . $property_price; ?></span>
                        </div>
                    </div>                       
                </div>
                <div class="clearfix"></div><br/>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green btn-block isThemeBtn"><i class="fa fa-calendar"></i> BOOK</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="contacttohost" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="regremoveerrormsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupLabel">Contact Host</h4>
            </div>
            <form role="form" id="contacttdfdsfdsfohost" action="" method="post">
                <div class="modal-body displayT">
                    <span id="successcontactmsg"></span>
                    <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" name="checkindate"  id="checkindate" placeholder="Check in" class="form-control checkindatepickerfield" value="<?php echo $_REQUEST['checkin']; ?>"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" name="checkoutdate" id="checkoutdate" placeholder="Check out" class="form-control checkoutdatepickerfield" value="<?php echo $_REQUEST['checkout']; ?>"/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control" name="guests" id="guests" >
                                <option value="">Select</option>
                                <?php
                                for ($i = 1; $i <= 15; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i . '&nbsp;guest'; ?></option>
                                <?php } ?>
                                <option value="17">16+ guest</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="message" id="message" placeholder="Start your message....."></textarea>
                        </div>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="btn-group-justified">
                                <button type="submit" class="btn btn-lg btn-green isThemeBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addreview" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="reviewremoveerrormsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupLabel">Add Review</h4>
            </div>
            <form role="form" id="addreviewform" action="" method="post">
                <div class="modal-body displayT">
                    <span id="successreviewmsg"></span>
                    <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="addreview" id="addreview" placeholder="Start your review....."></textarea>
                        </div>
                    </div>                   
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="btn-group-justified">
                                <button type="submit" class="btn btn-lg btn-green isThemeBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="wishlist" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="regremoveerrormsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupLabel">Save to Wish List</h4>
            </div>

            <div class="modal-body dadas">
                <span id="successcontactmsg"></span>
                <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>

                <div id="showwishlistcategoerydetails" class="loderwishlist">
                    <div>
                        <table class="table table-striped table-hover" style="box-shadow: none;">
                            <?php foreach ((array) $wishlist_details_arr as $details) { ?>
                                <tr>
                                    <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;"><?php echo $details['wishlist_category_name']; ?></td>
                                    <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;">
                                        <input type="checkbox" name="wishtlist" class="chk_wishlist" onclick="addwishlist('<?php echo $_REQUEST['property_id']; ?>', '<?php echo $details['wishlist_category_id']; ?>', this)" value="<?php echo $_REQUEST['property_id']; ?>"<?php
                                        if (in_array($details['wishlist_category_id'], $wishlist_arr)) {
                                            echo "checked";
                                        }
                                        ?>>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>    
                </div>                
            </div>
            <div class="modal-footer" style="text-align: left;">
                <div id="hide-createwishlistcat" >
                    <span onclick="hideshowwishlistdiv();" style="cursor: pointer;color: #ff0000;">Create New Wish List</span>
                </div>
                <form role="form" id="createwishlistcategory" action="" method="post">
                    <div  id="show-createwishlistcat" style="display:none;">
                        <div>
                            <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input type="text" name="wishlist_category_name" id="wishlist_category_name" placeholder="Name Your Wish List" class="form-control" value="<?php echo $_REQUEST['checkout']; ?>"/>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="btn-group-justified">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block isThemeBtn">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>

