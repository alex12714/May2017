<?php
ob_start();
include 'hostlisting.inc.php';
?>

<div class="row">
    <div class="col-md-12col-md-12 col-sm-12 col-xs-12">
        <h3>Host List</h3>
        <div class="bg">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>No. of Properties Listed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ((array) $host_list_details as $det) {

                          
                            $Objnew = new class_admin();
                               $Objnew->host_id=$det['user_id'];
                            $res = $Objnew->fetchnumberofpropertyforcount();
                            $count_no_of_property = mysqli_num_rows($res);
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $det['firstname']; ?></td>
                                <td><?php echo $det['email']; ?></td>
                                <td><?php echo $det['phone_number']; ?></td>
                                <td><?php echo $count_no_of_property; ?></td>
                               
                                <td>  <a href='' data-toggle="modal" data-target="#login" onclick="view_host_deatils('<?php echo $det['user_id']; ?>')" class="btn btn-info btn-xs text-uppercase">View Details</a> |
                                    <a href='' data-toggle="modal" data-target="#allowed_prpperty" onclick="add_limit_deatils('<?php echo $det['user_id']; ?>', '<?php echo $det['total_number_of_property']; ?>')" class="btn btn-primary btn-xs text-uppercase">Add Property Limit</a> |

                                    <a href='propertylist.php?host_id=<?php echo $det['user_id'] ?>' class="btn btn-danger btn-xs text-uppercase"><strong>View Property Listings</strong></a>

                                </td>
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