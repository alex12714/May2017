<?php
ob_start();

include 'booking-confirmation.inc.php';
?>

<div class="clearfix"></div><br/>
<div class="container">
    <div class="row">
        <div class="clearfix"></div><br/>
        <div class="col-md-12">
            <div class="thumbnail" >
                <div class="clearfix"></div><br/>
                <div class="col-md-12">
                    <div class="alert alert-info text-center">
                        <div class="clearfix"></div><br/>
                        <span class="glyphicon glyphicon-ok-circle" style="color: #8CBE45;font-size: 50px;"></span>
                        <h4 style="margin-top: 15px;"><strong>Thanks for using Airbnb.</strong></h4>
                         <div class="clearfix"></div>
                        <h4 style="margin-top: 15px;"><strong>Dear Guest, your booking request sent successfully.</strong></h4>
                        <div class="clearfix"></div><br/>
                        <h4><strong><a href="index.php">Click here</a> to make another booking.</strong></h4>
                        <div class="clearfix"></div><br/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
<div class="clearfix"></div><br/><br/><br/>

<?php
$mainpagecontent = ob_get_contents();
ob_clean();

include 'master/root-master.php';
?>