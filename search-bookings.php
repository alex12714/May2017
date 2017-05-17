<?php
include_once 'classes/class_guest.php';
include_once 'classes/image.php';
include_once 'classes/common.php';
include_once "session/guest_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_guest();

$Objnew->guest_id = $_SESSION['guest_id'];

if ($_POST) {

    $Objnew->property_id = $_REQUEST['property_id'];

    if ($_REQUEST['check_in'] != "" && $_REQUEST['check_out'] != "") {

        $Objnew->check_in = date('Y-m-d', strtotime($_REQUEST['check_in']));
        $Objnew->check_out = date('Y-m-d', strtotime($_REQUEST['check_out']));
    } else {
        $today_date = date("Y-m-d");

        $date = strtotime($today_date);
        $date = strtotime("+7 day", $date);
        $endofweekdate = date("Y-m-d", $date);

        $Objnew->today_date = $today_date;
        $Objnew->endofweekdate = $endofweekdate;
    }


    $res_res = $Objnew->BookingsRequestList();
    while ($row_res = mysqli_fetch_array($res_res)) {
        $booking_list_details[] = $row_res;
    }
}
//print_r($booking_list_details);
?>

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
    <div class="clearfix"></div><br/>
<?php } else { ?>
    <div class="alert alert-info text-center">
        No Data Found
    </div>
<?php } ?>