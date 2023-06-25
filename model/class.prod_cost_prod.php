<?php

/**
 * Project:  ErpDonJusto 
 * File: prod_cost_prod.php
 * Created on: Dec 8, 2018
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

* @Entity

* @Table(name="prod_cost_prod")

*/

class  ProdCostPprod {
    
     /** @Id @Column(type="integer") @GeneratedValue */     
    public $prod_cost_prod_id;
    
    /** @product_id @Column(type="integer", nullable=false) */    
    public $product_id;
    
    /** @prod_cost_id @Column(type="integer", nullable=false) */    
    public $prod_cost_id;
    
    /** @cost_value @Column(type="decimal", nullable=false) */    
    public $cost_value;    

    
    function getProd_cost_prod_id() {
        return $this->prod_cost_prod_id;
    }

    function getProduct_id() {
        return $this->product_id;
    }

    function getProd_cost_id() {
        return $this->prod_cost_id;
    }

    function getCost_value() {
        return $this->cost_value;
    }

    function setProd_cost_prod_id($prod_cost_prod_id) {
        $this->prod_cost_prod_id = $prod_cost_prod_id;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    function setProd_cost_id($prod_cost_id) {
        $this->prod_cost_id = $prod_cost_id;
    }

    function setCost_value($cost_value) {
        $this->cost_value = $cost_value;
    }


    
    
}
?>