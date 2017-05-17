
<?php
include 'photsupload.inc.php';
?>

<link href="../css/font-awesome.css" rel="stylesheet"/>
<link href="../css/bootstrap.css" rel="stylesheet"/>
<link href="../css/app.css" rel="stylesheet"/>

<form role="form" action="" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div>
            <h2 class="top-zero">Browse to upload Photos</h2>
            <?php if ($msg != "") { ?>
                <div class="alert alert-success text-center">
                    <strong><?php echo $msg; ?></strong>
                </div>
            <?php } ?>
            <input type="hidden" name="gen_id" id="gen_id"  class="form-control" value="<?php echo $gen_id; ?>" />
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="uploadimg[]" id="uploadimg" multiple="multiple"/>

                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <input type="submit" name="tab1_btn"  id="submit"  class="btn btn-green isThemeBtn clickable "  value="Upload"/>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div style="overflow-y: scroll;height: 130px;">
            <?php foreach ((array) $show_property as $con) { ?>
                <div class="col-sm-2">
                    <?php if ($con['image_name'] != "") { ?>
                    <img src="../uploads/<?php echo $con['image_name']; ?>" class="thumbnail" style="width: 120px;height: 120px;"/>
                    <?php } else { ?>
                    <img src="../images/no-image.png" class="thumbnail" style="width: 120px;height: 120px;"/>
                    <?php } ?>
                    <div class="clearfix"></div><br/>      
                </div>
            <?php } ?>
        </div>

    </div>
</form>

<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>