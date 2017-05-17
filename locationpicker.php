


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="js/locationpicker.jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500|Roboto+Condensed' rel='stylesheet' type='text/css'>
<meta charset="utf-8"/>
<!--<input type="hidden" id="consult_fee_check" name="consult_fee_check" value="<?php echo $detail_display_array[0]['consult_fee']; ?>">-->
<div class="form-group">
    <label class="col-sm-4 control-label text-right"><strong>Location Map</strong></label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="us3-address" name="map_location" value="<?php echo $detail_array[0]['map_location']; ?>"/>
        <input type="hidden" class="form-control" id="us3-address_match" name="map_location_match" value="<?php echo $detail_array[0]['map_location']; ?>"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label text-right"></label>
    <div class="col-sm-6">
        <div id="us3" style="width: 450px; height: 400px;"></div>
    </div>
</div>
<script>
    var jcal = jQuery.noConflict();
    jcal(document).ready(function() {
        jcal('#us3').locationpicker({
            location: {latitude: <?php echo '46.15242437752303'; ?>, longitude: <?php echo '2.7470703125'; ?>},
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

<?php
//$mainpagecontent = ob_get_contents();
//ob_clean();
include 'masters/doctor-master.php';
?>
