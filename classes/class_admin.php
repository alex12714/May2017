<?php

include_once 'class_db.php';

class class_admin {

    //-------------user login------------//

    public $first_name = null;
    public $last_name = null;
    public $email = null;
    public $password = null;
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
//     public $longitude = null;
//    public $latitude = null;
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
//     public $description = null;
//     public $phone_number = null;
//    
    //**********************category**************//
    public $category_name = null;

    public function Login() {
        $RES = "invalid";
        $add_date = date("Y-m-d H:i:s");

        $query = "SELECT * FROM  arib_login_tbl WHERE email='$this->email' AND password='$this->password'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();

        return $RES;
    }

//****************select host list**********//

    public function hostlist() {
        $RES = "invalid";
        $add_date = date("Y-m-d H:i:s");

        $query = "SELECT a.*,b.* FROM  arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id WHERE a.status='1' and user_type='HO' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();

        return $RES;
    }

    public function guestlist() {
        $RES = "invalid";
        $add_date = date("Y-m-d H:i:s");

        $query = "SELECT a.*,b.* FROM  arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id WHERE a.status='1' and user_type='GU' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();

        return $RES;
    }

    //******************view host details**************//
    public function selecthostdeatils() {
        $RES = "invalid";
        $query = "SELECT a.*,b.* FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->host_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function Insertcategory() {
        $insertimage = "INSERT INTO arib_category_tbl (added_by,category_name) VALUES('$this->admin','$this->category_name')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $insertimage;
        $RES4 = $ObjDB->ExecuteQuery();
        if ($RES4 == '1') {
            return "success";
        }
    }

    //************************Selelct category*************//
    public function Selectcategory() {
        $INS = "SELECT * FROM arib_category_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    public function Selectcategoryforedit() {
        $INS = "SELECT * FROM arib_category_tbl WHERE category_id='$this->edit_id' and status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    //********************UPDATE CATEGORY************
    public function Updatecategory() {
        $INS = "UPDATE arib_category_tbl SET  	category_name='$this->category_name' WHERE category_id='$this->edit_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        if ($R == '1') {
            return "success";
        }
    }

