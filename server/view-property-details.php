<?php
include_once '../classes/class_host.php';
include_once '../classes/image.php';
include_once '../classes/common.php';
//include_once "../session/host_session.php";





//****************fetch selectpropertylist***********

$Objnew = new class_host();

$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
//********arib_property_tbl********
$title = common::StrFromDb($row['title']);
$amenities = $row['amenities'];
$description = common::StrFromDb($row['description']);
$house_rules = common::StrFromDb($row['house_rules']);
$about_this_list = common::StrFromDb($row['about_this_list']);
$availability = common::StrFromDb($row['availability']);

//******** arib_space_tbl********

$accommodation = $row['accommodation'];
$bathrooms = $row['bathrooms'];
$guests = $row['guests'];
$beds = $row['beds'];
$property_type = $row['property_type'];

$check_in_date = $row['check_in'];
$check_out_date = $row['check_out'];


if ($check_in_date != '0000-00-00 00:00:00' && $check_in_date!= '1970-01-01' &&  $check_in_date != '') {
        $check_in = date('d-m-Y', strtotime($check_in_date));
    }
if ($check_out_date != '0000-00-00 00:00:00' && $check_out_date!= '1970-01-01' &&  $check_out_date != '') {
        $check_out = date('d-m-Y', strtotime($check_out_date));
    }
//******** arib_property_price_tbl********
$property_price = $row['property_price'];
$extra_people = $row['extra_people'];
$monthly_discount = $row['monthly_discount'];
$weekly_discount = $row['weekly_discount'];
$cancellation = $row['cancellation'];
$cleaning_fee = $row['cleaning_fee'];
$security_deposit = $row['security_deposit'];

//******** arib_property_address_tbl********
$country = $row['country'];
$state = $row['state'];
$city = common::StrFromDb($row['city']);
$address = common::StrFromDb($row['address']);
$zip_code = $row['zip_code'];
 $room_type = explode(",", $row['room_type']);
$Objnew->country_id = $country;
$res1 = $Objnew->selectcountry();
$row2 = mysqli_fetch_assoc($res1);
$country_name = $row2['printable_name'];

$Objnew->state_id = $state;
$res2 = $Objnew->getstate();
$row1 = mysqli_fetch_assoc($res2);
$state_name = $row1['state_name'];




//print_r($room_type);
foreach ($room_type as $det_room_type) {
    $Objnew->category_id = $det_room_type;
    $res2 = $Objnew->categoryroomname();
    $row = mysqli_fetch_assoc($res2);
    $room_type_name[] = $row['category_name'];
}
 
$room_type_deatils = implode(',', $room_type_name);
?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <td colspan="4" class="text-uppercase text-primary"><strong><b>Start with the basics</b></strong></td>
        </tr>
        <tr>
            <td width="136"><strong>Kind of Place :</strong></td>
            <td><?php echo $room_type_deatils; ?></td>
            <td><strong>Max Guests:</strong></td>
            <td><?php
                if ($guests != "") {
                    echo $guests . "&nbsp;Guests";
                }
                ?></td>
        </tr>
        <tr>
            <td><strong>Available To Book :</strong></td>
            <td><?php
                if ($accommodation != "") {
                    echo $accommodation . "&nbsp;Badrooms";
                }
                ?></td>
            <td width="130"><strong>Property Type :</strong></td>
            <td><?php echo $property_type; ?></td>

        </tr>
        <tr>
            <td width="100"><strong>Available Beds :</strong></td>
            <td><?php
                if ($beds != "") {
                    echo $beds . "&nbsp;Beds";
                }
                ?></td>
            <td><strong>Available Bathrooms :</strong></td>
            <td><?php
                if ($bathrooms != "") {
                    echo $bathrooms . "&nbsp;Bathrooms";
                }
                ?></td>

        </tr>

    </table>
    <div class="clearfix"></div>

    <table class="table table-striped table-bordered">
        <tr>
            <td colspan="4" class="text-uppercase text-primary"><strong><b>Place Location</b></strong></td>
        </tr>
        <tr>
            <td width="100"><strong>Country :</strong></td>
            <td><?php echo $country_name; ?></td>
            <td><strong>State :</strong></td>
            <td> <?php echo $state_name; ?></td>
        </tr>
        <tr>
            <td><strong>City :</strong></td>
            <td><?php echo $city; ?></td>
            <td><strong>Zip Code :</strong></td>
            <td> <?php echo $zip_code; ?></td>
        </tr>
        <tr>
            <td><strong>Address :</strong></td>
            <td colspan="3"> <?php echo $address; ?></td>
        </tr>
    </table>
    <div class="clearfix"></div>

    <table class="table table-striped table-bordered">
        <tr>
            <td colspan="4" class="text-uppercase text-primary"><strong><b>AMENITIES & Description</b></strong></td>
        </tr>
        <tr>
            <td width="150"><strong>Amenities :</strong></td>
            <td colspan="3"><?php echo $amenities; ?></td>
        </tr>
        <tr>
            <td><strong>Place Name :</strong></td>
            <td><?php echo $title; ?></td>
            <td><strong>Available :</strong></td>
            <td><?php echo $availability; ?></td>

        </tr>
        <tr>
            <td><strong>Short Description :</strong></td>
            <td colspan="3"><?php echo $about_this_list; ?></td>
        </tr>
        <tr>
            <td><strong>House Rules :</strong></td>
            <td colspan="3"><?php echo $house_rules; ?></td>
        </tr>
        <tr>
            <td><strong>Full Description :</strong></td>
            <td colspan="3"><?php echo $description; ?></td>
        </tr>
        <tr>
            <td><strong>Check In :</strong></td>
            <td><?php echo $check_in; ?></td>
            <td><strong>Check Out :</strong></td>
            <td><?php echo $check_out; ?></td>

        </tr>
    </table>

    <div class="clearfix"></div><br/>

    <table class="table table-striped table-bordered">
        <tr>
            <td colspan="4" class="text-uppercase text-primary"><strong><b>PRICE</b></strong></td>
        </tr>
        <tr>
            <td><strong>Price Per Night :</strong></td>
            <td colspan="3"><?php if($property_price!="") { echo '$ '.$property_price; } ?></td>
            
        </tr>
        <tr>
            <td><strong>Price Per Week:</strong></td>
            <td><?php echo $weekly_discount; ?></td>
            
            <td><strong>Price Per Month :</strong></td>
            <td> <?php echo $monthly_discount; ?></td>
        </tr>
        <tr>
            <td><strong>Extra People :</strong></td>
            <td><?php echo $extra_people; ?></td>
            <td><strong>Cleaning Fee :</strong></td>
            <td> <?php echo $cleaning_fee; ?></td>
        </tr>
        <tr>
            <td><strong>Security Deposit :</strong></td>
            <td><?php echo $security_deposit; ?></td>
            <td><strong>Cancellation :</strong></td>
            <td> <?php echo $cancellation; ?></td>
        </tr>
    </table>




</div>

