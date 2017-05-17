<?php

error_reporting(E_ERROR | E_PARSE);
/* Remove default timezone before deploying the application */

date_default_timezone_set("Asia/Kolkata");

class class_settings {
    /*     * *******database connection****** */

    public $dbserver = "localhost"; //'localhost';//
    public $dbname = "airbnb"; //' aldridgefamily_db';//
    public $dbuser = "airbnb"; //'root';//
    public $dbpassword = "Monday123"; //'root';//
    public $connect = null;
    public $db = null;
    public $siteurl = 'airbnb.lanos.co.uk';
    public $siteadmin = "user2@sritechnocrat.com";
   
     

    public function MyConnectDB() {
        $this->connect = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword, $this->dbname);
        return $this->connect;
    }

    public function MyDisConnectDB() {
        mysqli_close($this->connect);
    }

}

?>