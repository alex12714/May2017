<?php
ob_start();
include 'dashboard.inc.php';
?>

<div class="clearfix"></div><br/>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <a href="propertylist.php?host_id=allproperty"> <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats" style="background-color: #1FBBA6;background-image: linear-gradient(to bottom, #23D1B9 0px, #1FBBA6 100%);">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php echo $count_no_of_property; ?></div>
                <h3>No. of Property</h3>
            </div>                                
            </div></a>
        <!--            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats" style="background-color: #5F8295;background-image: linear-gradient(to bottom, #6C8FA1 0px, #5F8295 100%);">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">200</div>
                            <h3>No. of Places</h3>
                        </div>
                    </div>-->
        <a href="hostlisting.php"><div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats" style="background-color: #00BDCC;background-image: linear-gradient(to bottom, #00D5E6 0px, #00BDCC 100%);">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count"><?php echo $count_no_of_host; ?></div>
                <h3>No. of Host</h3>
            </div>
            </div></a>
          <a href="guestlisting.php"><div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats" style="background-color: #00BDCC;background-image: linear-gradient(to bottom, #00D5E6 0px, #00BDCC 100%);">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count"><?php echo $count_no_of_guest; ?></div>
                <h3>No. of Guest</h3>
            </div>
              </div></a>
        <div class="clearfix"></div><br/>
    </div>
</div>

<div class="clearfix"></div><br/><br/>

<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/admin-master.php';
?>