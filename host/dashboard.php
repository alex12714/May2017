<?php
ob_start();
include 'dashboard.inc.php';
?>


        <div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Listings in progress</h2>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    <section id="content">
        <div class="container"> 
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4">
                        <a href="#">
                            <div style="background-color: #bbb;">
                                <img src="../images/camera.png" alt="" class="img-responsive"/>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="progress" style="margin-bottom: 5px;">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                        <p>You’re 57% done with your listing.</p>
                        <div class="clearfix"></div><br/>
                        <div>
                            <h4>
                                <a href="#">Entire home/apt in Lucknow</a>
                            </h4>
                            <div class="clearfix"></div><br/>
                            <p>Last updated on 24 August 2016</p>
                            <div class="clearfix"></div><br/>
                            <div class="form-group">
                                <a href="#" class="btn btn-green"><span class="glyphicon glyphicon-ok"></span> Finish The Listing</a> &nbsp; &nbsp; &nbsp;
                                <a href="#" class="btn btn-red"><span class="glyphicon glyphicon-search"></span> Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br/>
    </section>
    <div class="clearfix"></div>
    <!-- Footer -->

    

<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/host-master.php';
?>