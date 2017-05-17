$().ready(function() {


    //***********************add property *****************//


    $("#spaceform").validate({
        rules: {
            title: {
                required: true,
            },
            country: {
                required: true,
            },
//            city: {
//                required: true,
//            },
            'room_type[]': {
                required: true,
            },
            zip_code: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter title.",
            },
            country: {
                required: "Please select  country.",
            },
//            city: {
//                required: "Please select  country.",
//            },
            room_type: {
                required: "Please select  kind of place",
            },
            zip_code: {
                required: "Please enter zip code.",
            },
        },
        tooltip_options: {
            title: {
                placement: 'bottom',
                html: true
            },
            country: {
                placement: 'bottom',
                html: true
            },
//            city: {
//                placement: 'bottom',
//                html: true
//            },
            room_type: {
                placement: 'bottom',
                html: true
            },
            zip_code: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {

            $.post("add-property.inc.php", $("#spaceform").serialize(), function(data) {

                var value = $.trim(data);
                var data_arr = value.split("*");
                if (data_arr[0] == 'succuess') {
//                    alert(data_arr[3]);
                    $(".genrated_id").val(data_arr[1]);
//                    $("#us3-lat").val(data_arr[2]);
//                    $("#us3-lon").val(data_arr[3]);

                    document.getElementById("myFrame").src = "photoupload.php?id=" + data_arr[1];
//                    document.getElementById("googlemaplocationFrame").src = "hostlocationmap.php?property_id=" + data_arr[1];

                }


            });



        }

    });
    //UPDATE PROFILE


    $("#updatepricing").validate({
        submitHandler: function(form) {
            $.post("propertylist.inc.php", $("#updatepricing").serialize(), function(data) {

                var value = $.trim(data);

                if (value == 'succuess') {
                    $('#pricingmsg').html('<div class="text-center alert alert-success">Updated Successfully</div>');
                }

            });

        }
    });

    $("#updateinfo").validate({
        submitHandler: function(form) {
            $.post("../server/updatedeatils.inc.php", $("#updateinfo").serialize(), function(data) {
                var value = $.trim(data);
                if (value == 'succuess') {
                    $('#propertyupdate').html('<div class="text-center alert alert-success">Updated Successfully</div>');
                }
            });
        }
    });
//    $("#locationupdate").validate({
//        submitHandler: function(form) {
//            $.post("../server/updatehostlocationmap.inc.php", $("#locationupdate").serialize(), function(data) {
//                var value = $.trim(data);
//                if (value == 'succuess') {
//                    $('#addressupdate').html('<div class="text-center alert alert-success">Updated Successfully</div>');
//                }
//
//            });
//
//
//        }
//
//    });


$("#searchcontacttohostmsglist").validate({
        submitHandler: function(form) {
            
            $.post("search-contact-msg-list.php", $("#searchcontacttohostmsglist").serialize(), function(data) {

                var data1 = $.trim(data);
//alert(data);
                $("#displaycontact-msgdata").html(data1);

            });
            
        }
    });

});

function addremoveclass(lid, divid) {

    var title = $("#title").val();
    var country = $("#country").val();
    var city = $("#city").val();
    var zip_code = $("#zip_code").val();


    var checked = []
    var aa = "";
    $("input[name='room_type[]']:checked").each(function()
    {
        var aa = "val";

//   if(aa=='val' && title!="" && country!="" && city!="" && zip_code!=""){
        if (aa == 'val' && title != "" && country != "" && zip_code != "") {
            $('.dd').removeClass('active');
            $('.dd').removeClass('in');
            $('.cc').removeClass('active');
            $("#" + lid).addClass('active');
            $("#" + divid).addClass('in');
            $("#" + divid).addClass('active');
        }
//   alert(aa);
    });
//alert(aa);


//    $('.dd').removeClass('active');
//    $('.dd').removeClass('in');
//    $('.cc').removeClass('active');
//    $("#" + lid).addClass('active');
//    $("#" + divid).addClass('in');
//    $("#" + divid).addClass('active');
}


function selectstate(country_id) {

    $.ajax({
        type: "POST",
        url: "../server/getstate.php",
        data: "country_id=" + country_id,
        success: function(data) {

            $("#state").html(data);
        }
    });
}
function selectcity(state_id) {

    $.ajax({
        type: "POST",
        url: "../server/getcity.php",
        data: "state_id=" + state_id,
        success: function(data) {

            $("#city").html(data);
        }
    });
}
function view_property_details(property_id) {
    $.ajax({
        type: "POST",
        url: "../server/view-property-details.php?property_id=" + property_id,
        success: function(data) {


            $("#property_info-details").html(data);

        }
    });

}
function view_price_details(property_id) {

    $.ajax({
        type: "POST",
        url: "../server/updatepricing.php?property_id=" + property_id,
        success: function(data) {


            $(".price-info-details").html(data);

        }
    });

}
function view_update_details(property_id) {

    $.ajax({
        type: "POST",
        url: "../server/updatedetails.php?property_id=" + property_id,
        success: function(data) {

            $(".property-info-details").html(data);

        }
    });

}
function view_update_location(property_id) {

   document.getElementById("myupdatelocationFrame").src = "updatehostlocationmap.php?property_id=" + property_id;

}
function view_property_photos(property_id) {

    $.ajax({
        type: "POST",
        url: "../server/view-property-photos.php?property_id=" + property_id,
        success: function(data) {


            $(".image-info-details").html(data);

        }
    });

}

function view_calender_booking(property_id) {

   document.getElementById("bookinglistcalendar").src = "booking-list-calendar.php?property_id=" + property_id;

}
function hideshowproperty(property_id) {
$('#propertyupdate').hide();
    $.ajax({
        type: "POST",
        url: "../server/hide-show-property.php?property_id=" + property_id,
        success: function(data) {

//alert(data);

        }
    });

}
function abc(property_id) {
    
$('#showmap').show();
   

}

function view_guset_deatils(guest_id) {
//alert(guest_id);
    $.ajax({
        type: "POST",
        url: "../server/view-guest-details.php?guest_id=" + guest_id,
        success: function(data) {
//            alert(data);
            $("#guest-details").html(data);

        }
    });

}
function view_contacthostmsg_deatils(contact_id) {
//alert(guest_id);
    $.ajax({
        type: "POST",
        url: "../server/view-contacthostmsg-details.php?contact_id=" + contact_id,
        success: function(data) {
//            alert(data);
            $("#contacthostmsg-details").html(data);

        }
    });

}
function removemsg() {
//    alert('hi');
 $("#propertyupdate").html('');
 $("#pricingmsg").html('');

}
$("#searchbookingslist").validate({
        submitHandler: function(form) {

            $.post("search-bookings.php", $("#searchbookingslist").serialize(), function(data) {

                var data1 = $.trim(data);

                $("#displayajaxbookingdata").html(data1);

            });

        }
    });