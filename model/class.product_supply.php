<?php

/**
 * Project:  ErpLeo 
 * File: product_supply.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


     /**

     * @Entity

     * @Table(name="product_supply")

     */



class ProductSupply{
    
    /** @Id @Column(type="integer") @GeneratedValue */  
    public $product_suppy_id;/* bigint(20) NOT NULL AUTO_INCREMENT, */
    /** @product_id @Column(type="integer", nullable=false) */
    public $product_id;/* tinyint(4) NOT NULL, */
    /** @supply_id @Column(type="integer", nullable=false) */
    public $supply_id;/* tinyint(4) NOT NULL, */
    /** @cant @Column(type="integer", nullable=false) */
    public $cant;
    
    
    function getProduct_suppy_id() {
        return $this->product_suppy_id;
    }

    function getProduct_id() {
        return $this->product_id;
    }

    function getSupply_id() {
        return $this->supply_id;
    }
    
    function getCupply_id() {
        return $this->cant;
    }    

    function setProduct_suppy_id($product_suppy_id) {
        $this->product_suppy_id = $product_suppy_id;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    function setSupply_id($supply_id) {
        $this->supply_id = $supply_id;
    }
    
    
    function  setCant($cant){
        $this->cant = $cant;
    }

   
    
    
    
    
}

?>