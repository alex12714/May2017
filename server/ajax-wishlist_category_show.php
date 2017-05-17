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

$Objnew->property_id = $_REQUEST['property_id'];
$res_wishlist = $Objnew->fetchwishlist();
while ($row_wishlist = mysqli_fetch_assoc($res_wishlist)) {
    $wishlist_arr[] = $row_wishlist['wishist_category_id'];
}

//print_r($wishlist_arr);
?>

<div>
                        <table class="table table-striped table-hover" style="box-shadow: none;">
                            <?php foreach ((array) $wishlist_details_arr as $details) { ?>
                                <tr>
                                    <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;"><?php echo $details['wishlist_category_name']; ?></td>
                                    <td style="border-top: 0px;border-bottom: 1px solid #e8e8e8;">
                                        <input type="checkbox" name="wishtlist" class="chk_wishlist" onclick="addwishlist('<?php echo $_REQUEST['property_id']; ?>', '<?php echo $details['wishlist_category_id']; ?>', this)" value="<?php echo $_REQUEST['property_id']; ?>"<?php
                                        if (in_array($details['wishlist_category_id'], $wishlist_arr)) {
                                            echo "checked";
                                        }
                                        ?>>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>







