<?php

/**
 * Project:  ErpDonJusto 
 * File: product_cost.php
 * Created on: Dec 28, 2018
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



     /**

     * @Entity

     * @Table(name="product_cost")

     */


/*
 * 
 * CREATE TABLE `product_cost` (
  `prod_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_name` varchar(255) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `cost_type` char(15) DEFAULT 'VENTA',
  `saving_type` char(15) DEFAULT NULL,
  `saving_id` bigint(20) DEFAULT NULL,
  `account_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`prod_cost_id`),
  KEY `fk_account_id3` (`account_id`),
  CONSTRAINT `fk_account_id3` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
 * 
 * 
 * 
 */


class ProductCost{
    
        
/** @Id @Column(type="bigint") @GeneratedValue */     
    public $prod_cost_id; /*`prod_cost_id` int(11) NOT NULL AUTO_INCREMENT, */
/** @Column(length=255, nullable=false) */      
    public $cost_name;/*`cost_name` varchar(255) NOT NULL, */
/** @Column(length=255, nullable=true) */      
    public $comments;/*`comments` varchar(255) DEFAULT NULL, */
/** @Column(length=15, nullable=true) */    
    public $cost_type;/*`cost_type` char(15) DEFAULT 'VENTA', */
/** @Column(length=15, nullable=true) */ 
    public $saving_type;/*  `saving_type` char(15) DEFAULT NULL, */
/** @saving_id @Column(type="bigint", nullable=true) */        
    public $saving_id;/*  `saving_id` bigint(20) DEFAULT NULL,      */       
/** @account_id @Column(type="bigint", nullable=true) */    
    public $account_id;/*  `account_id` bigint(20) unsigned DEFAULT NULL,     */  

    function getSaving_type() {
        return $this->saving_type;
    }

    function getSaving_id() {
        return $this->saving_id;
    }
        
    function getProd_cost_id() {
        return $this->prod_cost_id;
    }

    function getCost_name() {
        return $this->cost_name;
    }

    function getComments() {
        return $this->comments;
    }

    function getCost_type() {
        return $this->cost_type;
    }

    function getAccount_id() {
        return $this->account_id;
    }
    

    function setSaving_type($saving_type) {
        $this->saving_type = $saving_type;
    }

    function setSaving_id($saving_id) {
        $this->saving_id = $saving_id;
    }    
    
    function setProd_cost_id($prod_cost_id) {
        $this->prod_cost_id = $prod_cost_id;
    }

    function setCost_name($cost_name) {
        $this->cost_name = $cost_name;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function setCost_type($cost_type) {
        $this->cost_type = $cost_type;
    }

    function setAccount_id($account_id) {
        $this->account_id = $account_id;
    }


}

?>


