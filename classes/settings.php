<?php

error_reporting(E_ERROR | E_PARSE);
/* Remove default timezone before deploying the application */

date_default_timezone_set("Asia/Kolkata");

class class_settings {
    /*     * *******database connection****** */

    public $dbserver = "us-cdbr-iron-east-03.cleardb.net"; //'localhost';//
    public $dbname = "heroku_da1971818adbbc2"; //' aldridgefamily_db';//
    public $dbuser = "be51e68d3ef796"; //'root';//
    public $dbpassword = "3b84d624"; //'root';//
    public $connect = null;
    public $db = null;
    public $siteurl = 'sheltered-plains-20417.herokuapp.com';
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