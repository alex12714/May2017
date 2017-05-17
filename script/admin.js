$().ready(function() {


    //***********************add property *****************//


    $("#adminloginform").validate({
        rules: {
            email: {
                required: true,
            },
            logpassword: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter user name.",
            },
            logpassword: {
                required: "Please enter password.",
            },
        },
        tooltip_options: {
            email: {
                placement: 'bottom',
                html: true
            },
            logpassword: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {
//alert('hi');
//            var mo = new ajaxLoader('.lodrT');

            $.post("login.inc.php", $("#adminloginform").serialize(), function(data) {
//alert(data);
                var value = $.trim(data);
                if (value == 'admin') {
                    window.location = 'dashboard.php';
//                    mo.remove();
                }
                else if (value == 'error') {
                    $('#adminerror_login').html('<div class="alert alert-success text-center">Wrong Email Or Password.</div>');
//                    mo.remove();
                }

            });


        }

    });
//////********************search property by host************//

    $("#pppp").validate({
        rules: {
            host_id: {
                required: true,
            },
        },
        messages: {
            host_id: {
                required: "Please select host name.",
            },
        },
        tooltip_options: {
            host_id: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {

            $.post("../server/search-host-property.php", $("#pppp").serialize(), function(data) {

                var data1 = $.trim(data);

                $("#displayajaxsearchhostpropertydata").html(data1);

            });

        }
    });





 $("#totalnumberofpropertyform").validate({
        
        submitHandler: function(form) {

            $.post("../server/limit-of-add-properties .php", $("#totalnumberofpropertyform").serialize(), function(data) {

                var data1 = $.trim(data);
if(data1=='1'){
     $("#limitmessage").html('<div class="text-center alert alert-success">Sucessfully Updated</div>');
}
               

            });

        }
    });
//*********************search rentedproperty****************//

$("#searchrentedproperty").validate({
        submitHandler: function(form) {
            $.post("search-rented-property.php", $("#searchrentedproperty").serialize(), function(data) {

                var data1 = $.trim(data);
//alert(data1);
                $("#displayajaxsearchrentedproperty").html(data1);

            });

        }
    });

});

function view_host_deatils(host_id) {

    $.ajax({
        type: "POST",
        url: "../server/view-host-details.php?host_id=" + host_id,
        success: function(data) {
            $("#host-details").html(data);

        }
    });

}

function add_limit_deatils(host_id,total_number_of_property) {

    $("#host_id_for_limit").val(host_id);
    $("#total_number_of_property").val(total_number_of_property);

}


function view_guset_deatils(guest_id) {
//alert(guest_id);
    $.ajax({
        type: "POST",
        url: "../server/view-guest-details.php?guest_id=" + guest_id,
        success: function(data) {
//            alert(data);
            $("#guest-details").html(data);
             $('#closerented').click();

        }
    });

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

function view_property_details(property_id) {
    $.ajax({
        type: "POST",
        url: "../server/view-property-details.php?property_id=" + property_id,
        success: function(data) {


            $("#property_info-details").html(data);

        }
    });
}

function view_property_photos(property_id) {

    $.ajax({
        type: "POST",
        url: "../server/view-property-photos.php?property_id=" + property_id,
        success: function(data) {

            $(".propertyimage-info-details").html(data);

        }
    });

}
function removepropertyDiv(property_id) {
    
    $("#removepoperty" + property_id).remove();
    $.ajax({
        type: "POST",
        url: "../server/delete-property-by-admin.php?property_id=" + property_id,
        success: function(data) {
            if (data == 'succuess') {
                $("#removepoperty" + property_id).remove();
            }
        }
    });

}
function removemsg() {
    
     $("#limitmessage").html('');
     location.reload();

}

function view_rented_propertycheckin(property_id) {
//alert(guest_id);
    $.ajax({
        type: "POST",
        url: "../server/view-rentedprperty-checkin-checkout-details.php?property_id=" + property_id,
        success: function(data) {
//            alert(data);
            $("#rentedproperty-details").html(data);

        }
    });

}