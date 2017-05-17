<?php

class common {

    public static function StrToDB($str) {
        $str = str_replace("'", "&#39;", $str);
        $str = str_replace('"', "&#34;", $str);
        $str = str_replace("\n", "&#nl", $str);
        $str = str_replace("\r", "&#rl", $str);

        return $str;
    }

    public static function StrFromDb($str) {
        $str = str_replace("&#39;", "'", $str);
        $str = str_replace("&#34;", '"', $str);
        $str = str_replace("&#nl", "\n", $str);
        $str = str_replace("&#rl", "\r", $str);

        return $str;
    }

    public function uniqueid($ct) {
        $code = '';
        $data = '';
        srand((double) microtime() * 1000000);
        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
//        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
//        $data .= "0FGH45OP89";
        for ($i = 0; $i < $ct; $i++) {
            $code .= substr($data, (rand() % (strlen($data))), 1);
        }
        return $code;
    }

    public function GetID($newtitle,$type) {
        $ID = "";
        switch ($type) {
            case "booking":
                $ID = 'B'.$newtitle . date('ymdhis');
                break;
          }
        return $ID;
    }

    public function DeleteImage($type, $file_name) {
        switch ($type) {
            case "pro":
                $img_dirlarge = "prodimg/";
                break;
            case "bra":
                $img_dirlarge = "brandimg/";
                break;
            case "prf":
                $img_dirlarge = "profimgimg/";
                break;
        }
        unlink($img_dirlarge . $file_name);
        unlink($img_dirlarge . "s_" . $file_name);
        return "ok";
    }

    public function CreateThumb($type, $file_name) {
        //PRF - profile, PRO-product,BRA-brand
        switch ($type) {
            case "pro":
                $img_dirlarge = "prodimg/";
                break;
            case "bra":
                $img_dirlarge = "brandimg/";
                break;
            case "prf":
                $img_dirlarge = "profimgimg/";
                break;
        }
//Clean the Filename
        $img = explode('.', $file_name);
//Thumbnail file
        $image_filePath = $img_dirlarge . $file_name; //$_FILES['imageSource']['tmp_name'];
//Rename the thumbnail Image
        $krowAvatar = "s_" . $img[0] . "." . $img[1];
        $img_thumbLarge = $img_dirlarge . $krowAvatar;
//String lower case
        $extension = strtolower($img[1]);
//Check the file format before upload
        if (in_array($extension, array('jpg', 'jpeg', 'gif', 'png', 'bmp'))) {
            //Find the height and width of the image
            list($gotwidth, $gotheight, $gottype, $gotattr) = getimagesize($image_filePath);
            //Find the image type
            //---------- To create thumbnail of image---------------
            if ($extension == "jpg" || $extension == "jpeg") {
                $src = imagecreatefromjpeg($image_filePath);
            } else if ($extension == "png") {
                $src = imagecreatefrompng($image_filePath);
            } else {
                $src = imagecreatefromgif($image_filePath);
            }
            //Get the height and width of uploaded image
            list($width, $height) = getimagesize($image_filePath);

// ----------------------------------------------------
            //Set new width for image
            $newwidthLarge = 50;

            //Set new height for image
            // $newheightLarge=160;
            // or Calculate and scale it proportanly
            $newheightLarge = round(($height * $newwidthLarge) / $height);

// ----------------------------------------------------
            //Creating the thumbnail from true color
            $tmp = imagecreatetruecolor($newwidthLarge, $newheightLarge);
            //Enable image interlace property
            imageinterlace($tmp, 1);
            //Create a image with given dimension
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidthLarge, $newheightLarge, $width, $height);
            //Put the image data to newly created Image
            $createImageSave = imagejpeg($tmp, $img_thumbLarge, 100);
        }
        return $file_name;
    }

    //put your code here

    public function country() {
        $query = "SELECT * FROM pro_country_tbl";
        $object = new class_db();
        $object->sproc_name = $query;
        $res_country = $object->SelectQuery();
        return $res_country;
    }

    public function humanTiming($time) {
        $time = time() - $time; // to get the time since that moment
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit)
                continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }

    function IND_money_format($money) {
        $len = strlen($money);
        $m = '';
        $money = strrev($money);
        for ($i = 0; $i < $len; $i++) {
            if (( $i == 3 || ($i > 3 && ($i - 1) % 2 == 0) ) && $i != $len) {
                $m .=',';
            }
            $m .=$money[$i];
        }
        return strrev($m);
    }

}

?>
