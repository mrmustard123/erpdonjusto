<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: pos_history.php
 * Created on: Jul 19, 2020
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

 * @ORM\Entity

 * @ORM\Table(name="pos_history")

 */


class PosHistory{
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */  
    public $pos_hist_id;/*`pos_hist_id` int(10) unsigned NOT NULL AUTO_INCREMENT,*/
    /** @ORM\Column(type="datetime", nullable=false) */
    public $pos_hist_date;/*`pos_hist_date` datetime NOT NULL, */
    /** @ORM\Column(length=3500, nullable=true) */
    public $pos_hist_body;/*`pos_hist_body` varchar(3500) DEFAULT NULL, */
     /** @ORM\Column(type="integer", nullable=true) */
    public $position_id;/*position_id` tinyint(10) unsigned DEFAULT NULL,    */  
    
    function getPos_hist_id() {
        return $this->pos_hist_id;
    }

    function getPos_hist_date() {
        return $this->pos_hist_date;
    }

    function getPos_hist_body() {
        return $this->pos_hist_body;
    }

    function getPosition_id() {
        return $this->position_id;
    }

    function setPos_hist_id($pos_hist_id) {
        $this->pos_hist_id = $pos_hist_id;
    }

    function setPos_hist_date($pos_hist_date) {
        $this->pos_hist_date = $pos_hist_date;
    }

    function setPos_hist_body($pos_hist_body) {
        $this->pos_hist_body = $pos_hist_body;
    }

    function setPosition_id($position_id) {
        $this->position_id = $position_id;
    }

   
    
}
