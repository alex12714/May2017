<?php
include_once 'settings.php';
class class_db {

    //put your code here
    public $sproc_name;
    public $param_array = array();
    private $connect;
    private $numrows;

    //----------------------to select all---------------------//
    public function SelectQuery() {
        $OBJCONNECT = new class_settings();
        $connect = $OBJCONNECT->MyConnectDB();
        $result = mysqli_query($connect, $this->sproc_name) or die(mysqli_error($connect));       
        if (!empty($result) && $result != null ) {
            $this->numrows = mysqli_num_rows($result);
        }
        else {         
            $this->numrows = 0;
        }
        $OBJCONNECT->MyDisConnectDB();
        return $result;
    }

    //------------------for insert,update,delete------------------//
    
    public function ExecuteQuery() {
        $OBJCONNECT = new class_settings();
        $connect = $OBJCONNECT->MyConnectDB();
        $result = mysqli_query($connect, $this->sproc_name) or die(mysqli_error($connect));
        $this->genrate_id = mysqli_insert_id($connect);
        $OBJCONNECT->MyDisConnectDB();
        return $result;
    }

    //------------------to get number of rows----------------------//
    public function getNumRows() {
        return $this->numrows;
    }
    //--------------------to generate id--------------------------//
    public function getGenratedId() {
        return $this->genrate_id;
    }

}

?>
