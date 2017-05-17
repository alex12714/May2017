<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";

$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
$country = $row['country'];
$state = $row['state'];
$city = common::StrFromDb($row['city']);

$map_location = common::StrFromDb($row['map_location']);
$longitude = $row['longitude'];
$latitude = $row['latitude'];


if ($longitude == "" || $latitude == "") {
    $get_latitude = '0';
    $get_logitude = '0';
} else {
    $get_latitude = $latitude;
    $get_logitude = $longitude;
}
$Objnew->state_id = $state;
$res2 = $Objnew->getstate();
$row = mysqli_fetch_assoc($res2);
$state_name = $row['state_name'];



$result_coun = $Objnew->getcountry();
while ($row_res = mysqli_fetch_assoc($result_coun)) {
    $country_det_arr[] = $row_res;
}
$result_coun1 = $Objnew->selstate();
while ($row_res1 = mysqli_fetch_assoc($result_coun1)) {
    $state_det_arr[] = $row_res1;
}
$result_city = $Objnew->city();
while ($row = mysqli_fetch_assoc($result_city)) {
    $city_det_arr[] = $row;
}




// echo $genrated_id = $Objnew->genrated_id = common::StrToDB($_REQUEST['genrated_id'])."sdas";
?>
<!------------first step------------------------>
<head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="../js/locationpicker.jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500|Roboto+Condensed' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>

<div class="">
    <input type="hidden" name="genrated_id"  class="form-control genrated_id" value="<?php echo $_REQUEST['property_id']; ?>">
    <div class="col-sm-4">
        <div>
            <h2 class="top-zero">Country</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="country" onchange="selectstate(this.value);"  id="country">
                            <option value="">Select</option>
                            <?php foreach ((array) $country_det_arr as $det) { ?>
                                <option value="<?php echo $det['iso']; ?>"<?php
                                if ($det['iso'] == $country) {
                                    echo 'selected';
                                }
                                ?>><?php echo $det['printable_name']; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>      

    </div>
    <div class="col-sm-4">
        <div>
            <h2 class="top-zero">State</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" onchange="selectcity(this.value);" name="state" id="state">
                            <option value="">Select</option>
                            <?php if ($state != "") { ?>
                                <?php foreach ((array) $state_det_arr as $det) { ?>
                                    <option value="<?php echo $det['state_id']; ?>"<?php
                                    if ($det['state_id'] == $state) {
                                        echo 'selected';
                                    }
                                    ?>><?php echo $det['state_name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-4">
        <div>
            <h2 class="top-zero">City</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-control" name="city" id="city">
                            <option value="">Select</option>
                            <?php if ($city != "") { ?>
                                <?php foreach ((array) $city_det_arr as $det) { ?>
                                    <option value="<?php echo $det['city_name']; ?>"<?php
                                    if ($det['city_name'] == $city) {
                                        echo 'selected';
                                    }
                                    ?>><?php echo $det['city_name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div>
            <h2 class="top-zero">Enter Location</h2>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="us3-address" name="map_location" value="<?php echo $map_location; ?>" placeholder="Enter Location"/>
                        <input type="hidden" class="form-control" id="us3-address_match" name="map_location_match" value="<?php echo $map_location; ?>"/>                                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="form-group">
            <div class="col-sm-12">
                <div id="us3" style="height: 400px;"></div>
            </div>
        </div>
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


        <input type="hidden" class="form-control" id="us3-radius" value="0"/>
        <input type="hidden" class="form-control" id="us3-lat" name="latitude" value="<?php echo $get_latitude; ?>"/>

        <input type="hidden" class="form-control" id="us3-lon" name="longitude" value="<?php echo $get_logitude; ?>"/>

    </div>
</div>
<script>
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        options.async = true;
    });
</script>
