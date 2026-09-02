<?php

/*
File: connection
Author: Leonardo G. Tellez Saucedo
Created on: 21 ene. de 2025 21:22:01
Email: leonardo616@gmail.com
*/

function connect_db(){
    


            /* the connection configuration*/
            $dbParams = array(
                'driver'   => 'pdo_mysql',
                'host'     => 'localhost',                
                'user'     => 'u236816975_erpdonjusto',
                'password' => 'P4p4n03l123',
                'dbname'   => 'u236816975_erpdonjusto',
                'charset'  => 'utf8mb4',
                'driverOptions' => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
                )                
            );
            
            return $dbParams;

    
}


