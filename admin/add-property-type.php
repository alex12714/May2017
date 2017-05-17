<?php
ob_start();
include 'add-property-type.inc.php';
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Add Property Type</h3>
        <form class="form-horizontal" action="" method="POST">
            <div class="box box-primary">
                <div class="box-body">
                    <?php if ($msg != "") { ?>
                        <div class="col-md-12">
                            <div class="alert alert-success text-center"> 
                                <div class="text-success"><strong><?php echo $msg; ?></strong></div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div><br/>
                    <div class="form-group">
                        <label class="col-sm-5 col-xs-12 control-label">Property Type</label>
                        <div class="col-sm-5 col-xs-12">
                            <input type="text" class="form-control" name="property_type" placeholder="Enter Property Type" value="<?php echo $property_type; ?>"/>
                            <span class="text-danger"><?php echo $error_msg['property_type']; ?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-footer">
                    <label class="col-sm-5 col-xs-12 control-label"></label>
                    <div class="col-sm-5 col-xs-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="clearfix"></div><br/><br/>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/admin-master.php';
?>