<?php
ob_start();
include 'manage-testimonials.inc.php';
?>

<div class="row">
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3>Add Testimonials</h3>

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
                        <label class="col-sm-5 col-xs-12 control-label">Title</label>
                        <div class="col-sm-5 col-xs-12">
                            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title; ?>"/>
                            <span class="text-danger"><?php echo $error_msg['title']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 col-xs-12 control-label">Description</label>
                        <div class="col-sm-5 col-xs-12">
                            <textarea name="description" class="form-control" placeholder="Description"><?php echo $description; ?></textarea>
                            <span class="text-danger"><?php echo $error_msg['description']; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 col-xs-12 control-label">Image</label>
                        <div class="col-sm-5 col-xs-12">



                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" name="logo_image" style="display: inline;"/>
                                    <div class="text-danger" style="margin-top: 5px;">Please upload 70 X 80 px image.</div>
                                </div>
                            </div>
                            <div class="clearfix"></div><br/>
                            <?php if ($image != "") { ?>
                                <img src="../uploads/<?php echo $image; ?>" width="200" class="thumbnail" height="200" style="margin-top: 5px;"/><br/>
                            <?php } else { ?>
                               <!--<img src="../images/user_pic.png" width="200" height="200" style="margin-top: 5px;"/><br/>-->
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="box-footer">
                    <label class="col-sm-5 col-xs-12 control-label"></label>
                    <div class="col-sm-5 col-xs-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
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