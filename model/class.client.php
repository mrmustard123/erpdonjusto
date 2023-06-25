<?php

/**
 * Project:  ErpDonJusto 
 * File: client.php
 * Created on: Mar 30, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


/**

* @Entity

* @Table(name="client")

*/

class Client{



    /** @Id @Column(type="integer") @GeneratedValue */  
    public $client_id;    /*int(10) unsigned NOT NULL AUTO_INCREMENT, */
    /** @Column(length=200, nullable=false) */
    public $client_name; /*char(200) NOT NULL, */
    /** @Column(length=200, nullable=false) */
    public $prefered_time; /*varchar(200) DEFAULT NULL COMMENT 'prefered time to deliver', */
    /** @Column(length=300, nullable=false) */
    public $address; /*varchar(300) DEFAULT NULL,*/
    /** @Column(length=200, nullable=false) */
    public $neighborhood;
    /** @Column(length=30, nullable=false) */
    public $coordinates; /*char(30) DEFAULT NULL, */
    /** @Column(length=16, nullable=false) */
    public $mobile; /*varchar//(16) DEFAULT NULL, */
    /** @Column(length=16, nullable=false) */
    public $phone; /*varchar(16) DEFAULT NULL, */
    /** @Column(length=100, nullable=false) */
    public $email; /* varchar(100) DEFAULT NULL,*/
    /** @Column(length=150, nullable=false) */
    public $how_knew; /*varchar(150) DEFAULT NULL COMMENT 'how he knew about us', */
    /** @Column(length=20, nullable=false) */
    public $pay_method; /*char(20) DEFAULT 'AL CONTADO',*/
    /** @Column(length=10, nullable=false) */
    public $gender; /*char(10) NOT NULL DEFAULT 'FEMENINO', */
    /** @Column(length=1, nullable=false) */
    public $company; /*char(1) NOT NULL DEFAULT 'F', */
    

            
    function getClient_id() {
        return $this->client_id;
    }

    function getClient_name() {
        return $this->client_name;
    }

    function getPrefered_time() {
        return $this->prefered_time;
    }

    function getAddress() {
        return $this->address;
    }
    
    function getNeighborhood() {
        return $this->neighborhood;
    }    

    function getCoordinates() {
        return $this->coordinates;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getHow_knew() {
        return $this->how_knew;
    }

    function getPay_method() {
        return $this->pay_method;
    }

    function getGender() {
        return $this->gender;
    }

    function getCompany() {
        return $this->company;
    }
    
        function getComments() {
        return $this->comments;
    }


    function setClient_id($client_id) {
        $this->client_id = $client_id;
    }

    function setClient_name($client_name) {
        $this->client_name = $client_name;
    }

    function setPrefered_time($prefered_time) {
        $this->prefered_time = $prefered_time;
    }

    function setAddress($address) {
        $this->address = $address;
    }
    
    
    function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
    }    

    function setCoordinates($coordinates) {
        $this->coordinates = $coordinates;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setHow_knew($how_knew) {
        $this->how_knew = $how_knew;
    }

    function setPay_method($pay_method) {
        $this->pay_method = $pay_method;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setCompany($company) {
        $this->company = $company;
    }
    
    function setComments($comments) {
        $this->comments = $comments;
    }    


       
    
}

?>
