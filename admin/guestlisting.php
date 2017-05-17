<?php
ob_start();
include 'guestlisting.inc.php';
?>

<div class="row">
    <div class="col-md-12col-md-12 col-sm-12 col-xs-12">
        <h3>Guest List</h3>
        <div class="bg">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ((array) $guest_list_details as $det) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $det['firstname']; ?></td>
                                <td><?php echo $det['email']; ?></td>
                                <td><?php echo $det['phone_number']; ?></td>
                                <td>  <a href='' data-toggle="modal" data-target="#guestdet" onclick="view_guset_deatils('<?php echo $det['user_id']; ?>')" class="btn btn-info btn-xs text-uppercase" >View Details</a></td>
                                <!--<td><a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-times fa fa-white"></i></a></td>-->
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div><br/><br/>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include '../master/admin-master.php';
?>