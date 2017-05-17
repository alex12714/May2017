<?php
ob_start();
include 'testimonials-list.inc.php';
?>

<div class="row">
    <div class="col-md-12col-md-12 col-sm-12 col-xs-12">
        <h3>Testimonials List</h3>
        <div class="bg">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="100">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ((array) $testimonials_list_details as $det) {
                            ?>
                            <tr>
                                <td scope="row"><?php echo $i; ?></td>
                                <td><?php if ($det['logo_image'] != "") { ?>
                                        <img src="../uploads/<?php echo $det['logo_image']; ?>" style=" width:60px; height:60px;"/>
                                    <?php } else { ?>
                                        <img src="../images/user_pic.png" style=" width:60px; height:60px;"/>
                                    <?php } ?></td>
                                <td><?php echo $det['title']; ?></td>
                                <td><?php echo substr($det['description'], 0,150).'..'; ?></td>
                                <td>  <a href="manage-testimonials.php?edit_id=<?php echo $det['testimonials_id']; ?>" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit fa fa-white"></i></a> |
                                    <a href="testimonials-list.php?testimonials_id=<?php echo $det['testimonials_id']; ?>&action=delete" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times fa fa-white"></i></a></td>
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