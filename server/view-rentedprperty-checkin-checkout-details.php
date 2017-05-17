<?php
include_once '../classes/class_admin.php';
////include_once '../classes/mail_class.php';
include_once '../classes/common.php';
//
//****************fetch selectpropertylist***********

$Objnew = new class_admin();

$Objnew->property_id = $_REQUEST['property_id'];
$RES_1 = $Objnew->selectrendtedcheckingdeatils();
//while ($row = mysqli_fetch_assoc($RES_1)) {
//    $booking_details_array[] = $row;
//}
?>

<div class="thumbnail">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <?php if (mysqli_num_rows($RES_1) > 0) { ?>
                <tr class="warning">
                    <th style="border-top: 0px;">
                        S.No
                    </th>
                    <th style="border-top: 0px;">
                        Check In 
                    </th>
                    <th style="border-top: 0px;">
                        Check Out
                    </th>
                    <th style="border-top: 0px;">
                        Action
                    </th>
                </tr>
                <?php $i = 0; ?>
                <?php
                while ($row = mysqli_fetch_array($RES_1)) {

                    if ($row['check_in'] != '1970-01-01' || $row['check_in'] != '0000-00-00' || $row['check_in'] != 'NULL') {
                        $check_in = date('d-m-Y', strtotime($row['check_in']));
                    }
                    if ($row['check_out'] != '1970-01-01' || $row['check_out'] != '0000-00-00' || $row['check_out'] != 'NULL') {
                        $check_out = date('d-m-Y', strtotime($row['check_out']));
                    }
                    ?>
                    <tr>
                        <td>
                            <?php echo $i + 1; ?>
                        </td>


                        <td>
                            <?php echo $check_in; ?>

                        </td>
                        <td>
                            <?php echo $check_out; ?>
                        </td>
                        <td>
                            <a href='' data-toggle="modal" data-target="#guestdet" onclick="view_guset_deatils('<?php echo $row['user_id']; ?>')" class="btn btn-info btn-xs text-uppercase" >Booked By</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td style="border-top: 0px;">
                        <div class="alert alert-warning text-center" style="font-size: 24px;margin-bottom: 0px;"> 
                            Data Not Found !!
                        </div>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</div>
<div class="clearfix"></div>