    //********************Delete CATEGORY************
    public function Deletecategory() {
        $Del1 = "UPDATE arib_category_tbl SET  	status='2' WHERE category_id='$this->category_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    //************************Start Add propertytype*************//

    public function Insertpropertytype() {
        $insertimage = "INSERT INTO arib_property_type_tbl (property_type) VALUES('$this->property_type')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $insertimage;
        $RES5 = $ObjDB->ExecuteQuery();
        if ($RES5 == '1') {
            return "success";
        }
    }

    //************************Selelct propertytype*************//
    public function Selectpropertytype() {
        $INS = "SELECT * FROM arib_property_type_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    //********************Delete propertytype************
    public function Deletepropertytype() {
        $Del1 = "UPDATE arib_property_type_tbl SET  status='2' WHERE property_type_id='$this->property_type_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    public function Selectpropertytypeforedit() {
        $INS = "SELECT * FROM arib_property_type_tbl WHERE property_type_id='$this->edit_id' and status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R6 = $ObjDB->ExecuteQuery();
        return $R6;
    }

    public function Updatepropertytype() {
        $INS = "UPDATE arib_property_type_tbl SET property_type='$this->property_type' WHERE property_type_id='$this->edit_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        if ($R == '1') {
            return "success";
        }
    }

    //************************Start Add amenities*************//

    public function Insertamenities() {
        $insertimage = "INSERT INTO airb_amenities_tbl (amenities) VALUES('$this->amenities')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $insertimage;
        $RES5 = $ObjDB->ExecuteQuery();
        if ($RES5 == '1') {
            return "success";
        }
    }

    //************************Selelct amenities*************//
    public function Selectamenities() {
        $INS = "SELECT * FROM airb_amenities_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    public function SelectTestimonials() {
        $INS = "SELECT * FROM  arib_testimonials_tbl WHERE status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    //********************Delete amenities************
    public function Deleteamenities() {
        $Del1 = "UPDATE airb_amenities_tbl SET  status='2' WHERE amenti_id='$this->amenti_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    public function Selectamenitiesforedit() {
        $INS = "SELECT * FROM airb_amenities_tbl WHERE amenti_id='$this->edit_id' and status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R6 = $ObjDB->ExecuteQuery();
        return $R6;
    }

    public function Updateamenities() {
        $INS = "UPDATE airb_amenities_tbl SET amenities='$this->amenities' WHERE amenti_id='$this->edit_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        if ($R == '1') {
            return "success";
        }
    }

    public function fetchnumberofproperty() {
        $INS = "SELECT * FROM arib_property_tbl where admin_status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    public function fetchnumberofhost() {
        $INS = "SELECT * FROM arib_login_tbl WHERE user_type='HO' AND   status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R2 = $ObjDB->ExecuteQuery();
        return $R2;
    }

    public function fetchnumberofguest() {
        $INS = "SELECT * FROM arib_login_tbl WHERE user_type='GU' AND   status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R2 = $ObjDB->ExecuteQuery();
        return $R2;
    }

    public function fetchnumberofpropertyforcount() {
        $INS = "SELECT * FROM arib_property_tbl where added_by='$this->host_id' AND admin_status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }

    public function selectpropertylist() {

        if ($this->host_id == 'allproperty') {
            $RES = "invalid";
            $query = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE  a.admin_status='1' group by a.property_id ORDER BY a.property_id DESC";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $query;
            $RES = $ObjDB->SelectQuery();
            return $RES;
        } else {
            $RES = "invalid";
            $query = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE a.added_by='$this->host_id' AND a.admin_status='1'  group by a.property_id ORDER BY a.property_id DESC";
            $ObjDB = new class_db();
            $ObjDB->sproc_name = $query;
            $RES = $ObjDB->SelectQuery();
            return $RES;
        }
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

    public function getpropertyimage() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_property_images_tbl WHERE property_id='$this->property_id' AND status='1'";
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

    public function getstate() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_state_tbl where state_id='$this->state_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    //********************Delete CATEGORY using admin_status ************
    public function deleteproperty() {
        $Del1 = "UPDATE  arib_property_tbl SET admin_status='2' WHERE property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    public function InsertTestimonials() {
        $add_date = date("Y-m-d");
        $inserttestimonials = "INSERT INTO arib_testimonials_tbl(title,description,logo_image,add_date) VALUES('$this->title','$this->description','$this->logo_img','$add_date')";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $inserttestimonials;
        $RES4 = $ObjDB->ExecuteQuery();
        if ($RES4 == '1') {
            return "success";
        }
    }

    public function UpdateTestimonials() {
        $INS = "UPDATE arib_testimonials_tbl SET title='$this->title',description='$this->description',logo_image='$this->logo_img' WHERE testimonials_id='$this->edit_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        if ($R == '1') {
            return "success";
        }
    }

    public function DeleteTestimonials() {
        $Del1 = "DELETE FROM arib_testimonials_tbl  WHERE testimonials_id='$this->testimonials_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    public function Selectatestimonialsforedit() {
        $INS = "SELECT * FROM arib_testimonials_tbl WHERE testimonials_id='$this->edit_id' and status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R6 = $ObjDB->ExecuteQuery();
        return $R6;
    }

    //********************Delete CATEGORY************
    public function limitofaddproperties() {
        $Del1 = "UPDATE  arib_login_tbl SET total_number_of_property='$this->total_number_of_property' WHERE user_id='$this->host_id_for_limit'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $Del1;
        $R1 = $ObjDB->ExecuteQuery();
        if ($R1 == '1') {
            return "succuess";
        }
    }

    // rented property list

    public function RentedPropertyList() {


//        $todaydate = date("Y-m-d");
//
        if ($this->check_in != "" && $this->check_out != "") {

            $dy.=" (e.check_in >= '$this->check_in' AND  e.check_out <= '$this->check_out') AND";
        } 
//        
//        else {
//            $dy.= "DATE(e.check_in) >= '$todaydate' OR  DATE(e.check_out) >= '$todaydate'";
//        }
        
        $RES = "invalid";
        $query = "SELECT a.*,b.*,c.*,d.*,e.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id LEFT JOIN arib_booking_tbl e ON d.property_id=e.property_id WHERE  $dy  a.admin_status='1'  group by e.property_id  ORDER BY e.check_in Asc";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    
    public function selectrendtedcheckingdeatils() {


//        $todaydate = date("Y-m-d");
//
//        if ($this->check_in != "" && $this->check_out != "") {
//
//            $dy.=" (e.check_in <= '$this->check_in' AND e.check_out >= '$this->check_out')";
//        } 
//        else {
//            $dy.= "DATE(e.check_in) >= '$todaydate' OR  DATE(e.check_out) >= '$todaydate'";
//        }
        
        $RES = "invalid";
        $query = "SELECT * from arib_booking_tbl   WHERE   property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }
    
}
?>


