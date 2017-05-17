<?php
ob_start();
include 'wishlist-list.inc.php';
?>

<div class="page-title-container">
    <div class="container">
        <div class="page-title pull-left">
            <h2 class="entry-title">
                Wish Lists   of  <?php echo $firstname; ?>        
            </h2>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<section id="content">
    <div class="container">
        <a href="javascript:void(0)"  class="btn btn-info pull-right"  data-toggle="modal" data-target="#wishlist" >Create Wish List</a>
        <div class="clearfix"></div><br/>
        <div class="panel panel-default">
            <div class="panel-body">                
                <div >

                    <?php if (!empty($wishlistproperty_arr)) { ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="box-shadow: none;">
                                <?php
                                foreach ((array) $wishlistproperty_arr as $value) {
                                    ?>
                                    <tr>
                                        <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;"><?php echo $value['wishlist_category_name']; ?></td>
                                        <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;">
                                            <a href="wishlist-list-property-deatils.php?wishist_category_id=<?php echo $value['wishlist_category_id']; ?>" target="_blank" class="btn btn-warning">View Property</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <?php } else {
                        ?>

                        <div class="clearfix"></div><br/>
                        <div class="alert alert-success text-center">
                            No data Found
                        </div>


                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div><br/><br/>

<div class="modal fade" id="wishlist" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="wishlistremoveerrormsg();" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="signupLabel">Create New Wish List</h4>
            </div>

            <div class="modal-body dadas">
                <div class="clearfix"></div><br/>
                <span id="successwishlistmsg"></span>

                <form role="form" id="createwishlistcategory" action="" method="post">
                    <div>
                        <input type="hidden" class="form-control"  name="property_val_id" id="property_val_id" value="<?php echo $_REQUEST['property_id']; ?>"/>
                        <input type="hidden" class="form-control"  name="onlycreate" id="onlycreate" value="onlycreate"/>
                        <div class="col-sm-9 padnoneleft padnone1">
                            <div class="form-group">
                                <input type="text" name="wishlist_category_name" id="wishlist_category_name" placeholder="Name Your Wish List" class="form-control" value="<?php echo $_REQUEST['checkout']; ?>"/>
                            </div>
                        </div>
                        <div class="col-sm-3 padnoneright padnone1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-green btn-block isThemeBtn">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
                <hr/>
                <div class="clearfix"></div>
                <div id="deletelistwishlistcategoerydetails" class="loderwishlist">                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Wishlist</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php foreach ((array) $wishlist_details_arr as $details) { ?>
                                <tr>
                                    <td><?php echo $details['wishlist_category_name']; ?></td>
                                    <td style="border-bottom: 1px solid #e8e8e8;">
                                        <span style="cursor: pointer" onclick="deletewishlist('<?php echo $_REQUEST['property_id']; ?>', '<?php echo $details['wishlist_category_id']; ?>', 'delete')" class="text-danger">Delete</span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>                            
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$mainpagecontent = ob_get_contents();
ob_clean();
include 'master/root-master.php';
?>