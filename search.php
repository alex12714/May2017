<?php
ob_start();
include 'search.inc.php';
?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCDdbu_6FSrdpImN5-7MRQ4RfYvn7fVi9s'></script>
<script src="js/locationpicker.jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500|Roboto+Condensed' rel='stylesheet' type='text/css'>


<div class="white-bg">
    <div class="container">
        <div class="row">
            <div class="clearfix"></div><br/>
            <form role="form" id="searchform" action="" method="post" class="form-horizontal">
                <div class="form-group btm-zero">
                    <label class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="us3-address" name="search_text"   value="<?php echo $_REQUEST['search_text']; ?>" placeholder="Where to?"/>
                        <input type="hidden" class="form-control" id="us3-address_match" name="map_location_match" value="<?php echo $_REQUEST['search_text']; ?>"/>                                     
                        <div id="us3" style="height: 400px; display: none;"></div>              
                        <script>
                            var jcal = jQuery.noConflict();
                            jcal(document).ready(function() {
                                jcal('#us3').locationpicker({
                                    location: {latitude: '<?php echo $get_latitude; ?>', longitude: '<?php echo $get_logitude; ?>'},
                                    radius: 0,
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

                        <input type="hidden" class="form-control" id="us3-radius" name="search_radius" value="0"/>
                        <input type="hidden" class="form-control" id="us3-lat" name="latitude" value="<?php echo $get_latitude; ?>"/>
                        <input type="hidden" class="form-control" id="us3-lon" name="longitude" value="<?php echo $get_logitude; ?>"/>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control checkindatepickerfield checkindatepicker"  placeholder="Check In"  name="check_in"  value="<?php echo $_REQUEST['check_in']; ?>"/>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control checkoutdatepickerfield checkoutdatepicker" placeholder="Check Out"  name="check_out"  value="<?php echo $_REQUEST['check_out']; ?>"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr/>
                </div>
                <div class="form-group btm-zero">
                    <label class="col-sm-2 control-label">Room Type</label>
                    <div class="col-sm-10">
                        <?php
                        $i = 0;
                        foreach ((array) $categoryroomtype_arr as $det) {
                            ?>
                            <div class="col-sm-4 padnoneleft">
                                <?php if ($i === 0) { ?>
                                    <div class="checkbox custom-checkbox"><label><input type="checkbox"  name="room_type[]" id="room_type"  value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="images/entire.png" width="20"/> &nbsp; <?php echo $det['category_name']; ?></label></div>

                                <?php } else if ($i === 1) { ?>
                                    <div class="checkbox custom-checkbox"><label><input type="checkbox"  name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="images/private.png" width="20"/> &nbsp; <?php echo $det['category_name']; ?></label></div>

                                <?php } else if ($i === 2) { ?>
                                    <div class="checkbox custom-checkbox"><label><input type="checkbox"  name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;<img src="images/shared.png" width="20"/> &nbsp; <?php echo $det['category_name']; ?></label></div>
                                <?php } else { ?>
                                    <div class="checkbox custom-checkbox"><label><input type="checkbox"  name="room_type[]" id="room_type" value="<?php echo $det['category_id']; ?>"/><span class="fa fa-check"></span>&nbsp;&nbsp; <?php echo $det['category_name']; ?></label></div>
                                <?php } ?>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr/>
                </div>
                <div class="form-group btm-zero">
                    <label class="col-sm-2 control-label">Price range</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Min Price"   name="minprice"/>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control " placeholder="Max Price"  name="maxprice"/>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" name="searchproperty"  class="btn btn-green isThemeBtn clickable" >Search</button>
                    </div>
                </div>                
            </form>
        </div>

        <div class="clearfix"></div><br/>
    </div>
</div>
</div>
<div class="clearfix"></div><br/>
<div class="container" id="advance-search">
    <?php if (!empty($search_property_arr)) { ?>
        <div class="row">
            <div class="col-md-6">
                <p style="margin-top: 5px;"><span class="fa fa-rupee"></span> Additional fees apply. Taxes may be added.</p>
            </div>
            <!--            <div class="col-md-6">
                            <h5 class="top-zero">
                                <strong class="pull-right">300+ Rentals &bull; Singapore</strong>
                            </h5>
                        </div>-->
            <div class="clearfix"></div><br/>
            <?php
            $obj = new class_search();
            foreach ($search_property_arr as $det) {

                $obj->property_id = $det['property_id'];
                $res_img = $obj->fetchpropertyimages();
                $count = mysqli_num_rows($res_img);
                ?>
                <a href="view-property-details.php?property_id=<?php echo $det['property_id']; ?>&checkin=<?php echo $_REQUEST['check_in']; ?>&checkout=<?php echo $_REQUEST['check_out']; ?>" target="_blank" >
                    <div class="col-md-4">
                        <div>
                            <div id="carousel-example-generic<?php echo $det['property_id']; ?>" class="carousel slide" data-ride="carousel">
                                <?php if ($count > 0) { ?>
                                    <div class="carousel-inner" role="listbox">
                                        <?php
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($res_img)) {
                                            ?>


                                            <?php if ($i === 0) { ?>
                                                <div class="item active">
                                                    <div class="image">
                                                        <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                                        <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?>  <span class="fa fa-bolt text-warning"></span></h4>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="item">
                                                    <div class="image">
                                                        <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                                        <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?>  <span class="fa fa-bolt text-warning"></span></h4>
                                                    </div>
                                                </div>
                                            <?php } ?>



                                            <!--                          -->
                                            <!-- Controls -->

                                            <?php
                                            $i++;
                                        }
                                        ?> 
                                    </div>
                                <?php } else { ?>

                                    <div class="item active">
                                        <div class="image">
                                            <img src="images/no-img-property.jpg" alt="" class="img-responsive"/>
                                            <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?>  <span class="fa fa-bolt text-warning"></span></h4>
                                        </div>
                                    </div>

                                <?php } ?>

                                <a class="right carousel-control" href="#carousel-example-generic<?php echo $det['property_id']; ?>" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <a class="left carousel-control" href="#carousel-example-generic<?php echo $det['property_id']; ?>" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                            </div>
                            <a href="#">
                                <h5 class="text-uppercase"><?php echo $det['title']; ?></h5>
                                <?php echo $det['room_type'] ?> &bull;
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                <span class="fa fa-star text-warning"></span>
                                &bull; 87 reviews
                            </a>
                        </div>
                        <div class="clearfix"></div><br/>

                    </div></a>
            <?php } ?>
            <div class="clearfix"></div><br/>
        </div>
    <?php } else { ?>

        <div class="clearfix"></div><br/>
        <div class="alert alert-success text-center">
            No data Found
        </div>


    <?php } ?>
</div>
<div class="clearfix"></div><br/><br/>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>