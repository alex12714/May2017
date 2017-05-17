$().ready(function() {
    $("#frmregpopup").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
            confirmpassword: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            first_name: {
                required: "Please enter first name.",
            },
            last_name: {
                required: "Please enter last name.",
            },
            email: {
                required: "Please enter your email.",
                email: "Please enter correct email."
            },
            password: {
                required: "Please enter password.",
            },
            confirmpassword: {
                required: "<br/>Please enter confirm password.</span>",
                equalTo: "<br/>Confirm password does not match.</span>"
            }
        },
        tooltip_options: {
            first_name: {
                placement: 'bottom',
                html: true
            },
            last_name: {
                placement: 'bottom',
                html: true
            },
            email: {
                placement: 'bottom',
                html: true
            },
            password: {
                placement: 'bottom',
                html: true
            },
            confirmpassword: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {
            $('#msg').html('');
            var lo = new ajaxLoader('.displayT');
            $.post("registeration.php", $("#frmregpopup").serialize(), function(data) {
//                alert(data);
//                lo.remove();
                var data = $.trim(data);
                if (data == "exist") {
//                    alert("Account already exist for this email id");
//                    $('#success_message').("")
                    $('#success_message').html('<div class="text-center alert alert-danger">Account already exist for this email id</div>');
                    lo.remove();
                }
                else if (data == 'succuss') {
                    $('#success_message').html('');
                    $('#frmregpopup')[0].reset();
                    $('#success_message').html('<div class="text-center alert alert-success">You are sucessfully registered and confirmation has been sent to your email address.</div>');
                    $('#hidehostregitationpopup').hide();
                    lo.remove();
                }


            });
        }
    });
