
var map;
var directionDisplay;
var directionsService;
var stepDisplay;
//var markerArray = [];
var markerArray = [];
var pointArray = [];
var position;
//var marker = null;
var marker = null;

var polyline = null;
var poly2 = null;

var polylineFull = null;
var poly2Full = null;

var speed = 0.000005, wait = 1;
var infowindow = null;
  
var myPano;   
var panoClient;
var nextPanoId;
var timerHandle = 0;
var timerHandleAll = 0;

var step = 1000; // 5; // metres
var tick = 0.001; // milliseconds
var eol; 
var k=0; 
var stepnum=0;
var lastVertex = 1;
var aniStrokeColor = "#000000";

function createMarker(latlng, label) {
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: label,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;
    return marker;
}
            
function initialize() {
    infowindow = new google.maps.InfoWindow(
    { 
        size: new google.maps.Size(600,400)
    });
    
    // Create a map and center it on Manhattan.
    var myOptions = {
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    address = 'India'
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( {
        'address': address
    }, function(results, status) {
        map.setCenter(results[0].geometry.location);
    });    
}

function codeAddress(loc) {
//    $("#toggleMap").trigger('click');
    initialize();
    var address;
    if(loc=="" || loc===undefined){
        address = document.getElementById('task_loc').value;
    }
    else{
        address = loc;
    }
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

