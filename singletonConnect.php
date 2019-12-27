<?php 

class singletonConnect{
    private $hostname = "localhost",
            $username = "root",
            $password = "",
            $database = "ai_wisata";
    
    private $connect;
    private static $allow = null;
    public $db;
    private function __construct(){
        $this->connect = new mysqli($this->hostname,$this->username,$this->password,$this->database);
        $this->db = self::dba();
    }
    
    public function connect(){
        if(!self::$allow){//not null
            self::$allow = new singletonConnect();
        }
        return self::$allow;
    }
    public function dba(){
        return $this->connect;
    }
}

?>