<?php

include_once 'class_db.php';

class class_search {

    public function serachproperty() {

        if ($this->search_text != "") {
            $latitude = $this->latitude;
            $longitude = $this->longitude;
            $search_radius = 10;
// earth's radius in km = ~6371
            $radius = 6371;
// latitude boundaries
            $max_lat = $latitude + rad2deg($search_radius / $radius);
            $min_lat = $latitude - rad2deg($search_radius / $radius);
// longitude boundaries (longitude gets smaller when latitude increases)
            $max_lon = $longitude + rad2deg($search_radius / $radius / cos(deg2rad($latitude)));
            $min_lon = $longitude - rad2deg($search_radius / $radius / cos(deg2rad($latitude)));

            if ($max_lat != "" && $min_lat != "") {

                $dy.=" (latitude BETWEEN '$min_lat' AND '$max_lat') And";
            }
            if ($min_lon != "" && $max_lon != "") {

                $dy.=" (longitude BETWEEN '$min_lon' AND '$max_lon') And";
            }
        }
//        if ($this->check_in != "") {
//            $dy .= "  (b.check_in='$this->check_in')AND ";
//        }
//        if ($this->check_out != "") {
//            $dy .= " (b.check_out='$this->check_out') AND  ";
//        }
        $current_date = date("Y-m-d");
        if ($this->check_in != "" && $this->check_out != "") {
//
            $dy.=" (b.check_in <= '$this->check_in' AND b.check_out >= '$this->check_out') And";
//            $dy.=" (b.check_in BETWEEN '$this->check_in' AND '$this->check_in') and ";
//            $dy.= "  ( b.check_out BETWEEN '$this->check_out' AND $this->check_out) And";
//            $dy.=" (b.check_in <= $this->check_in AND $this->check_out >= b.check_out) And";
//            $dy.=" ((b.check_in BETWEEN '$this->check_in' AND '$this->check_out') OR (b.check_out BETWEEN '$this->check_out' AND '$this->check_in')) And";
        } else {
            $dy.=" (b.check_out >= '$current_date') And";
        }

        $RES = "invalid";
        $qaa = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE $dy a.added_status='1' AND a.admin_status='1' group by a.property_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function fetchpropertyimages() {
        $RES_img = "invalid";
        $image_query = "SELECT image_name FROM arib_property_images_tbl where  property_id='$this->property_id' and status='1' order by image_id ASC";
        $ObjDB_img = new class_db();
        $ObjDB_img->sproc_name = $image_query;
        $RES_img = $ObjDB_img->SelectQuery();
        return $RES_img;
    }

    public function advanceserachproperty() {


        if ($this->search_text != "") {
            $latitude = $this->latitude;
            $longitude = $this->longitude;
            $search_radius = 10;
// earth's radius in km = ~6371
            $radius = 6371;
// latitude boundaries
            $max_lat = $latitude + rad2deg($search_radius / $radius);
            $min_lat = $latitude - rad2deg($search_radius / $radius);
// longitude boundaries (longitude gets smaller when latitude increases)
            $max_lon = $longitude + rad2deg($search_radius / $radius / cos(deg2rad($latitude)));
            $min_lon = $longitude - rad2deg($search_radius / $radius / cos(deg2rad($latitude)));

            if ($max_lat != "" && $min_lat != "") {

                $dy.=" (c.latitude BETWEEN '$min_lat' AND '$max_lat') And";
            }
            if ($min_lon != "" && $max_lon != "") {

                $dy.=" (c.longitude BETWEEN '$min_lon' AND '$max_lon') And";
            }
        }


        $current_date = date("Y-m-d");
        if ($this->check_in != "" && $this->check_out != "") {

            $dy.=" (b.check_in <= '$this->check_in' AND b.check_out >= '$this->check_out') And";
        } else {
            $dy.=" (b.check_in >= '$current_date' OR  b.check_out >= '$current_date') And";
        }


        $room_type = implode(',', $this->room_type);
        if ($room_type != "") {
            $dy .= " (b.room_type IN ($room_type) )AND  ";
        }

        $minprice = $this->minprice;
        $maxprice = $this->maxprice;

        if ($minprice != "" && $maxprice != "") {

            $dy.=" (d.property_price BETWEEN $minprice AND $maxprice) And";
        }
        if ($minprice != "" && $maxprice == "") {

            $dy.=" (d.property_price <=$minprice) And";
        }
        if ($minprice == "" && $maxprice != "") {

            $dy.=" (d.property_price <=$maxprice) And";
        }




        $RES = "invalid";
        $query = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE $dy a.added_status='1' and a.admin_status='1' group by a.property_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function recentaddedproperty() {


        $RES = "invalid";
        $qaa = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id WHERE a.added_status='1' AND a.admin_status='1'  GROUP BY a.property_id ORDER BY a.timesatmp DESC";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function popularaddedproperty() {

        $current_date = $this->current_date;
        $previousthreemonth = $this->previousthreemonth;

        if ($current_date != "" && $previousthreemonth != "") {
//           $dy.=" And (DATE(e.timestamp) BETWEEN $current_date AND $previousthreemonth)";
//           $dy.=" And (DATE(e.timestamp) BETWEEN '2016-10-06 12:10:47' AND 2016-10-07 17:24:35)";

            $dy.=" And (((date(e.timestamp) <= '$current_date' ) and (date(e.timestamp) >= '$previousthreemonth')))";
        }

        $RES = "invalid";
        $qaa = "SELECT a.*,b.*,c.*,d.* FROM arib_property_tbl a LEFT JOIN arib_space_tbl b ON a.property_id=b.property_id LEFT JOIN arib_property_address_tbl c ON b.property_id=c.property_id LEFT JOIN  arib_property_price_tbl d ON c.property_id=d.property_id LEFT JOIN arib_booking_tbl e ON d.property_id=e.property_id WHERE  a.added_status='1' AND a.admin_status='1' $dy  GROUP BY a.property_id ORDER BY e.timestamp DESC";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function wishlistproperty() {
        $RES = "invalid";
        $qaa = "SELECT * FROM arib_wishist_tbl WHERE guest_id='$this->guest_id'  group by wishist_category_id";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function wishlistcategory() {
        $RES = "invalid";
        $qaa = "SELECT * FROM  arib_wishist_category_tbl WHERE guest_id='$this->guest_id' and  status='1' ";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function wishlistpropertydeatils() {


        $RES = "invalid";
        $qaa = "SELECT a.*,b.* FROM arib_property_tbl a LEFT JOIN arib_wishist_tbl b ON a.property_id=b.property_id  WHERE b.guest_id='$this->guest_id' AND wishist_category_id='$this->wishist_category_id' AND a.added_status='1' AND a.admin_status='1'  GROUP BY a.property_id ORDER BY a.timesatmp DESC";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $qaa;
        $RES = $ObjDB->SelectQuery();
        return $RES;
    }

    public function removewishlistproperty() {
        $select_query = "DELETE FROM  arib_wishist_tbl WHERE guest_id='$this->guest_id' AND property_id='$this->property_id'";
        $ObjDB = new class_db();
        $ObjDB->sproc_name = $select_query;
        $RES = $ObjDB->SelectQuery();
        return $RES;
        if ($RES == '1') {
            return 'succuess';
        }
    }

    

}
