<?php
//echo "asd";
include_once '../classes/class_host.php';
////include_once '../classes/mail_class.php';
include_once "../session/guest_session.php";
//
//
$Objnew = new class_host();
$Objnew->guest_id = $_SESSION['guest_id'];

$res_wishlist_popup = $Objnew->fetchwishlistcategory();
while ($row_wishlist_popup = mysqli_fetch_assoc($res_wishlist_popup)) {
    $wishlist_details_arr[] = $row_wishlist_popup;
}


?>

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






