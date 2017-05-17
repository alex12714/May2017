<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->host_id = $_SESSION['host_id'];

if ($_POST) {

    $Objnew->property_id = $_REQUEST['property_id'];




    $result = $Objnew->contacttohostmsg();
    while ($row = mysqli_fetch_assoc($result)) {
        $contacthost_list_details[] = $row;
    }
}
//print_r($booking_list_details);
?>

<?php if (!empty($contacthost_list_details)) { ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>

                <th>Guest</th>
                <th>Title</th>
                <th>Check in</th>
                <th>Check Out</th>
                <th>No of Guest</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 1;
            foreach ((array) $contacthost_list_details as $det) {

                $Objnew = new class_host();

                $Objnew->guest_id = $det['guest_id'];
                $res_guest = $Objnew->Guestdeatils();
                list($user_id, $guest_name) = mysqli_fetch_row($res_guest);

                if ($det['check_in'] != '0000-00-00 00:00:00' && $det['check_in'] != '1970-01-01' && $det['check_in'] != '') {
                    $check_in = date('d-m-Y', strtotime($det['check_in']));
                }
                if ($det['check_out'] != '0000-00-00 00:00:00' && $det['check_out'] != '1970-01-01' && $det['check_out'] != '') {
                    $check_out = date('d-m-Y', strtotime($det['check_out']));
                }
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><a href='' data-toggle="modal" data-target="#login" onclick="view_guset_deatils('<?php echo $det['guest_id']; ?>')" class="text-danger"><u><?php echo $guest_name; ?></u></a></td>
                    <td><a  href='' data-toggle="modal" data-target="#vendordet" onclick="view_property_details('<?php echo $det['property_id']; ?>')" class="text-danger"><u><?php echo $det['title']; ?></u></a></td>
                    <td><?php echo $check_in; ?></td>
                    <td><?php echo $check_out; ?></td>
                    <td><?php echo $det['guest']; ?></td>
                    <td><a href='' data-toggle="modal" data-target="#viewcontacthostmsg" onclick="view_contacthostmsg_deatils('<?php echo $det['contact_id']; ?>')" class="btn btn-info btn-xs">View Message</a> 
                    </td>

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