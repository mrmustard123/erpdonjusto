<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: posic_salud_hist.php
 * Created on: Dec 22, 2021
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

 * @ORM\Entity

 * @ORM\Table(name="posic_salud_hist")

 */

/*
CREATE TABLE `posic_salud_hist` (
  `posic_salud_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `salud` char(10) NOT NULL DEFAULT 'BUENA',
  `posic_salud_hist_date` datetime DEFAULT NULL,
  `id_posicion` tinyint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`posic_salud_hist_id`),
  KEY `fk_position_id6` (`id_posicion`),
  CONSTRAINT `fk_position_id6` FOREIGN KEY (`id_posicion`) REFERENCES `position` (`position_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */


class PosicSaludHist{      
    
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */   
    public $posic_salud_hist_id; 

    /** @ORM\Column(length=20, nullable=true) */
    public $salud;     

    /** @ORM\Column(type="datetime", nullable=false) */
    public $posic_salud_hist_date;  
    /** @ORM\Column(type="integer", nullable=true) */
    public $position_id;      
    
    function getPosic_salud_hist_id() {
        return $this->posic_salud_hist_id;
    }

    function getSalud() {
        return $this->salud;
    }

    function getPosic_salud_hist_date() {
        return $this->posic_salud_hist_date;
    }

    function getPosition_id() {
        return $this->position_id;
    }

    function setPosic_salud_hist_id($posic_salud_hist_id) {
        $this->posic_salud_hist_id = $posic_salud_hist_id;
    }

    function setSalud($salud) {
        $this->salud = $salud;
    }

    function setPosic_salud_hist_date($posic_salud_hsit_date) {
        $this->posic_salud_hist_date = $posic_salud_hsit_date;
    }

    function setPosition_id($position_id) {
        $this->position_id = $position_id;
    }

  
    
    
    
    
}
           

  