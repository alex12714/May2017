<?php
ob_start();
include 'wishlist-list-property-deatils.inc.php';
?>

<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">
                Wish Lists   

            </h2>
        </div>
    </div>
</div>
<section id="content">
    <div class="clearfix"></div><br/>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php if (!empty($search_property_arr)) { ?>
                    <div>

                        <div class="clearfix"></div><br/>
                        <?php
                        $obj = new class_search();
                        foreach ($search_property_arr as $det) {

                            $obj->property_id = $det['property_id'];
                            $res_img = $obj->fetchpropertyimages();
                            $count = mysqli_num_rows($res_img);
                            ?>
                            <a href="view-property-details.php?property_id=<?php echo $det['property_id']; ?>&checkin=<?php echo $_REQUEST['check_in']; ?>&checkout=<?php echo $_REQUEST['check_out']; ?>" target="_blank" >
                                <div class="col-md-4">
                                    <div>
                                        <div id="carousel-example-generic<?php echo $det['property_id']; ?>" class="carousel slide" data-ride="carousel">
                                            <?php if ($count > 0) { ?>
                                                <div class="carousel-inner" role="listbox">
                                                    <?php
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($res_img)) {
                                                        ?>
                                                        <?php if ($i === 0) { ?>
                                                            <div class="item active">
                                                                <div class="image">
                                                                    <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="item">
                                                                <div class="image">
                                                                    <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                                                </div>
                                                            </div>
                                                        <?php } ?>



                                                        <?php
                                                        $i++;
                                                    }
                                                    ?> 
                                                </div>
                                            <?php } else { ?>

                                                <div class="item active">
                                                    <div class="image">
                                                        <img src="images/no-img-property.jpg" alt="" class="img-responsive"/>
                                                    </div>
                                                </div>

                                            <?php } ?>

                                            <a class="right carousel-control" href="#carousel-example-generic<?php echo $det['property_id']; ?>" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                            <a class="left carousel-control" href="#carousel-example-generic<?php echo $det['property_id']; ?>" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>

                                        </div>
                                        <div class="panel-footer" style="padding: 10px 0px;height: 70px;">
                                            <div class="col-sm-9">
                                                <h5 class="text-uppercase"><?php echo $det['title']; ?></h5>
                                            </div>
                                            <div class="col-sm-3 padnoneright" style="padding-top: 5px;">
                                                <a href="wishlist-list-property-deatils.php?property_id=<?php echo $det['property_id']; ?>&wishist_category_id=<?php echo $_REQUEST['wishist_category_id']; ?>&action=delete" target="_blank"><span class="fa fa-trash"></span> REMOVE</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div><br/><br/>
                                </div>
                            </a>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                <?php } else { ?>
                    <div class="clearfix"></div><br/>
                    <div class="alert alert-success text-center">
                        No data Found
                    </div>
                    <div class="clearfix"></div><br/>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br/><br/>
</section>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>