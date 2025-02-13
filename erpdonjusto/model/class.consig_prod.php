<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpDonJusto 
 * File: consig_prod.php
 * Created on: Jul 3, 2018
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



class Consig_Prod{
    

    
  /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */    
  public $consig_prod_id;/* int(10) unsigned NOT NULL AUTO_INCREMENT, */
  /** @ORM\Column(type="integer", nullable=false) */
  public $consig_id;/* smallint(5) unsigned NOT NULL, */
  /** @ORM\product_id @ORM\Column(type="integer", nullable=false) */
  public $product_id;/* tinyint(4) NOT NULL, */
  /** @ORM\Column(type="datetime", nullable=false) */
  public $consig_date;/* datetime NOT NULL, */
  /** @ORM\Column(length=10, nullable=false) */
  public $mov_type;/* char(10) NOT NULL DEFAULT 'ENTREGA' COMMENT 'ENTREGA/DEVOLUCION',*/
  /** @ORM\cant @ORM\Column(type="integer", nullable=false) */
  public $cant;/* tinyint(4) NOT NULL DEFAULT '0', */
  /** @ORM\Column(type="integer", nullable=false) */
  public $balance;/* smallint(6) NOT NULL DEFAULT '0', */
  /** @ORM\Column(type="integer", nullable=false) */
  public $owes;/* smallint(6) NOT NULL DEFAULT '0', */
  /** @ORM\Column(type="integer", nullable=false) */
   public $topay;/* smallint(6) NOT NULL DEFAULT '0', */
  /** @ORM\Column(length=500, nullable=false) */
  public $comments; /* varchar(500) DEFAULT NULL,   */
    
    
    
    function getConsig_prod_id() {
        return $this->consig_prod_id;
    }

    function getConsig_id() {
        return $this->consig_id;
    }

    function getProduct_id() {
        return $this->product_id;
    }

    function getConsig_date() {
        return $this->consig_date;
    }

    function getMov_type() {
        return $this->mov_type;
    }

    function getCant() {
        return $this->cant;
    }

    function getBalance() {
        return $this->balance;
    }

    function getOwes() {
        return $this->owes;
    }

    function getComments() {
        return $this->comments;
    }

    function setConsig_prod_id($consig_prod_id) {
        $this->consig_prod_id = $consig_prod_id;
    }

    function setConsig_id($consig_id) {
        $this->consig_id = $consig_id;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    function setConsig_date($consig_date) {
        $this->consig_date = $consig_date;
    }

    function setMov_type($mov_type) {
        $this->mov_type = $mov_type;
    }

    function setCant($cant) {
        $this->cant = $cant;
    }

    function setBalance($balance) {
        $this->balance = $balance;
    }

    function setOwes($owes) {
        $this->owes = $owes;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }
       
    
}


?>