//    //**********************************Login CODE************************************// 
//***************************Guset Signup
    $("#guestfrmregpopup").validate({
        rules: {
            guestfirst_name: {
                required: true,
            },
            guestlast_name: {
                required: true,
            },
            guestemail: {
                required: true,
                email: true
            },
            guestpassword: {
                required: true,
            },
            guestconfirmpassword: {
                required: true,
                equalTo: "#guestpassword"
            },
        },
        messages: {
            guestfirst_name: {
                required: "Please enter first name.",
            },
            guestlast_name: {
                required: "Please enter last name.",
            },
            guestemail: {
                required: "Please enter your email.",
                email: "Please enter correct email."
            },
            guestpassword: {
                required: "Please enter password.",
            },
            guestconfirmpassword: {
                required: "<br/>Please enter confirm password.</span>",
                equalTo: "<br/>Confirm password does not match.</span>"
            }
        },
        tooltip_options: {
            guestfirst_name: {
                placement: 'bottom',
                html: true
            },
            guestlast_name: {
                placement: 'bottom',
                html: true
            },
            guestemail: {
                placement: 'bottom',
                html: true
            },
            guestpassword: {
                placement: 'bottom',
                html: true
            },
            guestconfirmpassword: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {
            $('#msg').html('');
            var mo = new ajaxLoader('.gutestT');
            $.post("guestregisteration.php", $("#guestfrmregpopup").serialize(), function(data) {

//                lo.remove();
                var data = $.trim(data);
                if (data == "exist") {
//                    alert("Account already exist for this email id");
//                    $('#success_message').("")
                    $('#guestsuccess_message').html('<div class="text-center alert alert-danger">Account already exist for this email id</div>');
                    mo.remove();
                }
                else if (data == 'succuss') {
                    $('#guestsuccess_message').html('');
                    $('#guestfrmregpopup')[0].reset();
                    $('#guestsuccess_message').html('<div class="text-center alert alert-success">You are sucessfully registered and confirmation has been sent to your email address.</div>');
                    $('#guesthideregitationpopup').hide();
                    mo.remove();
                }


            });
        }
    });
//
    $("#loginform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            logpassword: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter  email.",
                email: "Please enter correct email."
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

            var mo = new ajaxLoader('.lodrT');

            $.post("login.php", $("#loginform").serialize(), function(data) {

                var dataarr = $.trim(data);
                var value = dataarr.split("*");

                if (value[0] == 'host') {
                    window.location = 'host/propertylist.php';
                    mo.remove();
                }
                else if (value[0] == 'guest') {

                    window.location = 'index.php';
                    mo.remove();
                }
                else if (value[0] == 'guestbook') {

//                    window.location = 'view-property-details.php';
                    window.location = 'view-property-details.php?property_id=' + value[1];
                    mo.remove();
                }

                else if (value[0] == 'error') {
                    $('#error_login').html('Wrong Email Or Password.');
                    mo.remove();
                }

            });


        }

    });

    ////////////////////////////Booking property*****************//

    $("#searchbookingslist").validate({
        submitHandler: function(form) {

            $.post("search-bookings.php", $("#searchbookingslist").serialize(), function(data) {

                var data1 = $.trim(data);

                $("#displayajaxbookingdata").html(data1);

            });

        }
    });

    //***********************add property *****************//

    $("#spaceform").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
            confirmpassword: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            first_name: {
                required: "Please enter first name.",
            },
            last_name: {
                required: "Please enter last name.",
            },
            email: {
                required: "Please enter your email.",
                email: "Please enter correct email."
            },
            password: {
                required: "Please enter password.",
            },
            confirmpassword: {
                required: "<br/>Please enter confirm password.</span>",
                equalTo: "<br/>Confirm password does not match.</span>"
            }
        },
        tooltip_options: {
            first_name: {
                placement: 'bottom',
                html: true
            },
            last_name: {
                placement: 'bottom',
                html: true
            },
            email: {
                placement: 'bottom',
                html: true
            },
            password: {
                placement: 'bottom',
                html: true
            },
            confirmpassword: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {
            $('#msg').html('');
//            var lo = new ajaxLoader('.displayT');
            $.post("registeration.php", $("#frmregpopup").serialize(), function(data) {
//                alert(data);
                var data1 = $.trim(data);
                if (data1 == "exist") {
//                    alert("Account already exist for this email id");
//                    $('#success_message').("")
                    $('#success_message').html('<div class="text-center alert alert-danger">Account already exist for this email id</div>');
                }
                else if (data1 == 'succuss') {
                    $('#success_message').html('');
                    $('#frmregpopup')[0].reset();
                    $('#success_message').html('<div class="text-center alert alert-success">Successfully Sign Up</div>');
                }


            });
        }
    });

    $("#contacttdfdsfdsfohost").validate({
        rules: {
            checkindate: {
                required: true,
            },
            checkoutdate: {
                required: true,
            },
            guests: {
                required: true,
            },
            message: {
                required: true,
            },
        },
        messages: {
            checkindate: {
                required: "Please select check in.",
            },
            checkoutdate: {
                required: "Please select check out .",
            },
            guests: {
                required: "Please select  guest.",
            },
            message: {
                required: "Please enter message.",
            },
        },
        tooltip_options: {
            checkindate: {
                placement: 'bottom',
                html: true
            },
            checkoutdate: {
                placement: 'bottom',
                html: true
            },
            guests: {
                placement: 'bottom',
                html: true
            },
            message: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {

            var mo = new ajaxLoader('.displayT');

            $.post("contact-host.php", $("#contacttdfdsfdsfohost").serialize(), function(data) {
//alert(data);
                var data = $.trim(data);
                if (data == 'succuess') {
                    $('#contacttdfdsfdsfohost')[0].reset();
                    $('#successcontactmsg').html('<div class="text-center alert alert-success">Message Successfully Sent</div>');
                    mo.remove();
                }
//               
            });
        }

    });

    $("#addreviewform").validate({
        rules: {
            addreview: {
                required: true,
            },
        },
        messages: {
            addreview: {
                required: "Please enter review.",
            },
        },
        tooltip_options: {
            addreview: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {

            var mo = new ajaxLoader('.displayT');

            $.post("add-review.php", $("#addreviewform").serialize(), function(data) {
//alert(data);
                var data = $.trim(data);
                if (data == 'succuess') {
                    $('#addreviewform')[0].reset();
                    $('#successreviewmsg').html('<div class="text-center alert alert-success">Review Successfully Posted</div>');
                    mo.remove();
                }
//               
            });
        }

    });

    $("#subscribeform").validate({
        rules: {
            subscribeemail: {
                required: true,
            },
        },
        messages: {
            subscribeemail: {
                required: "Please enter your email.",
                email: "Please enter correct email."
            },
        },
        tooltip_options: {
            subscribeemail: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {

            var mo = new ajaxLoader('.subscribeloader');

            $.post("add-subscribe-email.php", $("#subscribeform").serialize(), function(data) {
//alert(data);
                var data = $.trim(data);
                if (data == 'succuess') {
                    $('#subscribeform')[0].reset();
                    $('#subscribemsg').html('<div class="text-center alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your Email id Added Successfully</div>');
                    mo.remove();
                }
                if (data == 'exist') {
                    $('#subscribeform')[0].reset();
                    $('#subscribemsg').html('<div class="text-center alert alert-success "><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email id Already Exist</div>');
                    mo.remove();
                }
//               
            });
        }

    });

    $("#searchform").validate({
        submitHandler: function(form) {
            var lo = new ajaxLoader('.displayT');
            $.post("advance-search-property.php", $("#searchform").serialize(), function(data) {

                var data1 = $.trim(data);

                $("#advance-search").html(data1);

            });
            lo.remove();
        }
    });

    $("#createwishlistcategory").validate({
        rules: {
            wishlist_category_name: {
                required: true,
            },
        },
        messages: {
            wishlist_category_name: {
                required: "Please enter wish list name.",
            },
        },
        tooltip_options: {
            wishlist_category_name: {
                placement: 'bottom',
                html: true
            },
        },
        submitHandler: function(form) {
            var lo = new ajaxLoader('.loderwishlist');
            var property_id = $("#property_val_id").val();
            $.post("add-wishlist-category.php", $("#createwishlistcategory").serialize(), function(data) {
                var data1 = $.trim(data);

                if (data1 === 'succuess') {
                    $.ajax({
                        type: "POST",
                        url: "server/ajax-wishlist_category_show.php?property_id=" + property_id,
                        success: function(data) {
                            if (data != "") {
                                $("#showwishlistcategoerydetails").html(data);
                            }
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "server/ajax-wishlist_category_delete_show.php?property_id=" + property_id,
                        success: function(data) {
                            if (data != "") {
                                $("#deletelistwishlistcategoerydetails").html(data);
                            }
                        }
                    });
                    $('#createwishlistcategory')[0].reset();
                    $('#successwishlistmsg').html('<div class="text-center alert alert-success">Wish List Successfully Create</div>');
                    lo.remove();
                }
            });

        }
    });

    $('#check_in_date_error').html('');
    $('#check_out_date_error').html('');

    $('.ss').html('');
    $('.ff').html('');
    ///////////////////////booking///////////////////////////

    $("#bookingpropert").validate({
        submitHandler: function(form) {

            var lo = new ajaxLoader('.displayT');
            $.post("booking.inc.php", $("#bookingpropert").serialize(), function(data) {

                var data1 = $.trim(data);

                if (data1 == 'booked')
                {
                    window.location = 'booking-confirmation.php';
                }
                else if (data1 == 'checkinblank')
                {

                    $('#check_in_date_error').html('Please enter check in');
                }
                else if (data1 == 'checkout')
                {
                    $('#check_in_date_error').html('');
                    $('.ss').html('');
                    $('#check_out_date_error').html('Please enter  check out');

                }
                else if (data1 == 'checkoutgrater')
                {
                    $('#check_out_date_error').html('Check out date must be grater  in check in date');
                }
                else if (data1 == 'checkincekoutblank')
                {
                    $('.ss').html('Please enter check in');
                    $('.ff').html('Please enter  check out');
                }


            });
            lo.remove();
        }
    });

});


function regremoveerrormsg() {

    $('#success_message').html('');
    $('#successreviewmsg').html('');
    $('#successcontactmsg').html('');
    $('#guestsuccess_message').html('');
    $('#error_login').html('');
    $('#frmregpopup')[0].reset();
    $('#loginform')[0].reset();
    $('#hidehostregitationpopup').show();
    $('#guesthideregitationpopup').show();
    $('#show-createwishlistcat').hide();
    $('#hide-createwishlistcat').show();
}
function insertsigninvaluefield(data) {
//    alert('sda');
    $('#guestbooking').val(data);
}
function wishlistremoveerrormsg() {

    location.reload();
}
function reviewremoveerrormsg() {

    location.reload();
}

//function advancesearchproperty() {
//   $(".searchpropertyform").click();
//
//}
function forgotpassword() {

    $("#foremailerror").html('');

    $("#succussmsgforget").html('');
    var email = $("#forgotemail").val();

    var lo = new ajaxLoader('.displayTD');
    if (email == "") {
        $("#foremailerror").html('Please Enter Email');
        lo.remove();
    }

    $.ajax({
        type: "POST",
        url: "server/forgot-password.php?email=" + email,
        success: function(data) {

            var data = $.trim(data);
            if (data == '1') {

                $("#succussmsgforget").html("<div class='alert alert-info text-center'>Your password has been send in your email id.!!</div>");
                $("#forgotemail").val('');
                $("#foremailerror").html('');
                lo.remove();
            }
            else if (data == '2')
            {
                $("#succussmsgforget").html("Please Enter Valid Email.");
                lo.remove();
            }
        }

    });

}

function forgotpass() {
    $("#successmsg_login").html('');
    $("#loginaccount").hide();
    $("#heading").hide();
    $("#forgotpassoword").show();
    $("#headingforgot").show();


}

function loginremoveerrormsg() {
    $('#succussmsgforget').html('');
    $('#successmsg_login').html('');
    $("#loginaccount").show();
    $("#heading").show();
    $("#forgotpassoword").hide();
    $("#headingforgot").hide();

    $('#email').val('');
    $('#logpassword').val('');
    $('#forgotemail').val('');
    $("#foremailerror").html('');

    $('#successmsg_login').html('');
    $('#loginform')[0].reset();

}

function pernigntprice() {


    var property_id = $("#property_val_id").val();
//    var check_out = $(".check_out").val();
//    var check_in = $(".check_in").val();
//alert(check_in);
    var check_out_date = $("#check_out_date").val();
    var check_in_date = $("#check_in_date").val();

    var error_flag = 0;

    if (check_in_date == "" || check_out_date == "") {
        $("#noofnight").hide();
        $("#totalprice").hide();
    }
    if (check_in_date != "" && check_out_date != "") {
        $("#noofnight").show();
        $("#totalprice").show();
    }
    if (check_out_date != "") {
        if (check_in_date > check_out_date) {
            error_flag = 1;
            $('#check_out_date_error').html('Check out date must be grater  in check in date');
        } else {
            $('#check_out_date_error').html('');
        }
    }
    if (check_in_date != "") {
        $("#check_in_date_error").html('')
    }
    if (error_flag === 0) {
        $.ajax({
            type: "POST",
            url: "server/ajax-booking-price.php?check_out_date=" + check_out_date + "&check_in_date=" + check_in_date + "&property_id=" + property_id,
            success: function(data) {
 var data = $.trim(data);
                var data_arr = data.split("*");
                
                if (data_arr[0] != "") {
               if (data_arr[0] == 'night') {

                        $(".booking_price").html(data_arr[1]);
                         $("#total_amount").html(data_arr[2]);
                        $("#no_of_night").html(data_arr[3]);
                        $("#priceheading").html("Price Per Night");
                        $("#numberheading").html("Number of  Night");


                    }
                     else if (data_arr[0] == 'weeks') {
                          
                        $(".booking_price").html(data_arr[1]);
                        $("#total_amount").html(data_arr[2]);
                        $("#no_of_night").html(data_arr[3]);
                        $("#priceheading").html("Price Per Week");
                        $("#numberheading").html("Number of  Week");

                    }
                     else if (data_arr[0] == 'month') {
                         
                        $(".booking_price").html(data_arr[1]);
                        $("#total_amount").html(data_arr[2]);
                        $("#no_of_night").html(data_arr[3]);
                        $("#priceheading").html("Price Per Month");
                        $("#numberheading").html("Number of  Month");

                    }
                }
            }
        });
    }




}
function view_host_property_details(property_id) {
    $.ajax({
        type: "POST",
        url: "server/view-property-details.php?property_id=" + property_id,
        success: function(data) {

//alert(data);
            $("#host-property_info-details").html(data);

        }
    });

}
function hideshowwishlistdiv() {

    $("#hide-createwishlistcat").hide();
    $("#show-createwishlistcat").show();


}
function addwishlist(property_id, wishlist_category_id, this_val) {
    $(".chk_wishlist").attr('checked', false);
    $(this_val).prop('checked', true);

    $.ajax({
        type: "POST",
        url: "server/add-wishlist.php?property_id=" + property_id + "&wishlist_category_id=" + wishlist_category_id,
        success: function(data) {

            window.alert("This property successfully added in your wish list")

        }
    });

}

function deletewishlist(property_id, wishlist_category_id, action) {


    $.ajax({
        type: "POST",
        url: "server/delete-wishlist-category.php?property_id=" + property_id + "&wishlist_category_id=" + wishlist_category_id + "&action=" + action,
        success: function(data) {

            var data = $.trim(data);
            if (data === 'succuess') {

                $.ajax({
                    type: "POST",
                    url: "server/ajax-wishlist_category_delete_show.php?property_id=" + property_id,
                    success: function(data) {
                        if (data != "") {
                            $("#deletelistwishlistcategoerydetails").html(data);
                        }
                    }
                });
            }

        }
    });

}