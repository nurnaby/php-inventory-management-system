<?php

class Database{
    private $can;
    public function connect(){
        include_once("constants.php");
        $this->can =new Mysqli(HOST,USER,PASS,DB);
        if($this->can){
            // echo"connected";
            return $this->can;
        }
        return "DATABASE_CONECTION_FAIL";
    }
}

// $db =new Database();
// $db->connect();


?>