<?php

include_once 'class_db.php';

class class_host {

    //-------------user login------------//
    public $first_name = null;
    public $last_name = null;
    public $email = null;
    public $password = null;
    public $guestfirst_name = null;
    public $guestlast_name = null;
    public $guestemail = null;
    public $guestpassword = null;
    //*************add property fileds**********
    public $property_type = null;
    public $title = null;
    public $room_type = null;
    public $accommodate = null;
    public $beds = null;
    public $check_in = null;
    public $check_out = null;
    public $guests = null;
    public $bathrooms = null;
    public $user_type = null;
    public $host_id = null;
    //*************end add property filed
//*********************add address*******************//
    //*************add address fileds**********
    public $country = null;
    public $state = null;
    public $city = null;
    public $address = null;
    public $zip_code = null;
    public $map_location = null;
    public $longitude = null;
    public $latitude = null;
    //*************add amenities**********
    public $amenities = null;
    public $description = null;
    public $house_rules = null;
    public $about_this_list = null;
    public $availability = null;
//   
    //********price**********//
    public $property_price = null;
    public $extra_people = null;
    public $weekly_discount = null;
    public $cancellation = null;
    public $cleaning_fee = null;
    public $security_deposit = null;
    public $monthly_discount = null;
    //************host profile****************//
    public $gender = null;
    public $dob = null;
    public $phone_number = null;
    public $alternate_number = null;
    public $whereyoulive = null;
    public $guest_id = null;
    public $logo_img = null;
    public $wishlist_category_name = null;
    public $total_number_of_property = null;

//     public $description = null;
//     public $phone_number = null;
//     public function hostregister() {

    public function guestregister() {
        $select_query = "SELECT * FROM arib_login_tbl WHERE email='$this->guestemail'";
        $Obj_add_user_sel = new class_db();
        $Obj_add_user_sel->sproc_name = $select_query;
        $RES_check = $Obj_add_user_sel->SelectQuery();
        $count = mysqli_num_rows($RES_check);
        $add_date = date("Y-m-d H:i:s");
        if ($count == 0) {

            $S = "INSERT INTO   arib_login_tbl(firstname,email,password, user_type)
                  VALUES('$this->guestfirst_name','$this->guestemail','$this->guestpassword','GU')";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $S;
            $RES1 = $ObjDB->ExecuteQuery();
            $genrated_id = $ObjDB->getGenratedId();


            $S3 = "INSERT INTO arib_register_tbl(user_id,last_name)
                  VALUES('$genrated_id','$this->guestlast_name')";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $S3;
            $RE2 = $ObjDB->ExecuteQuery();

            if ($RES1 == '1' || $RES2 == '1') {
                return "succuss";
            }
        } else {
            return "exist";
        }
    }

    public function hostregister() {


        $select_query = "SELECT * FROM arib_login_tbl WHERE email='$this->email'";
        $Obj_add_user_sel = new class_db();
        $Obj_add_user_sel->sproc_name = $select_query;
        $RES_check = $Obj_add_user_sel->SelectQuery();
        $count = mysqli_num_rows($RES_check);
        $add_date = date("Y-m-d H:i:s");
        if ($count == 0) {

            $S = "INSERT INTO   arib_login_tbl(firstname,email,password, user_type,total_number_of_property)
                  VALUES('$this->first_name','$this->email','$this->password','HO','$this->total_number_of_property' )";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $S;
            $RES1 = $ObjDB->ExecuteQuery();
            $genrated_id = $ObjDB->getGenratedId();


            $S3 = "INSERT INTO arib_register_tbl(user_id,last_name)
                  VALUES('$genrated_id','$this->last_name')";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $S3;
            $RE2 = $ObjDB->ExecuteQuery();





            if ($RES1 == '1' || $RES2 == '1') {
                return "succuss";
            }
        } else {
            return "exist";
        }
    }

