<?php

include_once "session/session.php";
include_once 'classes/class_host.php';
include_once 'classes/class_search.php';
include_once 'classes/image.php';
include_once 'classes/common.php';


$Objnew = new class_host();

$obj = new class_search();
$obj->property_id = $_REQUEST['property_id'];
$res_img = $obj->fetchpropertyimages();
$count = mysqli_num_rows($res_img);


$Objnew->property_id = $_REQUEST['property_id'];
$res = $Objnew->viewpropertydet();
$row = mysqli_fetch_assoc($res);
//********arib_property_tbl********
$title = common::StrFromDb($row['title']);
$host_id = common::StrFromDb($row['added_by']);

$amenities = explode(",", $row['amenities']);
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
$room_type = explode(",", $row['room_type']);
$check_in_date = $row['check_in'];
$check_out_date = $row['check_out'];


if ($check_in_date != '0000-00-00 00:00:00' && $check_in_date != '1970-01-01' && $check_in_date != '') {
    $check_in = date('d-m-Y', strtotime($check_in_date));
}
if ($check_out_date != '0000-00-00 00:00:00' && $check_out_date != '1970-01-01' && $check_out_date != '') {
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
$map_location = $row['map_location'];

$Objnew->country_id = $country;
$res1 = $Objnew->selectcountry();
$row = mysqli_fetch_assoc($res1);
$country_name = $row['printable_name'];

$Objnew->state_id = $state;
$res2 = $Objnew->getstate();
$row = mysqli_fetch_assoc($res2);
$state_name = $row['state_name'];

foreach ($room_type as $det_room_type) {
    $Objnew->category_id = $det_room_type;
    $res2 = $Objnew->categoryroomname();
    $row = mysqli_fetch_assoc($res2);
    $room_type_name[] = $row['category_name'];
}

$room_type_deatils = implode(',', $room_type_name);

//*********************for amenities***********************//
$amenities_name = implode(',', $amenities);



$Objnew->host_id = $host_id;
$res_image = $Objnew->selecthostdeatils();
$row_host_image = mysqli_fetch_assoc($res_image);
$host_image = $row_host_image['logo_img'];


$Objnew->property_id = $_REQUEST['property_id'];
$res_review = $Objnew->viewaddedreview();
$count_review = mysqli_num_rows($res_review);
while ($row_review = mysqli_fetch_assoc($res_review)) {
    $review_details_arr[] = $row_review;
}

$Objnew->guest_id = $_SESSION['guest_id'];
$res_wishlist_popup = $Objnew->fetchwishlistcategory();
while ($row_wishlist_popup = mysqli_fetch_assoc($res_wishlist_popup)) {
    $wishlist_details_arr[] = $row_wishlist_popup;
}


$Objnew->guest_id = $_SESSION['guest_id'];
$Objnew->property_id = $_REQUEST['property_id'];
$res_wishlist = $Objnew->fetchwishlist();
while ($row_wishlist = mysqli_fetch_assoc($res_wishlist)) {
    $wishlist_arr[] = $row_wishlist['wishist_category_id'];
}
//
//
$current_date = date("Y-m-d", strtotime("0 Months"));
$Objnew->current_date = $current_date;
$R = $Objnew->allreadybookedproperty();
$result_booking = mysqli_fetch_assoc($R);
 $already_booking_property_id = $result_booking['property_id'];


/////*********************list review****************************//
?>