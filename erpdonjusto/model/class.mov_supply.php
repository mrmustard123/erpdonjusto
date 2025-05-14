<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  ErpDonJusto 
 * File: mov_supply.php
 * Created on: Mar 13, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/* DDL de esta tabla:
 *
CREATE TABLE `mov_supply` (
  `mov_supply_id` int(11) NOT NULL AUTO_INCREMENT,
  `mov_supply_type` char(10) NOT NULL DEFAULT 'ENTRADA',
  `mov_supply_date` datetime NOT NULL,
  `mov_supply_cant` int(11) NOT NULL DEFAULT '1',
  `mov_supply_lot` char(15) DEFAULT NULL,
  `supply_id` tinyint(4) NOT NULL,
  `comments` varchar(400) DEFAULT NULL,
  `user_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`mov_supply_id`),
  KEY `fk_supply_id02` (`supply_id`),
  KEY `fk_user_id03` (`user_id`),
  CONSTRAINT `fk_supply_id02` FOREIGN KEY (`supply_id`) REFERENCES `supply` (`supply_id`),
  CONSTRAINT `fk_user_id03` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1051 DEFAULT CHARSET=utf8;
 * 
 */




/**

 * @ORM\Entity

 * @ORM\Table(name="mov_supply")

 */


class SupplyMovement{

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $mov_supply_id; /*bigint(20) NOT NULL AUTO_INCREMENT, */
    /** @ORM\Column(length=10, nullable=false) */
    public $mov_supply_type; /*char(10) NOT NULL DEFAULT 'SALIDA', */
    /** @ORM\Column(type="datetime", nullable=false) */
    public $mov_supply_date; /*datetime NOT NULL, */
    /** @ORM\Column(type="integer", nullable=false) */
    public $mov_supply_cant; /*int(11) NOT NULL DEFAULT '1', */
    /** @ORM\Column(length=15, nullable=false) */
    public $mov_supply_lot; /* char(15) DEFAULT NULL, */
    /** @ORM\Column(type="integer", nullable=false) */
    public $supply_id; /* tinyint(4) DEFAULT NULL, */
    /** @ORM\Column(length=400, nullable=true) */
    public $comments; /*varchar(400) DEFAULT NULL */
    /** @ORM\Column(type="integer", nullable=true) */
    public $user_id; /* `user_id` tinyint(3) unsigned DEFAULT NULL, */
    
    
    
    function getMov_supply_id() {
        return $this->mov_supply_id;
    }

    function getMov_supply_type() {
        return $this->mov_supply_type;
    }

    function getMov_supply_date() {
        return $this->mov_supply_date;
    }

    function getMov_supply_cant() {
        return $this->mov_supply_cant;
    }

    function getMov_supply_lot() {
        return $this->mov_supply_lot;
    }

    function getSupply_id() {
        return $this->supply_id;
    }

    function getComments() {
        return $this->comments;
    }
    
    
    function getUser_id() {
        return $this->user_id;
    }    

    function setMov_supply_id($mov_supply_id) {
        $this->mov_supply_id = $mov_supply_id;
    }

    function setMov_supply_type($mov_supply_type) {
        $this->mov_supply_type = $mov_supply_type;
    }

    function setMov_supply_date($mov_supply_date) {
        $this->mov_supply_date = $mov_supply_date;
    }

    function setMov_supply_cant($mov_supply_cant) {
        $this->mov_supply_cant = $mov_supply_cant;
    }

    function setMov_supply_lot($mov_supply_lot) {
        $this->mov_supply_lot = $mov_supply_lot;
    }

    function setSupply_id($supply_id) {
        $this->supply_id = $supply_id;
    }

    function setComments($comments) {
        $this->comments = $comments;
    }
    
    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }    


    
    
    
}
?>