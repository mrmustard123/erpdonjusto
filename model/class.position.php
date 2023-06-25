<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: position.php
 * Created on: Jul 19, 2020
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

/**

 * @Entity

 * @Table(name="position")

 */




class Position{
    
    /** @Id @Column(type="integer") @GeneratedValue */   
    public $position_id; 
    /** @Column(length=255, nullable=false) */    
    public $pos_name; 
    /** @Column(length=500, nullable=true) */
    public $descripcion; 
    /** @Column(length=255, nullable=true) */
    public $coordenadas;  
    /** @Column(length=20, nullable=true) */
    public $salud;
    /** $id_apiario @Column(type="integer", nullable=true) */
    public $id_apiario;
    
    function getPosition_id() {
        return $this->position_id;
    }

    function getPos_name() {
        return $this->pos_name;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCoordenadas() {
        return $this->coordenadas;
    }
    
    function getSalud(){
        return $this->salud;        
    }    
    
    function getId_apiario(){
        return $this->id_apiario;        
    }

    function setPosition_id($position_id) {
        $this->position_id = $position_id;
    }

    function setPos_name($pos_name) {
        $this->pos_name = $pos_name;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCoordenadas($coordenadas) {
        $this->coordenadas = $coordenadas;
    }
    
    function setSalud($salud){
        $this->salud = $salud;
    }    
    
    function setId_apiario($id_apiario){
        $this->id_apiario = $id_apiario;
    }


        
    
}

?>