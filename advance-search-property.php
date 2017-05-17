<?php


include_once 'classes/class_search.php';
include_once 'classes/common.php';



$obj = new class_search();




if ($_POST) {
    
    $obj->search_text = $_REQUEST['search_text'];
    $obj->latitude = $_REQUEST['latitude'];
    $obj->longitude = $_REQUEST['longitude'];
  
    
    $obj->check_in = $_REQUEST['check_in'];
    $obj->check_out = $_REQUEST['check_out'];
    
    $obj->room_type = $_REQUEST['room_type'];
    $obj->minprice = $_REQUEST['minprice'];
    $obj->maxprice = $_REQUEST['maxprice'];
    
    
    
    
    
    
   
}
  $res_res = $obj->advanceserachproperty();
    while ($row_res = mysqli_fetch_array($res_res)) {
        $search_property_arr[] = $row_res;
    }
//print_r($search_property_arr);
?>

<?php if(!empty($search_property_arr)) { ?>
     <div class="row">
        <div class="col-md-6">
            <p style="margin-top: 5px;"><span class="fa fa-rupee"></span> Additional fees apply. Taxes may be added.</p>
        </div>
<!--        <div class="col-md-6">
            <h5 class="top-zero">
                <strong class="pull-right">300+ Rentals &bull; Singapore</strong>
            </h5>
        </div>-->
        <div class="clearfix"></div><br/>
        <?php
        $obj = new class_search();
        foreach ($search_property_arr as $det) {

            $obj->property_id = $det['property_id'];
            $res_img = $obj->fetchpropertyimages();
             $count=  mysqli_num_rows($res_img);
            ?>
        <a href="view-property-details.php?property_id=<?php echo $det['property_id']; ?>&checkin=<?php echo $_REQUEST['check_in'];?>&checkout=<?php echo $_REQUEST['check_out'];?>" target="_blank">
            <div class="col-md-4">
                <div>
                    <div id="carousel-example-generic<?php echo $det['property_id']; ?>" class="carousel slide" data-ride="carousel">
                        <?php if($count > 0) {?>
                        <div class="carousel-inner" role="listbox">
 <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($res_img)) {
                            ?>

                            
                                <?php if ($i === 0) { ?>
                                    <div class="item active">
                                        <div class="image">
                                            <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                            <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?> <span class="fa fa-bolt text-warning"></span></h4>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="item">
                                        <div class="image">
                                            <img src="uploads/<?php echo $row['image_name']; ?>" alt="" class="img-responsive"/>
                                            <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?> <span class="fa fa-bolt text-warning"></span></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                           


                            <!--                          -->
                            <!-- Controls -->

                            <?php
                            $i++;
                        }
                        ?> 
                             </div>
                              <?php } else  {?>
                  
                                               <div class="item active">
                                        <div class="image">
                                            <img src="images/no-img-property.jpg" alt="" class="img-responsive"/>
                                            <h4 class="name btm-zero"><span class="fa fa-rupee"></span> <?php echo $det['property_price']; ?> <span class="fa fa-bolt text-warning"></span></h4>
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
                    <a href="#">
                        <h5 class="text-uppercase"><?php echo $det['title']; ?></h5>
                        <?php echo $det['room_type'] ?> &bull;
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        &bull; 87 reviews
                    </a>
                </div>
                <div class="clearfix"></div><br/>

            </div>
            </a>
        <?php } ?>
        <div class="clearfix"></div><br/>
    </div>
<?php } else {?>

                        <div class="alert alert-success text-center">
                            No data Found
                        </div>
<?php } ?>

