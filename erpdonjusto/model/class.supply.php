<?php

/**
 * Project:  ErpLeo 
 * File: supply.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */




/**

* @Entity

* @Table(name="supply")

*/





class Supply{
    
    
    
    /** @Id @Column(type="integer") @GeneratedValue */ 
    public $supply_id;/* tinyint(4) NOT NULL AUTO_INCREMENT,*/
    /** @Column(length=255, nullable=false) */
    public $supply_name;/* char(255) NOT NULL,*/
    /** @Column(length=10, nullable=false) */
    public $unit;/* char(10) NOT NULL,*/
    /** @stock @Column(type="integer", nullable=false) */
    public $stock;/* int(11) NOT NULL DEFAULT '0',*/
    /** @price @Column(type="decimal", nullable=true) */ 
    public $price;
    /** @Column(length=400, nullable=true) */
    public $comments;/* varchar(400) DEFAULT NULL, */
    /** @account_id @Column(type="integer", nullable=true) */
    public $account_id;    
    /** @stock_min @Column(type="integer", nullable=true) */
    public $stock_min;
 
    function getSupply_id() {
        return $this->supply_id;
    }

    function getSupply_name() {
        return $this->supply_name;
    }

    function getUnit() {
        return $this->unit;
    }

    function getStock() {
        return $this->stock;
    }
    
    function getPrice() {
        return $this->price;
    }       

    function getComments() {
        return $this->comments;
    }
    
    function getAccount_id(){
        return $this->account_id;
    }  
    
    function getStock_min(){
        return $this->stock_min;
    }    

    function setSupply_id($supply_id) {
        $this->supply_id = $supply_id;
    }

    function setSupply_name($suply_name) {
        $this->supply_name = $suply_name;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }
    
    function setPrice($price) {
        $this->price = $price;
    }
         
    function setComments($comments) {
        $this->comments = $comments;
    }

    function setAccount_id($account_id){
        $this->account_id = $account_id;        
    }   
    
    function setStock_min($stock_min){
        $this->stock_min = $stock_min;
    }    
     
    
}

?>