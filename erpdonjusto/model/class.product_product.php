<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpLeo 
 * File: recipe_ingredient.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
 */




/* @ORM\Entity

* @ORM\Table(name="product_product")

*/


class ProductProduct{
    
          
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */  
    public $product_product_id;/* int(11) NOT NULL AUTO_INCREMENT, */
    /** @ORM\Column(type="integer", nullable=false) */
    public $ingredient_id;/* tinyint(4) NOT NULL */
    /** @ORM\Column(type="integer", nullable=false) */
    public $product_id;/* tinyint(4) NOT NULL, */
    /** @ORM\Column(type="decimal", nullable=false) */   
    public $cant;
    
    function getProduct_product_id() {
        return $this->product_product_id;
    }

    function getIngredient_id() {
        return $this->ingredient_id;
    }

    function getProduct_id() {
        return $this->product_id;
    }
    
    function getCant() {
        return $this->cant;
    }    

    function setProduct_product_id($producto_product_id) {
        $this->producto_product_id = $producto_product_id;
    }

    function setIngredient_id($ingredient_id) {
        $this->ingredient_id = $ingredient_id;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }
    
    function setCant() {
        return $this->cant;
    }

  
    
    
    
}

?>