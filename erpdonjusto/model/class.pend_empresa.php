<?php
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class.pend_empresa
 *
 * Author Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

 * @ORM\Entity

 * @ORM\Table(name="pend_empresa")

 */

class pendEmpresa {
    
    /*
CREATE TABLE `pend_empresa` (
  `pend_empresa_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cuerpo` varchar(3500) DEFAULT NULL,
  `responsable` char(50) DEFAULT NULL,
  `realizado` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI',
  PRIMARY KEY (`pend_empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
     */
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */ 
    public $pend_empresa_id; /*` int(11) unsigned NOT NULL AUTO_INCREMENT,*/
    /** @ORM\Column(type="datetime", nullable=false) */
    public $fecha;/*` date DEFAULT NULL, */
    /** @ORM\Column(length=3500, nullable=true) */
    public $cuerpo;/*` varchar(3500) DEFAULT NULL, */
    /** @ORM\Column(length=50, nullable=false) */
    public $responsable;/*` char(50) DEFAULT NULL,*/
    /** @ORM\Column(length=1, nullable=true) */
    public $realizado;/*` char(1) NOT NULL DEFAULT 'N' COMMENT 'N=NO;S=SI', */    
    
    function getPend_empresa_id() {
        return $this->pend_empresa_id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getRealizado() {
        return $this->realizado;
    }

    function setPend_empresa_id($pend_empresa_id) {
        $this->pend_empresa_id = $pend_empresa_id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setRealizado($realizado) {
        $this->realizado = $realizado;
    }


    
    
    
}
