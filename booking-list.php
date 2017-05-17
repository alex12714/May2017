<?php
ob_start();
include 'booking-list.inc.php';
?>

<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>
<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">
                Booking Listings                
            </h2>
        </div>
        <ul class="breadcrumbs pull-right" style="padding-top: 13px;list-style: none;">
            <!--<li><a href="add-property.php" class="btn btn-warning pull-right"><strong>+ Add Property</strong></a></li>-->
        </ul>
    </div>
</div>
<section id="content">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" id="searchbookingslist" action="" method="post" class="">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>From</strong></label>
                            <input type="text" name="check_in" id="check_in" class="form-control datepicker" placeholder="From" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>To</strong></label>
                            <input type="text" name="check_out" id="check_out" class="form-control datepicker" placeholder="To" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>&nbsp;</strong></label><br/>
                            <input type="submit" name="submit" class="btn btn-success btn-block"  value="Search">
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
</section>







<div class="clearfix"></div>
<section id="content">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="clearfix"></div><br/>
                <div class="table-responsive" id="displayajaxbookingdata">
                    <?php if (!empty($booking_list_details)) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking id</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                  
                                    <th>Check in</th>
                                    <th>Check Out</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ((array) $booking_list_details as $det) {

//                                   

                                    if ($det['check_in'] != '0000-00-00 00:00:00' && $det['check_in'] != '1970-01-01' && $det['check_in'] != '') {
                                        $check_in = date('d-m-Y', strtotime($det['check_in']));
                                    }
                                    if ($det['check_out'] != '0000-00-00 00:00:00' && $det['check_out'] != '1970-01-01' && $det['check_out'] != '') {
                                        $check_out = date('d-m-Y', strtotime($det['check_out']));
                                    }
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $det['booking_refrence_id']; ?></td>

                                        <td><a  href='' data-toggle="modal" data-target="#vendordet" onclick="view_host_property_details('<?php echo $det['property_id']; ?>')" class="" style="margin-bottom: 5px; color: red;"><u><?php echo $det['title']; ?></u></a></td>
                                        <td><?php echo $det['total_amount']; ?></td>
                                        
                                        <td><?php echo $check_in; ?></td>
                                        <td><?php echo $check_out; ?></td>
                                        <!--<td>  </td>-->
                                        <!--<td><a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-times fa fa-white"></i></a></td>-->
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>

                        </table>
                    <?php } else { ?>
                        <div class="alert alert-info text-center">
                            No Data Found
                        </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
 </div>
        </div>
    </div>
    <div class="clearfix"></div><br/>
</section>
<div class="clearfix"></div>
<!-- Footer -->
<div class="modal fade" id="vendordet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>View Property  Details</strong></h4>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div id="host-property_info-details">

                    </div>
                    <div class="clearfix"></div><br/>  
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>