    public function Login() {
        $RES = "invalid";
        $add_date = date("Y-m-d H:i:s");

        $query = "SELECT * FROM  arib_login_tbl WHERE email='$this->email' AND password='$this->password'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();

        return $RES;
    }

//****************select category or room type**********//
    public function categoryroomtype() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_category_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function amenitiesdet() {
        $RES = "invalid";
        $query = "SELECT * FROM airb_amenities_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function getcountry() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_country_tbl";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selectcountry() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_country_tbl where iso='$this->country_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selstate() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_state_tbl where status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function city() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_city_tbl where status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selectstate() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_state_tbl where country_iso_code='$this->country_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function getstate() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_state_tbl where state_id='$this->state_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selectcity() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_city_tbl where state_id='$this->state_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    //************************start add property*************//
    public function addproperty() {

        if ($this->latitude == '0' && $this->longitude == '0') {
            $zipcode = "$this->zip_code";
            $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $zipcode . "&sensor=false";
            $details = file_get_contents($url);
            $result = json_decode($details, true);

            $lat = $result['results'][0]['geometry']['location']['lat'];

            $lng = $result['results'][0]['geometry']['location']['lng'];

            $this->latitude = $lat;
            $this->longitude = $lng;
        }

        $S = "INSERT INTO  arib_property_tbl(title,added_by,user_type)
                  VALUES('$this->title','$this->host_id','$this->user_type' )";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S;
        $RES1 = $ObjDB->ExecuteQuery();
        $genrated_id = $ObjDB->getGenratedId();


        $S2 = "INSERT INTO arib_space_tbl(property_id,accommodation,bathrooms,guests,beds,property_type,room_type,check_out,check_in)
                  VALUES('$genrated_id','$this->accommodate','$this->bathrooms','$this->guests','$this->beds','$this->property_type','$this->room_type','$this->check_out','$this->check_in')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S2;
        $RES2 = $ObjDB->ExecuteQuery();
        $S3 = "INSERT INTO  arib_property_price_tbl(property_id,property_price)
                  VALUES('$genrated_id','$this->property_price')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S3;
        $RES3 = $ObjDB->ExecuteQuery();
        $S4 = "INSERT INTO arib_property_address_tbl(property_id,country,zip_code,state,city,address,map_location,latitude,longitude)
                  VALUES('$genrated_id','$this->country','$this->zip_code','$this->state','$this->city','$this->address','$this->map_location','$this->latitude','$this->longitude')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES4 = $ObjDB->ExecuteQuery();






        if ($RES1 == '1' || $RES2 == '1' || $RES3 == '1' || $RES3 == '1' || $RES4 = '1') {
            return 'succuess' . '*' . $genrated_id;
        }
    }

    //************************end add property*************//
    //************************start updateproperty*************//
    public function updateproperty() {


        if ($this->latitude == '0' && $this->longitude == '0') {
            $zipcode = "$this->zip_code";
            $url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $zipcode . "&sensor=false";
            $details = file_get_contents($url);
            $result = json_decode($details, true);

            $lat = $result['results'][0]['geometry']['location']['lat'];

            $lng = $result['results'][0]['geometry']['location']['lng'];

            $this->latitude = $lat;
            $this->longitude = $lng;
        }
        $genrated_id = $this->genrated_id;
        $S1 = "UPDATE arib_property_tbl SET title='$this->title',amenities='$this->amenities',description='$this->description',house_rules='$this->house_rules',about_this_list='$this->about_this_list',availability='$this->availability',phone_number='$this->phone_number' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S1;
        $RES1 = $ObjDB->ExecuteQuery();

        $S2 = "UPDATE arib_space_tbl SET accommodation='$this->accommodate',bathrooms='$this->bathrooms',guests='$this->guests',beds='$this->beds',property_type='$this->property_type',room_type='$this->room_type',check_out='$this->check_out',check_in='$this->check_in' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S2;
        $RES2 = $ObjDB->ExecuteQuery();

        $S3 = "UPDATE arib_property_address_tbl SET  country='$this->country',state='$this->state',city='$this->city',address='$this->address',zip_code='$this->zip_code',map_location='$this->map_location',longitude='$this->longitude',latitude='$this->latitude' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S3;
        $RES3 = $ObjDB->ExecuteQuery();

        $S4 = "UPDATE arib_property_price_tbl SET property_price='$this->property_price',extra_people='$this->extra_people',monthly_discount='$this->monthly_discount',weekly_discount='$this->weekly_discount',cancellation='$this->cancellation',cleaning_fee='$this->cleaning_fee',security_deposit='$this->security_deposit' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES4 = $ObjDB->ExecuteQuery();

//        if ($this->country != "") {
//    $prepAddr = str_replace(' ', '+', $this->country);
//    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
//    $output = json_decode($geocode);
//    $latitude = $output->results[0]->geometry->location->lat;
//    $longitude = $output->results[0]->geometry->location->lng;
//} else {
//    $latitude = '43.7920533400153';
//    $longitude = '6.37761393942265';
//}


        if ($RES1 == '1' || $RES2 == '1' || $RES3 == '1' || $RES3 == '1' || $RES4 = '1') {
            return 'succuess' . '*' . $genrated_id;
//            return 'succuess' . '*' . $genrated_id .'*'.$latitude.'*'.$longitude;
        }
    }

    public function selectlast_id() {
        $RES = "invalid";
        $query = "SELECT property_id FROM arib_property_tbl WHERE added_by='$this->host_id' AND user_type='HO' order by property_id desc";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function deleteimg() {
        $delete_img = "DELETE FROM arib_property_images_tbl WHERE property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $delete_img;
        $RES4 = $ObjDB->ExecuteQuery();

        return $RES4;
    }

    public function uploadimg() {
        $i = 0;
        foreach ($this->imagename as $valdetailimg) {

            $insertimage = "INSERT INTO arib_property_images_tbl (property_id,image_name) VALUES('$this->genrated_id','$valdetailimg')";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $insertimage;
            $RES4 = $ObjDB->ExecuteQuery();

            $i++;
        }
        return $RES4;
    }

    //************************end add property*************//
    //************************Start selectpropertylist*************//


    public function selectpropertylist() {
        $RES = "invalid";
        $query = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE a.added_by='$this->host_id' and a.admin_status='1' group by a.property_id ORDER BY a.property_id DESC";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function viewpropertydet() {
        $RES = "invalid";
        $query = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE a.property_id='$this->property_id'  group by a.property_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    //************************Start getpropertyimage*************//


    public function getpropertyimage() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_property_images_tbl WHERE property_id='$this->property_id' AND status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selecthostdeatils() {
        $RES = "invalid";
        $query = "SELECT a.*,b.* FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->host_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function updatehostprofile() {

        $A = "UPDATE arib_login_tbl SET firstname='$this->first_name',email='$this->email' where user_id='$this->host_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $A;
        $A11 = $ObjDB->ExecuteQuery();

        $B = "UPDATE arib_register_tbl SET last_name='$this->last_name',gender='$this->gender',dob='$this->dob',phone_number='$this->phone_number',alternate_number='$this->alternate_number',whereyoulive='$this->whereyoulive',description='$this->description',logo_img='$this->logo_img' where user_id='$this->host_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $B;
        $B22 = $ObjDB->ExecuteQuery();
        if ($A11 == '1' || $B22 == '1') {
            return 'succuess';
        }
    }

    public function emailcheck() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_login_tbl WHERE user_id!='$this->host_id'  And  email='$this->email' AND status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $R = $ObjDB->SelectQuery();
        return $R;
    }

    public function selectpricingdet() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_property_price_tbl WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function updatepricing() {
        $S4 = "UPDATE arib_property_price_tbl SET property_price='$this->property_price',extra_people='$this->extra_people',monthly_discount='$this->monthly_discount',weekly_discount='$this->weekly_discount',cancellation='$this->cancellation',cleaning_fee='$this->cleaning_fee',security_deposit='$this->security_deposit' where property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES4 = $ObjDB->ExecuteQuery();
        if ($RES4 == '1') {
            return 'succuess';
        }
    }

    public function updatepropertydaetils() {
        $genrated_id = $this->genrated_id;
        $S1 = "UPDATE arib_property_tbl SET title='$this->title',amenities='$this->amenities',description='$this->description',house_rules='$this->house_rules',about_this_list='$this->about_this_list',availability='$this->availability',phone_number='$this->phone_number' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S1;
        $RES1 = $ObjDB->ExecuteQuery();

        $S2 = "UPDATE arib_space_tbl SET accommodation='$this->accommodate',bathrooms='$this->bathrooms',guests='$this->guests',beds='$this->beds',property_type='$this->property_type',room_type='$this->room_type',check_out='$this->check_out',check_in='$this->check_in' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S2;
        $RES2 = $ObjDB->ExecuteQuery();

        $S3 = "UPDATE arib_property_address_tbl SET  address='$this->address',zip_code='$this->zip_code' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S3;
        $RES3 = $ObjDB->ExecuteQuery();

        if ($RES1 == '1' || $RES2 == '1' || $RES3 == '1') {
            return 'succuess';
        }
    }

    public function updateaddress() {
        $genrated_id = $this->genrated_id;

        $S3 = "UPDATE arib_property_address_tbl SET  country='$this->country',state='$this->state',city='$this->city',map_location='$this->map_location',longitude='$this->longitude',latitude='$this->latitude' where property_id='$this->genrated_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S3;
        $RES3 = $ObjDB->ExecuteQuery();

        if ($RES3 == '1') {
            return 'succuess';
        }
    }

//    public function showproperty() {
//        $S3 = "UPDATE arib_property_tbl SET  added_status='2' where property_id='$this->property_id'";
//        $ObjDB = new class_db();
//        $ObjDB->sproc_name = $S3;
//        $RES5 = $ObjDB->ExecuteQuery();
//        if ($RES5 == '1') {
//            return 'succuess';
//        }
//    }
//    public function hideproperty() {
//        $S3 = "UPDATE arib_property_tbl SET  added_status='3' where property_id='$this->property_id'";
//        $ObjDB = new class_db();
//        $ObjDB->sproc_name = $S3;
//        $RES5 = $ObjDB->ExecuteQuery();
//        if ($RES5 == '1') {
//            return 'succuess';
//        }
//    }
    public function Selectpropertytype() {
        $INS = "SELECT * FROM arib_property_type_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    public function categoryroomname() {
        $RES = "invalid";
        $query = "SELECT category_name FROM arib_category_tbl WHERE category_id='$this->category_id' and status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function hideshowproperty() {
        $INS = "SELECT * FROM  arib_property_tbl WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R6 = $ObjDB->ExecuteQuery();
        return $R6;
    }

    public function updatehideshowproperty() {
        $S3 = "UPDATE arib_property_tbl SET  added_status='$this->added_status' where property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S3;
        $RES5 = $ObjDB->ExecuteQuery();
        if ($RES5 == '1') {
            return 'succuess';
        }
    }

    public function forgetpassword() {
        $INS = "SELECT * FROM arib_login_tbl WHERE email='$this->email'  AND  status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->SelectQuery();
        return $R;
        if ($R == '1') {
            return 'succuess';
        }
    }

    public function addbooking() {
        $S4 = "INSERT INTO arib_booking_tbl(booking_refrence_id,user_id,property_id,check_in,check_out,total_amount)
                  VALUES('$this->new_booking_id','$this->guest_id','$this->property_id','$this->check_in','$this->check_out','$this->property_price')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES4 = $ObjDB->ExecuteQuery();
        if ($RES4 == '1') {
            return 'succuess';
        }
    }

    public function BookingsRequestList() {
        if ($this->today_date != "" && $this->endofweekdate != "") {
            $dy.=" (a.check_in >= '$this->today_date' AND a.check_out <= '$this->endofweekdate') And";
        } else if ($this->check_in != "" && $this->check_out != "") {
//
            $dy.=" (a.check_in >= '$this->check_in' AND a.check_out <= '$this->check_out') And";
//            $dy.=" (b.check_in BETWEEN '$this->check_in' AND '$this->check_in') and ";
//            $dy.= "  ( b.check_out BETWEEN '$this->check_out' AND $this->check_out) And";
//            $dy.=" (b.check_in <= $this->check_in AND $this->check_out >= b.check_out) And";
//            $dy.=" ((b.check_in BETWEEN '$this->check_in' AND '$this->check_out') OR (b.check_out BETWEEN '$this->check_out' AND '$this->check_in')) And";
        }
        if ($this->property_id != "") {
            $dy.=" (a.property_id = '$this->property_id') And";
        }


        $S = "SELECT a.*,b.* FROM arib_booking_tbl a LEFT JOIN  arib_property_tbl b ON a.property_id=b.property_id where $dy  b.added_by='$this->host_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function Guestdeatils() {
        $RES = "invalid";
        $query = "SELECT a.user_id,a.firstname FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->guest_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    //******************view host details**************//
    public function selectGuestdeatils() {
        $RES = "invalid";
        $query = "SELECT a.*,b.* FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->guest_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function contacttohost() {
        $S4 = "INSERT INTO arib_contact_to_host_tbl(guest_id,property_id,message,check_in,check_out,guest)
                  VALUES('$this->guest_id','$this->property_id','$this->message','$this->checkindate','$this->checkoutdate','$this->guests')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES33 = $ObjDB->ExecuteQuery();
        if ($RES33 == '1') {
            return 'succuess';
        }
    }

    public function addreviewdeatils() {
        $add_date = date("Y-m-d");
        $S4 = "INSERT INTO  arib_add_review_tbl(guest_id,property_id,description,add_date)
                  VALUES('$this->guest_id','$this->property_id','$this->description','$add_date')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES33 = $ObjDB->ExecuteQuery();
        if ($RES33 == '1') {
            return 'succuess';
        }
    }

    public function addsubscribeemail() {
        $add_date = date("Y-m-d");

        $select_query = "SELECT * FROM arib_subscribe_email_tbl WHERE subscribe_email='$this->subscribeemail' and status='1'";
        $Obj_add_user_sel = new class_db();
        $Obj_add_user_sel->sproc_name = $select_query;
        $RES_check = $Obj_add_user_sel->SelectQuery();
        $count = mysqli_num_rows($RES_check);
        if ($count == 0) {
            $S4 = "INSERT INTO  arib_subscribe_email_tbl(subscribe_email,add_date)
                  VALUES('$this->subscribeemail','$add_date')";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $S4;
            $RES33 = $ObjDB->ExecuteQuery();
            if ($RES33 == '1') {
                return 'succuess';
            }
        } else {

            return "exist";
        }
    }

    public function contacttohostmsg() {

        if ($this->property_id != "") {
            $dy.="( b.property_id='$this->property_id') And";
        }
        $S = "SELECT a.*,b.* FROM arib_contact_to_host_tbl a LEFT JOIN  arib_property_tbl b ON a.property_id=b.property_id where $dy b.added_by='$this->host_id' AND b.admin_status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function contactmsg() {


        $S = "SELECT message FROM arib_contact_to_host_tbl where contact_id='$this->contact_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function viewaddedreview() {

        $select_query = "SELECT * FROM  arib_add_review_tbl WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function selectguestsdeatils() {
        $RES = "invalid";
        $query = "SELECT a.*,b.* FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->guest_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function addwishlistcategory() {

        $S4 = "INSERT INTO  arib_wishist_category_tbl(wishlist_category_name,guest_id)VALUES('$this->wishlist_category_name','$this->guest_id')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES33 = $ObjDB->ExecuteQuery();
        $lastinsert_id = $ObjDB->getGenratedId();
        if ($RES33 == '1') {
            return 'succuess' . '*' . $lastinsert_id;
        }
    }

    public function fetchwishlistcategory() {
        $select_query = "SELECT * FROM arib_wishist_category_tbl WHERE guest_id ='$this->guest_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function addwishlist() {

        $select_query = "DELETE FROM  arib_wishist_tbl WHERE guest_id='$this->guest_id' AND property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
//        

        $S4 = "INSERT INTO  arib_wishist_tbl(wishist_category_id,guest_id,property_id)VALUES('$this->wishist_category_id','$this->guest_id','$this->property_id')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S4;
        $RES33 = $ObjDB->ExecuteQuery();
        if ($RES33 == '1') {
            return 'succuess';
        }
    }

    public function fetchwishlist() {
        $select_query = "SELECT wishist_category_id  FROM arib_wishist_tbl WHERE guest_id ='$this->guest_id' and property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function deletewishlistcategory() {

        $select_query = "DELETE FROM  arib_wishist_category_tbl WHERE guest_id='$this->guest_id' AND wishlist_category_id='$this->wishist_category_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES33 = $ObjDB->ExecuteQuery();
        if ($RES33 == '1') {
            return 'succuess';
        }
    }

    public function allreadybookedproperty() {
        $current_date = $this->current_date;
        $dy.=" ((check_in <= '$current_date' and check_out >= '$current_date')) And";
        $INS = "SELECT * FROM  arib_booking_tbl WHERE $dy property_id='$this->property_id' and  status='1' ";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->SelectQuery();
        return $R;
    }

    public function SelectPropertyByHost() {
        
        $select_query = "SELECT  * FROM arib_property_tbl WHERE added_by='$this->host_id' and user_type='HO'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }
    public function AllowedAddPropertyToHost() {
        
        $select_query = "SELECT  * FROM arib_login_tbl WHERE user_id='$this->host_id' and user_type='HO'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }
    public function getcheckincheckoutdate() {
        
        $select_query = "SELECT  * FROM  arib_space_tbl WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }
    public function getbookingdate() {
        
        $select_query = "SELECT  check_in,check_out FROM   arib_booking_tbl WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

}
?>


