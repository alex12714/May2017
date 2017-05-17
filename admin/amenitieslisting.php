<?php
ob_start();
include 'amenitieslisting.inc.php';
?>

<div class="row">
    <div class="col-md-12col-md-12 col-sm-12 col-xs-12">
        <h3>Amenities List</h3>
        <div class="bg">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amenities</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ((array) $amenities_list_details as $det) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $det['amenities']; ?></td>
                                <td>  <a href="amenities.php?edit_id=<?php echo $det['amenti_id']; ?>" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa fa-white"></i></a> |
                                    <a href="amenitieslisting.php?amenti_id=<?php echo $det['amenti_id']; ?>&action=delete" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times fa fa-white"></i></a></td>
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