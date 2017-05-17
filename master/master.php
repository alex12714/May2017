<?php
include_once 'session/session.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title>Vacation Rentals, Homes, Apartments & Rooms for Rent - Airbnb</title>

        <link href="css/font-awesome.css" rel="stylesheet"/>
        <link href="css/fullscreen-slider.css" rel="stylesheet"/>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/app.css" rel="stylesheet"/>
        <link href="css/datepicker.css" rel="stylesheet"/>

    </head>
    <body class="notransition no-hidden">
        <div id="hero-container">
            <ul class="cb-slideshow">
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
            </ul>
            <div class="home-header">
                <div class="home-logo osLight"><span class="fa fa-home"></span> Airbnb</div>
                <a href="#" class="home-navHandler visible-xs"><span class="fa fa-bars"></span></a>
                <?php if ($_SESSION['guest_id'] != "") { ?>
                    <div class="home-nav">
                        <ul>
                            <a href="profile.php" style="color: #fff; margin-right: 20px;">My Account</a>
                           <a href="logout.php" class="btn btn-green isThemeBtn" style="color: #fff;">Logout</a>                            
                        </ul>
                    </div>
                <?php } else { ?>
                    <div class="home-nav">
                        <ul>
                            <li><a href="#">Help</a></li>
                            <!--<li><a href="javascript:void(0)" data-toggle="modal" data-target="#signup">Sign Up</a></li>-->
                            <li><a href="javascript:void(0)" onclick="regremoveerrormsg();"  data-toggle="modal" data-target="#signin">Sign In</a></li>
                            <li><a href="javascript:void(0)" onclick="regremoveerrormsg();"  data-toggle="modal" data-target="#guestsignup">Sign Up</a></li>
                            <li><a href="javascript:void(0)" onclick="regremoveerrormsg();" data-toggle="modal" data-target="#signup" class="btn btn-green isThemeBtn">Become a Host</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="home-caption">
                <div class="home-title">Now it's easy to find your future home</div>
                <div class="home-subtitle">Book homes from local hosts in 191+ countries and experience a place like you live there.</div>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="btn btn-lg btn-green">Become a Host</a>
            </div>
            <?php echo $mainpagecontent; ?>
            <div class="home-footer">
                <div class="home-wrapper">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="osLight footer-header">Company</div>
                            <ul class="footer-nav pb20">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Policies</a></li>
                                <li><a href="#">Terms & Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="osLight footer-header">Discover</div>
                            <ul class="footer-nav pb20">
                                <li><a href="#">Trust & Safety</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Business Travel</a></li>
                                <li><a href="#">Travel Credit</a></li>
                                <li><a href="#">Airbnb Picks</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="osLight footer-header">Get in Touch</div>
                            <ul class="footer-nav pb20">
                                <li class="footer-phone"><span class="fa fa-phone"></span> 123 456 7890</li>
                                <li class="footer-address osLight">
                                    <p>C - 166, Groud Floor, Sector B,</p>
                                    <p>Aliganj, Lucknow - 226024</p>
                                    <p>India</p>
                                </li>
                                <li><a href="#" class="btn btn-sm btn-icon btn-round btn-o btn-white"><span class="fa fa-facebook"></span></a> <a href="#" class="btn btn-sm btn-icon btn-round btn-o btn-white"><span class="fa fa-twitter"></span></a> <a href="#" class="btn btn-sm btn-icon btn-round btn-o btn-white"><span class="fa fa-google-plus"></span></a> <a href="#" class="btn btn-sm btn-icon btn-round btn-o btn-white"><span class="fa fa-linkedin"></span></a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 subscribeloader">
                            <div class="osLight footer-header">Subscribe to Our Newsletter</div>
                            <form role="form" id="subscribeform" action="" method="post">
                                <span id="subscribemsg"></span>
                                <div class="form-group">
                                    <input type="email" name="subscribeemail" id="subscribeemail" class="form-control" placeholder="Email Address"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-green btn-block isThemeBtn">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="copyright">&copy; 2016 Airbnb</div>
                </div>
            </div>

            <div class="modal fade" id="signin" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" onclick="loginremoveerrormsg();" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="heading"><strong>Sign In</strong></h4>
                            <h4 class="modal-title" id="headingforgot" style="display:none;"><strong>Forgot Password</strong></h4>
                        </div>
                        <form role="form" id="loginform" action="" method="post">
                            <div id="loginaccount">
                                <div class="modal-body">
                                    <div class="col-xs-12">
                                        <span class="text-danger" id="successmsg_login"></span>                                    
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-group-justified">
                                            <a href="#" class="btn btn-lg btn-facebook"><span class="fa fa-facebook pull-left"></span>Sign In with Facebook</a>
                                        </div>
                                    </div>
<!--                                    <div class="form-group">
                                        <div class="btn-group-justified">
                                            <a href="#" class="btn btn-lg btn-google"><span class="fa fa-google-plus pull-left"></span>Sign In with Google</a>
                                        </div>
                                    </div>-->
                                    <div class="signOr">OR</div>
                                    <span id="error_login" class="text-danger"></span>
                                    <div class="form-group">
                                        <input type="text"  placeholder="Email Address" name="email" id="email" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Password" name="logpassword" id="logpassword" class="form-control"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <a href="javascript:void(0)" style="color:#155351;" onclick="forgotpass();"><small>Forgot Password?</small></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-lg btn-green isThemeBtn">Sign In</button>
                                </div>
                            </div>
                                <div class="clearfix"></div>
                                <div id="forgotpassoword" class="" style="display:none;">
                                    <div class="modal-body displayTD">
                                        <span class="text-danger" id="succussmsgforget"></span>
                                        <div class="form-group">
                                            <div class="">
                                                <label>Email</label>
                                            </div>
                                            <div class="">
                                                <input type="text"  id='forgotemail'name="forgotemail" class="form-control" placeholder="Email"/>
                                                <span class="text-danger" id='foremailerror'><?php echo $error_msg['email']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="modal-footer">
                                        <button type="button" onclick='forgotpassword();' class="btn btn-lg btn-green isThemeBtn">Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signup" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="signupLabel">Become a Host</h4>
                    </div>
                    <div class="modal-body displayT">
                        <form role="form" id="frmregpopup" action="" method="post">
                            <span id="success_message"></span>
                            <span id="hidehostregitationpopup">
                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <a href="explore.html" class="btn btn-lg btn-facebook"><span class="fa fa-facebook pull-left"></span>Sign Up with Facebook</a>
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <a href="explore.html" class="btn btn-lg btn-google"><span class="fa fa-google-plus pull-left"></span>Sign Up with Google</a>
                                    </div>
                                </div>-->
                                <div class="signOr">OR</div>
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" id="" placeholder="Last Name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" id="email" placeholder="Email Address" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <button type="submit" class="btn btn-lg btn-green isThemeBtn">Sign Up</button>
                                    </div>
                                </div>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="guestsignup" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="signupLabel">Guest Sign Up</h4>
                    </div>
                    <div class="modal-body gutestT">
                        <form role="form" id="guestfrmregpopup" action="" method="post">
                            <span id="guestsuccess_message"></span>
                            <span id="guesthideregitationpopup">
                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <a href="explore.html" class="btn btn-lg btn-facebook"><span class="fa fa-facebook pull-left"></span>Sign Up with Facebook</a>
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <a href="explore.html" class="btn btn-lg btn-google"><span class="fa fa-google-plus pull-left"></span>Sign Up with Google</a>
                                    </div>
                                </div>-->
                                <div class="signOr">OR</div>

                                <div class="form-group">
                                    <input type="text" name="guestfirst_name" id="guestfirst_namefirst_name" placeholder="First Name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="guestlast_name" id="guestlast_name" placeholder="Last Name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="guestemail" id="guestemail" placeholder="Email Address" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="guestpassword" id="guestpassword" placeholder="Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="guestconfirmpassword" id="guestconfirmpassword" placeholder="Confirm Password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <div class="btn-group-justified">
                                        <button type="submit" class="btn btn-lg btn-green isThemeBtn">Sign Up</button>
                                    </div>
                                </div>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

<!-- Javascript -->
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="jquerycalender/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="jquerycalender/jquery-ui.css"/>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/jquery-validate.bootstrap-tooltip.min.js"></script>
<!--<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>-->
<script type="text/javascript" src="script/root.js"></script>
<script type="text/javascript">
                                            $(function() {

                                                $(".checkindatepicker").datepicker({
                                                    minDate: 0, maxDate: "+12M",
                                                    dateFormat: 'yy-mm-dd',
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    yearRange: '-100:+0'

                                                });
                                            });
                                            $(function() {

                                                $(".checkoutdatepicker").datepicker({
                                                    minDate: "1D", maxDate: "+12M",
                                                    dateFormat: 'yy-mm-dd',
                                                    changeMonth: true,
                                                    changeYear: true,
                                                    yearRange: '-100:+0'

                                                });
                                            });
</script>

<script type="text/javascript">
    $('.home-navHandler').click(function() {
        $('.home-nav').toggleClass('active');
        $(this).toggleClass('active');
    });
</script>
<script type='text/javascript' src="js/loader.js"></script>
<style type="text/css">
    .ajax_loader {
        background: url("images/ajax-loader.gif") no-repeat center center transparent;
        /*                    width: 120%;*/
        height:100%;
    }
    .left {
        height:auto;
        width:auto;
        /*                    background:blue;*/
        float:left;
        margin-left: 10px;
        overflow: auto
    }

    .right {
        width: auto;
        height:auto;
        /*                    background:red;*/
        float:right; 
        margin-left: 1180px;
        overflow: auto
    }
</style>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    })
</script>