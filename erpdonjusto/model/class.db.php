<?php    /*echo 'estoy * en class.db.php <br>';*/  
error_reporting(1);
class db    {        
    
    
    public  $link;   
    
    function __construct() {
        $this->link=null;
    }
    
    function db(){
        $this->link=null;                      
        
    }        
    
    function getDb_name(){
        return $this->db_name;        }

    function getServer_name(){            
        return $this->server_name;        
        
    }        
    function getUser(){
        return $this->user;        
        
    }      
    
    function getPassword(){
        return $this->password;        
        
    }        
    
    function setDb_name($db_name){
        $this->db_name = $db_name;        
        
    }        
    
    function setServer_name($server_name){
        $this->server_name = $server_name;        
        
    }        
    
    function setUser($user){
        $this->user = $user;        
        
    }        
    
    function setPassword($password){
        $this->password = $password;        }

    public function connect(){
        
        $this->link = mysqli_connect($this->getServer_name(),$this->getUser() ,$this->getPassword()) or die(mysqli_error($this->link)) ;       
        mysqli_select_db ($this->link , $this->getDb_name()) or die(mysqli_error($this->link));
        return $this->link;          
        
    }   
    
    public function query($sql){        
        /*mysql_set_charset('utf-8');*/            
        $res = mysqli_query($this->link, $sql)or die(mysqli_error($this->link));
        return $res;                
        
    }    
    
    
}/*end class db*/        /*echo 'End class.db.php<br>';*/?>