<?php

/**
 * Description of balance_checksum
 *
 * @author Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

/*
CREATE TABLE `balance_checksum` (
  `checksum_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `checksum_date` datetime NOT NULL,
  `checksum` decimal(13,2) NOT NULL DEFAULT '0.00',
  `cbte_cont_nro` varchar(30) DEFAULT NULL,
  `balance` decimal(13,2) DEFAULT '0.00',
  PRIMARY KEY (`checksum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=407 DEFAULT CHARSET=utf8;

 */


use Doctrine\ORM\Mapping as ORM;


     /**

     * @ORM\Entity

     * @ORM\Table(name="balance_checksum")

     */


class balance_checksum {
    
    /** @ORM\Id @ORM\Column(type="bigint") @ORM\GeneratedValue */    
    public $checksum_id;
    /** @ORM\Column(type="datetime", nullable=false) */
    public $checksum_date;
    /** @ORM\Column(type="decimal", nullable=false) */
    public $checksum;  
    /** @ORM\Column(type="decimal", nullable=false) */
    public $budget;     
    /** @ORM\Column(length=30, nullable=true) */
    public $cbte_cont_nro;            /*`cbte_cont_nro` varchar(30) DEFAULT NULL,*/
    /** @ORM\Column(type="decimal", nullable=false) */
    public $balance;            /*`balance` decimal(13,2) DEFAULT '0.00',*/    
    
    
   
    function getChecksum_id() {
        return $this->checksum_id;
    }

    function getChecksum_date() {
        return $this->checksum_date;
    }

    function getChecksum() {
        return $this->checksum;
    }
    
    function getBudget() {
        return $this->budget;
    }    
    
    function getCbte_cont_nro() {
        return $this->cbte_cont_nro;
    }

    function getBalance() {
        return $this->balance;
    }
    
    public function calculate_budget(){
        
        $persistence = new PersistenceErpLeo();
        
        $budget = $persistence->getBudget();
        
        return $budget;                       
        
    }
    
    
    

    function setChecksum_id($checksum_id) {
        $this->checksum_id = $checksum_id;
    }

    function setChecksum_date($checksum_date) {
        $this->checksum_date = $checksum_date;
    }

    function setChecksum($checksum) {
        $this->checksum = $checksum;
    }
    
    function setBudget($budget) {
        $this->budget = $budget;
    }    

    function setCbte_cont_nro($cbte_cont_nro) {
        $this->cbte_cont_nro = $cbte_cont_nro;
    }

    function setBalance($balance) {
        $this->balance = $balance;
    }    

    
    
    
    
    
}

?>