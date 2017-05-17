<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Admin @ Airbnb</title>
        <!-- CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../fonts/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="../css/animate.min.css" rel="stylesheet"/>
        <link href="../css/custom.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><i class="fa fa-th-list"></i> <span>Admin @ Airbnb</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <div class="profile">
                            <div class="profile_pic">
                                <img src="../images/user.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>Administrator</h2>
                            </div>
                        </div>

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>&nbsp;</h3>
                                <ul class="nav side-menu">
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-eye"></i> Host <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="hostlisting.php">Listing</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-edit"></i> Guest <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="guestlisting.php">Listing</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-list"></i> Rented Properties <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="rented-property-list.php">Listing</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-edit"></i> Property Settings <span class="fa fa-chevron-down"></span></a>

                                        <ul class="nav child_menu" style="display: none">
                                            &nbsp; &nbsp; &nbsp; &nbsp; <a href="#">Category <span class="fa fa-chevron-down"></span></a>
                                            <li><a href="add-category.php">Add Category</a></li>
                                            <li><a href="categorylisting.php">Category Listing</a></li>
                                        </ul>
                                        <ul class="nav child_menu" style="display: none">
                                            &nbsp; &nbsp; &nbsp; &nbsp; <a href="#">Amenities <span class="fa fa-chevron-down"></span></a>
                                            <li><a href="amenities.php">Add Amenities</a></li>
                                            <li><a href="amenitieslisting.php">Amenities Listing</a></li>
                                        </ul>
                                        <ul class="nav child_menu" style="display: none">
                                            &nbsp; &nbsp; &nbsp; &nbsp; <a href="#">Property Type <span class="fa fa-chevron-down"></span></a>
                                            <li><a href="add-property-type.php">Add Property Type</a></li>
                                            <li><a href="propertytypelisting.php">Property Type Listing</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"><i class="fa fa-edit"></i> Testimonial <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="manage-testimonials.php">Add Testimonial</a></li>
                                            <li><a href="testimonials-list.php">Testimonial List</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="../images/user.png" alt="">Admin
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col">
                    <?php echo $mainpagecontent; ?>
                    <footer>
                        <div style="padding-top: 10px;">
                            <p class="pull-right">Copyright &copy; 2016 Admin @ Airbnb.</p>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>

        </div>
    </body>
</html>
<div class="modal fade" id="login" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signinLabel">View Host Details</h4>
            </div>
            <div class="modal-body" id="host-details">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="guestdet" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
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


<div class="modal fade" id="rentedproperty" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closerented" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signinLabel">View Rented Dates Details</h4>
            </div>
            <div class="modal-body" id="rentedproperty-details">

            </div>
        </div>
    </div>
</div>



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
<div class="modal fade" id="allowed_prpperty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"  class="close" data-dismiss="modal" onclick="removemsg();" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Update Add Property  Limit </strong></h4>
            </div> 
            <form role="form" id="totalnumberofpropertyform" action="" method="post">

                <div class="modal-body ">

                    <span id="limitmessage"></span>
                    <div class="form-group">
                        <input type="text" name="total_number_of_property" id="total_number_of_property" placeholder="Enter Limit" class="form-control"/>
                        <input type="hidden" name="host_id_for_limit" id="host_id_for_limit"  class="form-control"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-green isThemeBtn">Update</button>
                </div>


            </form>
            <!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
 
    <!-- Javascripts -->
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <!--<script type="text/javascript" src="../js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="../jquerycalender/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycalender/jquery-ui.css"/>
<script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
    <script src="../js/jquery-validate.bootstrap-tooltip.min.js"></script>

    <script type="text/javascript" src="../script/admin.js"></script>
   
    
    <script type="text/javascript">
        $(function() {

//            $(".checkindatepicker").datepicker({
//                minDate: 0, maxDate: "+12M",
//                dateFormat: 'yy-mm-dd',
//                changeMonth: true,
//                changeYear: true,
//                yearRange: '-100:+0'
//
//            });
//        });
//        $(function() {
//
//            $(".checkoutdatepicker").datepicker({
//                minDate: "1D", maxDate: "+12M",
//                dateFormat: 'yy-mm-dd',
//                changeMonth: true,
//                changeYear: true,
//                yearRange: '-100:+0'
//
//            });
            $(".datepicker").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0'

            });
        });
         
</script>
