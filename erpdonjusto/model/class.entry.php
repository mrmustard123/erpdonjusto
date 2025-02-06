<?php    
/*echo 'Estoy en class.entry.php<br>';*/         
/**     * @Entity     * @Table(name="entry")     */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="entry")
 */
class Entry {
    /** @ORM\Id @ORM\Column(type="bigint") @ORM\GeneratedValue */
    public $entry_id; /* bigint(20) unsigned NOT NULL AUTO_INCREMENT, */
    
    /** @ORM\Column(type="datetime", nullable=false) */
    public $entry_date; /* datetime NOT NULL, */
    
    /** @ORM\Column(length=500, nullable=true) */
    public $details; /* varchar(500) DEFAULT NULL, */
    
    /** @ORM\Column(type="decimal", nullable=false) */
    public $balance; /* decimal NOT NULL DEFAULT '0', */
    
    /** @ORM\Column(type="bigint", nullable=false) */
    public $account_id; /* bigint(20) unsigned NOT NULL, */
    
    /** @ORM\Column(type="integer", nullable=true) */
    public $user_id; /* tinyint(3) unsigned default NULL, */
    
    /** @ORM\Column(length=30, nullable=true) */
    public $cbte_cont_tipo; /* cbte_cont_tipo char(10) NULL DEFAULT NULL AFTER fk_entry_id, */
    
    /** @ORM\Column(length=30, nullable=true) */
    public $cbte_cont_nro; /* cbte_cont_nro varchar(15) NULL DEFAULT NULL AFTER cbte_cont_tipo; */

  
    
/*GETTERS AND SETTERS*/    
    function getEntry_id() {            
        return $this->entry_id;        
        
    }        
    function getEntry_date() {            
        return $this->entry_date;        
        
    }        
    function getDetails() {            
        return $this->details;        
        
    }        
    function getBalance() {            
        return $this->balance;        
        
    }        
    function getAccount_id() {            
        return $this->account_id;        
        
    }                
    function getUser_id() {            
        return $this->user_id;        
        
    }                            
    /*function getFk_entry_id(){            return $this->fk_entry_id;        }*/ 
    function getCbte_cont_tipo(){            
        return $this->cbte_cont_tipo;        
        
    }                        
    function getCbte_cont_nro(){            
        return $this->cbte_cont_nro;        
        
    }        
    function setEntry_id($entry_id) {            
        $this->entry_id = $entry_id;        
        
    }        
    function setEntry_date($entry_date) {            
        $this->entry_date = $entry_date;        
        
    }        
    function setDetails($details) {            
        $this->details = $details;        
        
    }        
    function setBalance($balance) {            
        $this->balance = $balance;        
        
    }        
    function setAccount_id($account_id) {            
        $this->account_id = $account_id;        
        
    }                    
    function setUser_id($user_id) {            
        $this->user_id = $user_id;        
        
    }              
    /*        function setFk_entry_id($fk_entry_id){            $this->fk_entry_id = $fk_entry_id;        }*/                      
    function setCbte_cont_tipo($cbte_cont_tipo){            
        $this->cbte_cont_tipo = $cbte_cont_tipo;        
        
    }                
    function setCbte_cont_nro($cbte_cont_nro){            
        $this->cbte_cont_nro = $cbte_cont_nro;       
    }                              
    
}    /*echo 'End class.entry.php<br>';*/        
    
    
?>    