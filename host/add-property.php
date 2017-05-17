<?php
ob_start();
include 'add-property.inc.php';
?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCDdbu_6FSrdpImN5-7MRQ4RfYvn7fVi9s'></script>
<script src="../js/locationpicker.jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500|Roboto+Condensed' rel='stylesheet' type='text/css'>

<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Add Property</h2>
                </div>
                <ul class="breadcrumbs pull-right" style="padding-top: 13px;list-style: none;">
                    <!--<li><button type="submit" class="btn btn-warning btn-sm pull-right" style="font-size: 14px;">Save &amp; Exit</button></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<form role="form" id="spaceform" action="" method="post">
    <section id="content">
        <div class="container">

            <?php if ($count_total_property >= $allowed_to_add_property) { ?>
                <div class="alert alert-danger">
                    <strong>Note:</strong>
                   You have consumed your property posting limit. Contact system administrator !!
                </div>
            <?php } else { ?>
                <div class="alert alert-info">
                    <strong>Note:</strong>
                    <ul style="margin-left: -25px;">
                        <li>Property Posting Limit: <?php echo $allowed_to_add_property; ?> </li>
                        <li>Remaining Property : <?php echo $remaining_add_property; ?> </li>
                    </ul>                
                </div>
            <?php } ?>


            <div class="tabsContainer">
                <ul class="nav nav-tabs nav-justified text-uppercase" role="tablist">
                    <li id="tab11" class="cc active"><a>Property Description</a></li>
                    <li id="tab22" class="cc"><a >Basic Details</a></li>
                    <li id="tab33"  class="cc"><a  >PRICE</a></li>
                    <li id="tab44"  class="cc"><a  >AMENITIES & other</a></li>
                    <!--<li id="tab55"  class="cc"><a  >Google Map</a></li>-->
                    <li id="tab66"  class="cc"><a  >Photos</a></li>

                </ul>
                <div class="tab-content">

                    <div class="dd tab-pane fade in active" id="p_desc">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h2>What kind of place are you listing?</h2>
                            </div>
                            <input type="hidden" name="genrated_id"  class="form-control genrated_id" value="" />
                            <div style="line-height: 30px;">
                                <?php
                                $i = 0;
                                foreach ((array) $categoryroomtype_arr as $det) {
                                    ?>
                                    <?php if ($i === 0) { ?>
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type"  value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="../images/entire.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>

                                    <?php } else if ($i === 1) { ?>
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="../images/private.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>

                                    <?php } else if ($i === 2) { ?>
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="../images/shared.png"> &nbsp; <?php echo $det['category_name']; ?></label></div>
                                    <?php } else { ?>
                                        <div class="checkbox custom-checkbox"><label><input type="checkbox" name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;&nbsp; <?php echo $det['category_name']; ?></label></div>
                                    <?php } ?>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <h2>What type of property is this?</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="property_type" id="property_type">
                                                <option value="">Select One</option>
                                                <?php foreach ((array) $propertytype_list_details as $det) { ?>
                                                    <option value="<?php echo $det['property_type']; ?>"><?php echo $det['property_type']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2>Enter Location</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="us3-address" onkeyup="abc();" name="map_location" value="" placeholder="Enter Location" />
                                            <input type="hidden" class="form-control" id="us3-address_match" name="map_location_match" value=""/>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div>
                                <h2 >Name your place</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="title" id="title" class="form-control" value="" placeholder="Title"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <h2 class="top-zero">Country</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="country" onchange="selectstate(this.value);"  id="country">
                                                <option value="">Select</option>
                                                <?php foreach ((array) $country_det_arr as $det) { ?>
                                                    <option value="<?php echo $det['iso']; ?>"><?php echo $det['printable_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <h2 class="top-zero">State</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" onchange="selectcity(this.value);" name="state" id="state">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>   
                            <div>
                                <h2 class="top-zero">City</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="city" id="city">
                                                <option value="">Select</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>   
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h2>Zip Code</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input  type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Zip Code"/>
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
                                            <textarea class="form-control" rows="10" name="address" id="address" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="col-md-12">                            
                            <div class="form-group" id="showmap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="us3" style="height: 250px;" class="thumbnail btm-zero"></div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var jcal = jQuery.noConflict();
                                jcal(document).ready(function() {
                                    jcal('#us3').locationpicker({
                                        location: {latitude: '0', longitude: '0'},
                                        radius: 0,
                                        zoom: 2,
                                        inputBinding: {
                                            latitudeInput: jcal('#us3-lat'),
                                            longitudeInput: jcal('#us3-lon'),
                                            radiusInput: jcal('#us3-radius'),
                                            locationNameInput: jcal('#us3-address')
                                        },
                                        enableAutocomplete: true,
                                        onchanged: function(currentLocation, radius, isMarkerDropped) {
                                            // Uncomment line below to show alert on each Location Changed event
                                            // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                                        }
                                    });
                                });
                            </script>

                            <input type="hidden" class="form-control" id="us3-radius" value="0"/>
                            <input type="hidden" class="form-control" id="us3-lat" name="latitude" value="<?php echo $latitude; ?>"/>
                            <input type="hidden" class="form-control" id="us3-lon" name="longitude" value="<?php echo $longitude; ?>"/>
                        </div>
                        <div class="col-md-12">
                            <hr/>
                            <div class="clearfix"></div>
                            <?php if ($count_total_property >= $allowed_to_add_property) { ?>
                            <?php } else { ?>
                                <div class="form-group">
                                    <button type="submit" name="tab1_btn" onclick="addremoveclass('tab22', 'basicdteails');"  id="submit" class="btn btn-green isThemeBtn clickable pull-right">Save & Next <span class="glyphicon glyphicon-step-forward"></span></button>
                                    <div class="clearfix"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!---------------end space----------------->

                    <div class="dd tab-pane fade " id="basicdteails">

                        <div class="col-md-6">                            
                            <div>
                                <h2>Available To Book</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="accommodate" id="accommodate">
                                                <option value="1">Select</option>
                                                <option value="Studio">Studio</option>
                                                <?php
                                                for ($i = 1; $i <= 15; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i . '&nbsp;Bedrooms'; ?></option>
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
                                                    <option value="<?php echo $i; ?>"><?php echo $i . '&nbsp;beds'; ?></option>
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
                                <h2>Max Guests </h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                <option value="17">16+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <hr/>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <button type="submit" name="tab2_btn" onclick="addremoveclass('tab33', 'price');"  id="submit" class="btn btn-green isThemeBtn clickable pull-right" style="margin-left: 10px;">Save & Next <span class="glyphicon glyphicon-step-forward"></span></button>
                                <a style="cursor: pointer;" onclick="addremoveclass('tab11', 'p_desc');" class="btn btn-red pull-right" id="back2"><span class="glyphicon glyphicon-step-backward" id="back1"></span> Back</a> &nbsp; &nbsp; &nbsp;
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="dd tab-pane fade" id="price">
                        <div class="col-md-4">
                            <div>
                                <h2>Price Per Night</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="property_price" id="property_price" placeholder="Price Per Night"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2>Extra People</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="extra_people" id="extra_people" placeholder="Extra People"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h2>Cleaning Fee</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Cleaning Fee"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--                            <div>
                                                            <h2>Price Per Month</h2>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="text" class="form-control" name="monthly_discount" id="monthly_discount" placeholder="Price Per Month"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h2>Price Per Week</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="weekly_discount" id="weekly_discount" placeholder="Weekly Discount"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2>Cancellation</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="cancellation" class="form-control" id="cancellation">
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!--                            <div>
                                                            <h2>Cleaning Fee</h2>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="text" class="form-control" name="cleaning_fee" id="cleaning_fee" placeholder="Cleaning Fee"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                            <div>
                                <h2>Price Per Month</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="monthly_discount" id="monthly_discount" placeholder="Price Per Month"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2>Security Deposit</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="security_deposit" id="security_deposit" placeholder="Security Deposit"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr/>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <button type="submit" name="tab4_btn" onclick="addremoveclass('tab44', 'amenities');"  id="submit" class="btn btn-green isThemeBtn clickable pull-right" style="margin-left: 10px;">Save & Next <span class="glyphicon glyphicon-step-forward"></span></button>
                                <a style="cursor: pointer;" onclick="addremoveclass('tab22', 'basicdteails');" class="btn btn-red pull-right"><span class="glyphicon glyphicon-step-backward"></span> Back</a> &nbsp; &nbsp; &nbsp;
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="dd tab-pane fade" id="amenities">
                        <div class="col-md-12">
                            <div>
                                <h2>What amenities do you offer?</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <?php foreach ((array) $amenitiesdet_arr as $det) { ?>
                                            <div class="col-md-3">
                                                <div class="checkbox custom-checkbox"><label><input type="checkbox" name="amenities[]"  value="<?php echo $det['amenities']; ?>"/><span class="fa fa-check"></span> &nbsp; <?php echo $det['amenities']; ?></label></div>
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
                                            <textarea name="description" id="description" class="form-control" placeholder="Full Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2>Available</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="availability" id="availability" placeholder="Available"/>
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
                                            <textarea name="about_this_list" id="about_this_list" class="form-control" placeholder="Short Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h2>Check In</h2>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="check_in" id="check_in"  class="checkindatepicker form-control" placeholder="Check In"/>
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
                                            <textarea name="house_rules" id="house_rules" class="form-control" placeholder="House Rules"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                            <div>
                                <h2>Check Out</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="check_out" id="check_out" class="checkoutdatepicker form-control" value="" placeholder="Check Out"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr/>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <button type="submit" name="tab3_btn" onclick="addremoveclass('tab66', 'image');"   id="submit" class="btn btn-green isThemeBtn clickable pull-right" style="margin-left: 10px;">Save & Next <span class="glyphicon glyphicon-step-forward"></span></button>
                                <a style="cursor: pointer;" onclick="addremoveclass('tab33', 'price');" class="btn btn-red pull-right"><span class="glyphicon glyphicon-step-backward"></span> Back</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!--                    <div class="dd tab-pane fade" id="googlemap">
                    
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="col-md-12">
                                                <hr/>
                                                <div class="clearfix"></div>
                                                <div class="form-group">
                                                    <button type="submit" name="tab3_btn" onclick="addremoveclass('tab66', 'image');"   id="submit" class="btn btn-green isThemeBtn clickable pull-right" style="margin-left: 10px;">Save & Next <span class="glyphicon glyphicon-step-forward"></span></button>
                                                    <a style="cursor: pointer;" onclick="addremoveclass('tab44', 'amenities');" class="btn btn-red pull-right"><span class="glyphicon glyphicon-step-backward"></span> Back</a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>-->


                    <!--</form>-->
                    <!--</div>-->

                    <div class="dd tab-pane fade" id="image">

                        <iframe id="myFrame" width="100%" frameBorder="0" scrolling="no" height="330px">

                        </iframe> 
                        <div class="form-group">
                            <div class="col-sm-12">
                                <hr/>
                                <div class="clearfix"></div>
                                <a style="cursor: pointer;" onclick="addremoveclass('tab44', 'amenities');" class="btn btn-red"><span class="glyphicon glyphicon-step-backward"></span> Back</a> &nbsp;
                                <a href="propertylist.php" class="btn btn-green isThemeBtn clickable"><span class="fa fa-check"></span> Finish</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div><br/>
                    </div>
                    <span class="image-info-details"></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div><br/>
    </section>
</form>
<div class="clearfix"></div>

<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/host-master.php';
?>