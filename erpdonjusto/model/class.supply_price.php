<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpDonJusto 
 * File: supply_price.php
 * Created on: Dec 8, 2018
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

* @ORM\Entity

* @ORM\Table(name="supply_price")

*/


class SupplyPrice{
    
    
     /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $supply_price_id;
    
    /** @ORM\balance @ORM\Column(type="decimal", nullable=false) */
    public $value;
    /** @ORM\Column(type="datetime", nullable=false) */
    public $start_date;
    /** @ORM\Column(length=400, nullable=true) */
    public $comments; 
    /** @ORM\supplys_id @ORM\Column(type="integer", nullable=true) */
    public $supply_id;
    
    function getSupply_price_id() {
        return $this->supply_price_id;
    }

    function getValue() {
        return $this->value;
    }

    function getStart_date() {
        return $this->start_date;
    }

    function getComments() {
        return $this->comments;
    }
    
    
    function getSupply_id() {
        return $this->supply_id;
    }    

    function setSupply_price_id($supply_price_id) {
        $this->supply_price_id = $supply_price_id;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function setStart_date($start_date) {
        $this->start_date = $start_date;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function setSupply_id($supply_id) {
        $this->supply_id = $supply_id;
    }    
    

  
}



?>