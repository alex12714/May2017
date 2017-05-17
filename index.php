<?php
ob_start();
include 'index.inc.php';


?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCDdbu_6FSrdpImN5-7MRQ4RfYvn7fVi9s'></script>
<script src="js/locationpicker.jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500|Roboto+Condensed' rel='stylesheet' type='text/css'>

<div class="search-panel">
    <form action="search.php" class="form-inline" method="post" role="form">
        <div class="form-group">

            <input type="text" class="form-control" id="us3-address" name="search_text"   value="<?php echo $_REQUEST['search_text']; ?>" placeholder="Where to?"/>
            <input type="hidden" class="form-control" id="us3-address_match" name="map_location_match" value="<?php echo $_REQUEST['search_text']; ?>"/>                                     
            <div id="us3" style="height: 400px; display: none;"></div>              
            <script>
                var jcal = jQuery.noConflict();
                jcal(document).ready(function() {
                    jcal('#us3').locationpicker({
                        location: {latitude: '<?php echo $_REQUEST['latitude']; ?>', longitude: '<?php echo $_REQUEST['longitude']; ?>'},
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
            <input type="hidden" class="form-control" id="us3-lat" name="latitude" value="<?php echo $_REQUEST['latitude']; ?>"/>
            <input type="hidden" class="form-control" id="us3-lon" name="longitude" value="<?php echo $_REQUEST['longitude']; ?>"/>

        </div>
        <div class="form-group">
            <input type="text" class="form-control checkindatepicker" name="check_in"   placeholder="Check In"/>
        </div>
        <div class="form-group">
            <input type="text" class="form-control checkoutdatepicker" name="check_out" placeholder="Check Out"/>
        </div>
        <!--                    <div class="form-group adv">
                                <select class="form-control">
                                    <option value="">Guest</option>
                                    <option value="">01</option>
                                    <option value="">02</option>
                                    <option value="">03</option>
                                    <option value="">04</option>
                                </select>
                            </div>-->
        <div class="form-group">
            <button type="submit" class="btn btn-green isThemeBtn"><i class="fa fa-search"></i> Search</button>
        </div>
    </form>
</div>
</div>
<div class="highlight">
    <div class="h-title osLight">Find a place to stay with Adventist BNB</div>
    <div class="h-text osLight">Our goal is to connect Adventists all around the world</div>
</div>

<!-- Content -->

<div class="home-wrapper">
    <div class="home-content">
        <h2 class="osLight"><strong>Come, stay with us</strong></h2>
        <div class="row pb40">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <i class="fa fa-hotel s-icon"></i>
                <div class="s-content">
                    <h2 class="s-main osLight" style="padding-bottom: 0px">Better than Hotels</h2>
                    <h3 class="s-sub osLight top-zero">Local people would like to welcome you in their homes </h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <i class="fa fa-check-square-o s-icon"></i>
                <div class="s-content">
                    <h2 class="s-main osLight" style="padding-bottom: 0px">Accomodation and Experiences</h2>
                    <h3 class="s-sub osLight top-zero">Participate and get to know your adventist community better</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <i class="fa fa-star s-icon"></i>
                <div class="s-content">
                    <h2 class="s-main osLight" style="padding-bottom: 0px">Reviewed by Real Travellers</h2>
                    <h3 class="s-sub osLight top-zero">Donec facilisis fermentum sem, ac viverra ante luctus vel</h3>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 s-menu-item">
                <i class="fa fa-comments s-icon"></i>
                <div class="s-content">
                    <h2 class="s-main osLight" style="padding-bottom: 0px">We Speak your Language</h2>
                    <h3 class="s-sub osLight top-zero">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                </div>
            </div>
        </div>
        
        <h2 class="osLight" style="padding-bottom: 15px;"><strong>Explore the world</strong></h2>
        <p class="osLight text-center">See where people are traveling, all around the world.</p>
        <div class="clearfix"></div><br/>
        <div class="row pb40">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img4.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>New York</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star-o star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img1.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>Rome</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img2.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>Amsterdam</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img2.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>Amsterdam</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img1.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>Rome</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="propWidget-2">
                    <div class="fig">
                        <img src="images/sample-img3.jpg" alt=""/>
                        <div class="opac"></div>
                        <h3 class="osLight"><strong>London</strong></h3>
                        <ul class="rating">
                            <li><span class="fa fa-star star-1"></span></li>
                            <li><span class="fa fa-star star-2"></span></li>
                            <li><span class="fa fa-star star-3"></span></li>
                            <li><span class="fa fa-star star-4"></span></li>
                            <li><span class="fa fa-star-o star-5"></span></li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2 class="osLight"><strong>Recent Property</strong></h2>
                <iframe src="recentproperty.php"width="100%" frameBorder="0" scrolling="no" height="250px" class="embed-responsive-item"></iframe> 
            </div>
            <div class="col-md-6">
                <h2 class="osLight"><strong>Popular Property</strong></h2>
                <iframe src="popular-property.php"width="100%" frameBorder="0" scrolling="no" height="250px" class="embed-responsive-item"></iframe> 
            </div>
        </div>
        
        <h2 class="osLight"><strong>Testimonials</strong></h2>
        <div id="home-testimonials" class="carousel slide carousel-wb mb20" data-ride="carousel">
            <ol class="carousel-indicators">
                 <?php $j = 0; foreach((array)$testimonials_list_details as $det) { ?>
                 <?php if ($j == 0) { ?>
                <li data-target="#home-testimonials" data-slide-to="<?php echo $j;?>" class="active"></li>
                 <?php }  else { ?>
                <li data-target="#home-testimonials" data-slide-to="<?php echo $j;?>" class=""></li>
                 <?php }$j++; } ?>
            </ol>
            <div class="carousel-inner">
                <?php $i = 0; foreach((array)$testimonials_list_details as $det) { ?>
                <?php if ($i === 0) { ?>
                <div class="item active">
                    <?php if($det['logo_image']!="") { ?>
                    <img src="uploads/<?php echo $det['logo_image']; ?>" class="home-testim-avatar" alt="Jane Smith">
                    <?php }else{?>
                    <img src="images/user.png" class="home-testim-avatar" alt="Jane Smith">
                    <?php } ?>
                    <div class="home-testim">
                        <div class="home-testim-text"><?php echo $det['description']; ?></div>
                        <div class="home-testim-name"><?php echo $det['title']; ?></div>
                    </div>
                </div>
                <?php }  else { ?>
                <div class="item">
                     <?php if($det['logo_image']!="") { ?>
                    <img src="uploads/<?php echo $det['logo_image']; ?>" class="home-testim-avatar" alt="Jane Smith">
                    <?php }else{?>
                    <img src="images/user.png" class="home-testim-avatar" alt="Jane Smith">
                    <?php } ?>
                    <div class="home-testim">
                        <div class="home-testim-text"><?php echo common::StrFromDB($det['description']); ?></div>
                        <div class="home-testim-name"><?php echo $det['title']; ?></div>
                    </div>
                </div>
                <?php } $i++; } ?>

            </div>
        </div>
    </div>
</div>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/master.php';
?>