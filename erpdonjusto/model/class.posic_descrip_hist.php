<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: posic_descrip_hist.php
 * Created on: Dec 22, 2021
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/*
 CREATE TABLE `posic_descrip_hist` (
  `posic_descrip_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `posic_descrip_hsit_date` datetime DEFAULT NULL,
  `position_id` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`posic_descrip_hist_id`),
  KEY `fk_posicion_id5` (`position_id`),
  CONSTRAINT `fk_posicion_id5` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */


/**

 * @ORM\Entity

 * @ORM\Table(name="posic_descrip_hist")

 */




class PosicDescripHist{     
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */   
    public $posic_descrip_hist_id; 
    
    /** @ORM\Column(length=255, nullable=true) */    
    public $descripcion;     

    /** @ORM\Column(type="datetime", nullable=false) */
    public $posic_descrip_hsit_date;  
    /** @ORM\Column(type="integer", nullable=true) */
    public $position_id;        
    
    function getPosic_descrip_hist_id() {
        return $this->posic_descrip_hist_id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPosic_descrip_hsit_date() {
        return $this->posic_descrip_hsit_date;
    }

    function getPosition_id() {
        return $this->position_id;
    }

    function setPosic_descrip_hist_id($posic_descrip_hist_id) {
        $this->posic_descrip_hist_id = $posic_descrip_hist_id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPosic_descrip_hsit_date($posic_descrip_hsit_date) {
        $this->posic_descrip_hsit_date = $posic_descrip_hsit_date;
    }

    function setPosition_id($position_id) {
        $this->position_id = $position_id;
    }


    


    
}    