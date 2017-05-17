<?php
include_once '../classes/class_admin.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
include_once "../session/admin_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_admin();

$Objnew->host_id = $_REQUEST['host_id'];
$RES = $Objnew->selecthostdeatils();
$row = mysqli_fetch_assoc($RES);
$firstname = $row['firstname'];
$email = $row['email'];
$last_name = $row['last_name'];
$gender = $row['gender'];
$dob1 = $row['dob'];
$phone_number = $row['phone_number'];
$alternate_number = $row['alternate_number'];
$whereyoulive = common::StrFromDb($row['whereyoulive']);
$description = common::StrFromDb($row['description']);
if ($dob1 != '0000-00-00 00:00:00' && $dob1 != '1970-01-01' && $dob1 != '') {
    $dob = date('d-m-Y', strtotime($dob1));
}
$image = common::StrFromDb($row['logo_img']);
?>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive" style="overflow-x: inherit;">
        <table class="table table-striped table-bordered">

            <tr>
                <td width="140"><strong>Name :</strong></td>
                <td width="300"><?php echo $firstname; ?></td>
                <td><strong>Last Name:</strong></td>
                <td><?php echo $last_name; ?></td>
                <td rowspan="6" align="center">
                    <strong>Profile Photo :</strong>
                    <div class="clearfix"></div><br/>
                    <?php if ($image != "") { ?><img src="../uploads/<?php echo $image; ?>" width="100" height="100" style="margin-top: 5px;"/><br/>
                    <?php } else { ?>
                        <img src="../images/user_pic.png" width="100" height="100" style="margin-top: 5px;"/><br/>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td><strong>Email :</strong></td>
                <td><?php echo $email; ?></td>
                <td width="140"><strong>Gender :</strong></td>
                <td><?php echo $gender; ?></td>

            </tr>
            <tr>
                <td><strong>Date of Birth :</strong></td>
                <td><?php echo $dob; ?></td>
                <td><strong>Phone Number :</strong></td>
                <td><?php echo $phone_number; ?></td>
            </tr>
            <tr>
                <td><strong>Alternate Number :</strong></td>
                <td colspan="3"><?php echo $alternate_number; ?></td>
            </tr>
            <tr>
                <td width="100"><strong>Where You Live :</strong></td>
                <td colspan="3"><?php echo $whereyoulive; ?></td>
            </tr>
            <tr>
                <td width="100"><strong>Describe Yourself :</strong></td>
                <td colspan="3"><?php echo $description; ?></td>
            </tr>
        </table>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="clearfix"></div>

