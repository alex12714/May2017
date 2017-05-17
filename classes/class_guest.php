<?php

include_once 'class_db.php';

class class_guest {

    //-------------user login------------//
    public $first_name = null;
    public $last_name = null;
    public $gender = null;
    public $dob = null;
    public $phone_number = null;
    public $alternate_number = null;
    public $whereyoulive = null;
    public $guest_id = null;
    public $logo_img = null;

//     public $description = null;
//     public $phone_number = null;
//     public function hostregister() {
//****************select email**********//

    public function emailcheck() {
        $RES = "invalid";
        $query = "SELECT * FROM arib_login_tbl WHERE user_id!='$this->guest_id'  And  email='$this->email' AND status='1'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $R = $ObjDB->SelectQuery();
        return $R;
    }

    ///////***************select guest deatils**********************//


    public function selecthostdeatils() {
        $RES = "invalid";
        $query = "SELECT a.*,b.* FROM arib_login_tbl a LEFT JOIN arib_register_tbl b ON a.user_id=b.user_id  Where  a.user_id='$this->guest_id' AND a.status='1' group by a.user_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    //*********************update Guest Deatils******************//


    public function updatehostprofile() {

        $A = "UPDATE arib_login_tbl SET firstname='$this->first_name',email='$this->email' where user_id='$this->guest_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $A;
        $A11 = $ObjDB->ExecuteQuery();

        $B = "UPDATE arib_register_tbl SET last_name='$this->last_name',gender='$this->gender',dob='$this->dob',phone_number='$this->phone_number',alternate_number='$this->alternate_number',whereyoulive='$this->whereyoulive',description='$this->description',logo_img='$this->logo_img' where user_id='$this->guest_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $B;
        $B22 = $ObjDB->ExecuteQuery();
        if ($A11 == '1' || $B22 == '1') {
            return 'succuess';
        }
    }

   
    //***********************booking request list****************//

    public function BookingsRequestList() {
        if ($this->today_date != "" && $this->endofweekdate != "") {
            $dy.=" (a.check_in >= '$this->today_date' AND a.check_out <= '$this->endofweekdate') And";
        } else if ($this->check_in != "" && $this->check_out != "") {
//
            $dy.=" (a.check_in >= '$this->check_in' AND a.check_out <= '$this->check_out') And";
//          
        }
        if ($this->property_id != "") {
            $dy.=" (a.property_id = '$this->property_id') And";
        }


        $S = "SELECT a.*,b.* FROM arib_booking_tbl a LEFT JOIN  arib_property_tbl b ON a.property_id=b.property_id where $dy  a.user_id='$this->guest_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $S;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }
    public function SelectTestimonials() {
        $INS = "SELECT * FROM  arib_testimonials_tbl WHERE status='1' order by testimonials_id desc limit 0,10";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $INS;
        $R = $ObjDB->ExecuteQuery();
        return $R;
    }
    

}
?>


