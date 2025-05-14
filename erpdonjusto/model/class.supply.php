<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpLeo 
 * File: supply.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

/* DDL tabla Supply:
 * 
  CREATE TABLE `supply` (
  `supply_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `supply_name` char(255) NOT NULL,
  `unit` char(10) NOT NULL,
  `stock` bigint(20) NOT NULL DEFAULT '0',
  `price` decimal(10,5) DEFAULT '0.00000',
  `comments` varchar(400) DEFAULT NULL,
  `account_id` bigint(20) unsigned DEFAULT NULL,
  `stock_min` int(11) DEFAULT NULL,
  `cost_account_id` bigint(20) unsigned DEFAULT NULL,
  `prod_cost_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`supply_id`),
  KEY `fk_account_id03` (`account_id`),
  KEY `fk_cost_account_id01` (`cost_account_id`),
  KEY `fk_prod_cost_id` (`prod_cost_id`),
  CONSTRAINT `fk_account_id03` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_cost_account_id01` FOREIGN KEY (`cost_account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_prod_cost_id` FOREIGN KEY (`prod_cost_id`) REFERENCES `product_cost` (`prod_cost_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
 * 
 * 
 *  */







/**

* @ORM\Entity

* @ORM\Table(name="supply")

*/





class Supply{
    
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $supply_id;/* tinyint(4) NOT NULL AUTO_INCREMENT,*/
    /** @ORM\Column(length=255, nullable=false) */
    public $supply_name;/* char(255) NOT NULL,*/
    /** @ORM\Column(length=10, nullable=false) */
    public $unit;/* char(10) NOT NULL,*/
    /** @ORM\Column(type="integer", nullable=false) */
    public $stock;/* int(11) NOT NULL DEFAULT '0',*/
    /** @ORM\Column(type="decimal", nullable=true) */ 
    public $price;
    /** @ORM\Column(length=400, nullable=true) */
    public $comments;/* varchar(400) DEFAULT NULL, */
    /** @ORM\Column(type="integer", nullable=true) */
    public $account_id;    
    /** @ORM\Column(type="integer", nullable=true) */
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