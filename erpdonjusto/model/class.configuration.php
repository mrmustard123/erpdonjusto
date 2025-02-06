<?php
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configuration
 *
 * @ORM\author Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/*
CREATE TABLE `configuration` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  PRIMARY KEY (`config_id`),
  UNIQUE KEY `idx_config1` (`config_name`) USING BTREE,
  UNIQUE KEY `idx_config2` (`config_value`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

*/

/**

 * @ORM\Entity

 * @ORM\Table(name="configuration")

 */

class configuration {
    
    
    
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */   
    public $config_id;
    /** @ORM\Column(length=255, nullable=false) */
    public $config_name;
    /** @ORM\Column(length=255, nullable=false) */
    public $config_value;    
    
    
    
    function getConfig_id() {
        return $this->config_id;
    }

    function getConfig_name() {
        return $this->config_name;
    }

    function getConfig_value() {
        return $this->config_value;
    }

    function setConfig_id($config_id) {
        $this->config_id = $config_id;
    }

    function setConfig_name($config_name) {
        $this->config_name = $config_name;
    }

    function setConfig_value($config_value) {
        $this->config_value = $config_value;
    }


    
    
    
}
?>