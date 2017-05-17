<?php
include "host-master.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title>Vacation Rentals, Homes, Apartments & Rooms for Rent - Airbnb</title>

        <link href="../css/font-awesome.css" rel="stylesheet"/>
        <link href="../css/fullscreen-slider.css" rel="stylesheet"/>
        <link href="../css/bootstrap.css" rel="stylesheet"/>
        <link href="../css/app.css" rel="stylesheet"/>
        <link href="../css/datepicker.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>

    </head>
    <body  class="notransition no-hidden">

        <div id="header-top" class="hidden-sm hidden-xs">
            <div class="container">
                <!--                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 5px;padding-bottom: 5px;color: #fff;"><span class="fa fa-home"></span> Host <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Manage Listing</a></li>
                                            <li><a href="#">List Your Space</a></li>
                                            <li><a href="#">Your Transaction</a></li>
                                            <li><a href="#">Transaction Histroy</a></li>
                                            <li><a href="#">Reviews</a></li>
                                        </ul>
                                    </li>
                                </ul>-->
                <!--                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 5px;padding-bottom: 5px;color: #fff;"><span class="fa fa-envelope"></span> Messages <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">View Inbox (0)</a></li>
                                        </ul>
                                    </li>
                                </ul>-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 5px;padding-bottom: 5px;color: #fff;">Welcome, <?php echo $firstname; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--                            <li><a href="#">Your Trips</a></li>
                                                        <li><a href="#">Wish Lists</a></li>
                                                        <li><a href="#">Edit Profile</a></li>
                                                        <li><a href="#">Account Settings</a></li>
                                                        <li><a href="#">My Guidebook</a></li>-->
                            <li><a href="logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
        <div class="container padnone1">
            <div class="row">
                <div class="col-md-12 hidden-sm hidden-xs">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php"><span class="fa fa-home text-success"></span> <span class="text-warning">Airbnb</span></a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">

                                    <li><a href="propertylist.php">Your Listings</a></li>
                                    <li><a href="booking-list.php">Bookings</a></li>
                                    <li><a href="contact-host-list.php">Inbox</a></li>
                                    <li><a href="profile.php">Profile</a></li>
</ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-12 visible-sm visible-xs padnone1">
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php" style="padding: 10px 15px;"><span class="fa fa-home"></span> Airbnb</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Inbox</a></li>
                                    <li><a href="add-property.php">Your Listing</a></li>
                                    <li><a href="#">Your Trips</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">Invite Friends</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Host <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="#">Manage Listing</a></li>
                                            <li><a href="#">List Your Space</a></li>
                                            <li><a href="#">Your Transaction</a></li>
                                            <li><a href="#">Transaction Histroy</a></li>
                                            <li><a href="#">Reviews</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Messages <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">View Inbox (0)</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, Asheet <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Your Trips</a></li>
                                            <li><a href="#">Wish Lists</a></li>
                                            <li><a href="#">Edit Profile</a></li>
                                            <li><a href="#">Account Settings</a></li>
                                            <li><a href="#">My Guidebook</a></li>
                                            <li><a href="logout.php">Sign Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
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
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="osLight footer-header">Subscribe to Our Newsletter</div>
                        <form role="form">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Address"/>
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

    </body>
</html>
<div class="modal fade" id="vendordet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>View Property  Details</strong></h4>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div id="property_info-details">

                    </div>
                    <div class="clearfix"></div><br/>  
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="login" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signinLabel">View Guest Details</h4>
            </div>
            <div class="modal-body" id="guest-details">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewcontacthostmsg" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signinLabel">View Message</h4>
            </div>
            <div class="modal-body" id="contacthostmsg-details">

            </div>
        </div>
    </div>
</div>
<!-- Javascript -->
<!--<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>

<script type="text/javascript" src="../js/bootstrap.js"></script>

<script type="text/javascript" src="../script/host.js"></script>-->


<!--<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>


<script type="text/javascript">
    $('.datepicker').datepicker()
</script>-->

<!--<script type="text/javascript">
    $('.home-navHandler').click(function() {
        $('.home-nav').toggleClass('active');
        $(this).toggleClass('active');
    });
</script>-->

<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.exp&sensor=false&amp;libraries=geometry"></script>-->
<!--<script type="text/javascript" src="../js/map.js"></script>-->
<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
<!--<script type="text/javascript" src="../js/bic_calendar.js"></script>-->
<script type="text/javascript" src="../jquerycalender/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycalender/jquery-ui.css"/>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/jquery-validate.bootstrap-tooltip.min.js"></script>

<!--<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>-->
<!--<script type="text/javascript" src="../script/root.js"></script>-->
<script type="text/javascript" src="../script/host.js"></script>
<style>
    #datepicker .ui-datepicker tbody td.highlight{ 
        background-color: blue;
        border-color: blue;
        padding: 5px;}
    </style>
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
            $(".datepicker").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0'

            });
        });
         
</script>
