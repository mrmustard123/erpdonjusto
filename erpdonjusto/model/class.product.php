<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpLeo 
 * File: product.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
 */




/**

 * @ORM\Entity

 * @ORM\Table(name="product")

 */




class Product{
        
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */   
    public $product_id; /*tinyint(4) NOT NULL AUTO_INCREMENT, */
    /** @ORM\Column(length=255, nullable=false) */    
    public $product_name; /*char(255) NOT NULL, */
    /** @ORM\Column(length=50, nullable=false) */
    public $presentation; /*char(50) NOT NULL COMMENT 'frasco, gotero, spry, pote,chup-chup', */

   /* public $mesure; /*decimal(5,2) NOT NULL, */
    /** @ORM\Column(length=10, nullable=false) */
    public $unit; /*char(10) NOT NULL, */
    /** @ORM\Column(type="decimal", nullable=false) */
    public $stock; /*decimal(5,2)  NOT NULL DEFAULT '0', */
    /** @ORM\Column(length=400, nullable=true) */
    public $comments; /*varchar(400) DEFAULT NULL, */
    /** @ORM\Column(length=500, nullable=true) */
    public $preparation;
    /** @ORM\Column(type="decimal", nullable=false) */
    public $utility;
    /** @ORM\Column(type="decimal", nullable=false) */
    public $employee_cost;
    /** @ORM\Column(type="decimal", nullable=false) */
    public $production_cost;    
    /** @ORM\Column(type="integer", nullable=true) */
    public $account_id;
    /** @ORM\Column(length=8, nullable=true) */ 
    public $status; /*char(8),
    /** @ORM\Column(type="integer", nullable=true) */
    public $stock_min;
               
    
    function getProduct_id() {
        return $this->product_id;
    }

    function getProduct_name() {
        return $this->product_name;
    }

    function getPresentation() {
        return $this->presentation;
    }

/*    function getMesure() {
        return $this->mesure;
    }
*/
    function getUnit() {
        return $this->unit;
    }

    function getStock() {
        return $this->stock;
    }

    function getComments() {
        return $this->comments;
    }

    function getPreparation() {
        return $this->preparation;
    }
    
    
    function getUtility() {
        return $this->utility;
    }

    function getEmployee_cost() {
        return $this->employee_cost;
    }   
    
    
    function getProduction_cost(){
        return $this->production_cost;
    }
    
    function getAccount_id(){
        return $this->account_id;
    } 
    
    function getStatus(){
        return $this->status;
    }
    
    function getStock_min(){
        return $this->stock_min;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    function setProduct_name($product_name) {
        $this->product_name = $product_name;
    }


    function setPresentation($presentation) {
        $this->presentation = $presentation;
    }
/*
    function setMesure($mesure) {
        $this->mesure = $mesure;
    }
*/
    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }

    function setPreparation($preparation) {
        $this->preparation = $preparation;
    }
    
    
    function setUtility($utility) {
        $this->utility = $utility;
    }

    function setEmployee_cost($employee_cost) {
        $this->employee_cost = $employee_cost;
    }  
    
    function setProduction_cost($production_cost){
        $this->production_cost = $production_cost;
    }
    
    function setAccount_id($account_id){
        $this->account_id = $account_id;        
    }

    function setStatus($status){
        $this->status = $status;
    }
    
    function setStock_min($stock_min){
        $this->stock_min = $stock_min;
    }
    
    
    
}
?>