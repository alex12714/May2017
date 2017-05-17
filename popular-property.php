<?php
//ob_start();
include 'popular-property.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Demo</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="description" content=""/>
        <!-- Styles -->
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/lightslider.css"/>
        <style type="text/css">
            ul{
                list-style: none outside none;
                padding-left: 0;
                margin: 0;
            }
            .content-slider li{
                background-color: #068b85;
                text-align: center;
                color: #FFF;
            }
            .content-slider h3 {
                margin: 0;
            }
            .lSPager.lSpg{
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="item">
            <ul id="content-slider" class="content-slider">
                <?php
                $ob1 = new class_search();
                foreach ($popularadded_property_arr as $det) {
                    $ob1->property_id = $det['property_id'];
                    $res_img = $ob1->fetchpropertyimages();
                    $count = mysqli_num_rows($res_img);
                    $images = mysqli_fetch_assoc($res_img)
                    ?> 
                    <li>
                        <a href="view-property-details.php?property_id=<?php echo $det['property_id']; ?>" target="_blank">
                            <h3>
                                <?php if ($images['image_name'] != "") { ?>
                                    <img src="uploads/<?php echo $images['image_name']; ?>" alt="" class="img-responsive"/>
                                <?php } else { ?>
                                    <img src="images/no-img-property.jpg" alt="" class="img-responsive"/>
                                <?php } ?>
                            </h3>
                            <h5 style="color: #fff;">
                                <?php echo substr($det['title'], 0, 23) ; ?>
                            </h5>
                        </a>
                    </li>
                <?php } ?>
                
                </li>
            </ul>
        </div>
    </body>
</html>

<!-- Javascript -->
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/lightslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop: true,
            keyPress: true
        });
    });
</script>