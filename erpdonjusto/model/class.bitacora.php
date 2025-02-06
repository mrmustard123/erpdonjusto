<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: bitacora.php
 * Created on: Jun 18, 2020
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


     /**

     * @ORM\Entity

     * @ORM\Table(name="bitacora")

     */


class Bitacora{
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */  
    public $bitacora_id; 
    /** @ORM\Column(type="datetime", nullable=false) */
    public $fecha; /*datetime NOT NULL,*/        
    /** @ORM\Column(length=3500, nullable=false) */
    public $cuerpo;  
    
    function getBitacora_id() {
        return $this->bitacora_id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function setBitacora_id($bitacora_id) {
        $this->bitacora_id = $bitacora_id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }

    
}
?>