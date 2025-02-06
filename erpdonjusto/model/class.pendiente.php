<?php
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pendiente
 *
 * @ORM\author Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

/**

 * @ORM\Entity

 * @ORM\Table(name="pendiente")

 */


class Pendiente {
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $pendientes_id;/*` int(11) unsigned NOT NULL AUTO_INCREMENT,*/
    /** @ORM\Column(type="datetime", nullable=false) */
    public $fecha;/*` date DEFAULT NULL,*/
    /** @ORM\Column(length=3500, nullable=true) */
    public $cuerpo;/*` varchar(3500) DEFAULT NULL,*/
    /** @ORM\Column(length=50, nullable=false) */
    public $realizado;/*` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI',   */   

 /*

CREATE TABLE `pendiente` (
  `pendientes_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cuerpo` varchar(3500) DEFAULT NULL,
  `realizado` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI',
  PRIMARY KEY (`pendientes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;  */

       
   function getPendientes_id() {
       return $this->pendientes_id;
   }

   function getFecha() {
       return $this->fecha;
   }

   function getCuerpo() {
       return $this->cuerpo;
   }

   function getRealizado() {
       return $this->realizado;
   }

   function setPendientes_id($pendientes_id) {
       $this->pendientes_id = $pendientes_id;
   }

   function setFecha($fecha) {
       $this->fecha = $fecha;
   }

   function setCuerpo($cuerpo) {
       $this->cuerpo = $cuerpo;
   }

   function setRealizado($realizado) {
       $this->realizado = $realizado;
   }


    
    
    



   
    
    
    
    
    
    
    
    
}
?>