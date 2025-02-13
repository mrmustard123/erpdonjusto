<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpLeo 
 * File: movement.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
 */




/**

 * @ORM\Entity

 * @ORM\Table(name="movement")

 */


class Movement{


    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $mov_id; /* bigint(20) NOT NULL AUTO_INCREMENT, */
    /** @ORM\Column(length=10, nullable=false) */
    public $mov_type; /*char(10) NOT NULL DEFAULT 'SALIDA', */
    /** @ORM\Column(type="datetime", nullable=false) */
    public $mov_date; /*datetime NOT NULL, */
    /** @ORM\Column(type="decimal", nullable=false) */    
    public $mov_cant; /*int(11) NOT NULL DEFAULT '1', */
    /** @ORM\Column(length=15, nullable=false) */
    public $mov_lot; /*char(15) DEFAULT NULL, */
    /** @ORM\Column(type="integer", nullable=false) */
    public $product_id; /* tinyint(4) DEFAULT NULL, */
    /** @ORM\Column(length=400, nullable=true) */
    public $comments; /*varchar(400) DEFAULT NULL */
    /** @ORM\Column(type="integer", nullable=true) */
    public $user_id; /* `user_id` tinyint(3) unsigned DEFAULT NULL, */
    /** @ORM\Column(length=15, nullable=true) */
    public $reason;
    
    
    
    function getMov_id() {
        return $this->mov_id;
    }

    function getMov_type() {
        return $this->mov_type;
    }

    function getMov_date() {
        return $this->mov_date;
    }

    function getMov_cant() {
        return $this->mov_cant;
    }

    function getMov_lot() {
        return $this->mov_lot;
    }

    function getProduct_id() {
        return $this->product_id;
    }
    
    function getComments(){
        return $this->comments;
    }
    
    function getUser_id() {
        return $this->user_id;
    }    
    
    function getReason(){
        return $this->reason;
    }

    function setMov_id($mov_id) {
        $this->mov_id = $mov_id;
    }

    function setMov_type($mov_type) {
        $this->mov_type = $mov_type;
    }

    function setMov_date($mov_date) {
        $this->mov_date = $mov_date;
    }

    function setMov_cant($mov_cant) {
        $this->mov_cant = $mov_cant;
    }

    function setMov_lot($mov_lot) {
        $this->mov_lot = $mov_lot;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }
    
    function setComments($comments){
        $this->comments = $comments;
    }
    
    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }  
    
    function setReason($reason){
        $this->reason = $reason;
    }

     
}
?>