<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpDonJusto 
 * File: price.php
 * Created on: Jun 29, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



/**

* @ORM\Entity

* @ORM\Table(name="product_price")

*/


class ProductPrice{
    
    
     /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $prod_price_id;
    
    /** @ORM\Column(type="decimal", nullable=false) */
    public $value;
    /** @ORM\Column(type="datetime", nullable=false) */
    public $start_date;
    /** @ORM\Column(length=400, nullable=true) */
    public $comments; 
    /** @ORM\Column(type="integer", nullable=true) */
    public $product_id;
    
    function getProduct_price_id() {
        return $this->prod_price_id;
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
    
    
    function getProduct_id() {
        return $this->product_id;
    }    

    function setProduct_price_id($product_price_id) {
        $this->product_price_id = $product_price_id;
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

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }    
    

  
}

?>