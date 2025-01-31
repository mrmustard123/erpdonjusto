<?php/** * @Entity * @Table(name="dolar_price") */

class DolarPrice{            
    /** @Id @Column(type="bigint") @GeneratedValue */      
    public $dolar_price_id; /*int(10) unsigned NOT NULL AUTO_INCREMENT, */    
    /** @Column(type="date", nullable=false) */    
    public $change_date; /*date NOT NULL, */    
    /** @balance @Column(type="decimal", nullable=false) */    
    public $value; /*float NOT NULL DEFAULT '0', */    
    /** @Column(length=500, nullable=true) */    
    public $comment; /*varchar(500) DEFAULT NULL,       */        
    function getDolar_price_id() {        
        return $this->dolar_price_id;    
        
    }    
    
    function getChange_date() {        
        return $this->change_date;    
        
    }    
    
    function getValue() {        
        return $this->value;    
        
    }    
    
    function getComment() {        
        return $this->comment;    
        
    }    
    
    function setDolar_price_id($dolar_price_id) {        
        $this->dolar_price_id = $dolar_price_id;    
        
    }    
    
    function setChange_date($change_date) {        
        $this->change_date = $change_date;    
        
    }    
    
    function setValue($value) {        
        $this->value = $value;    
        
    }    
    
    function setComment($comment) {        
        $this->comment = $comment;    }                 
        
    }
    
    
    ?>