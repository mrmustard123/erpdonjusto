<?php

/*
File: view_bitacora_list_wrapper
Author: Leonardo G. Tellez Saucedo
Created on: 26 ago. de 2024 22:51:54
Email: leonardo616@gmail.com
*/


    session_start();

    $_SESSION['view']='radphp';
    
    require 'view_links.php';     
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">




<title>ERP DON JUSTO</title>
</head>

<body>
    
<style>

    #Panel1_outer{
        position: relative !important;
    }

</style>

    <div class="wrapper">

        <?php require "view_menu.php";  ?>

        <div id="div_target">
            
            <?php  
            
                require('view_bitacora_list.php'); 
            
            ?>
            
        </div> <!--end div_target-->
    </div> <!--end wrapper-->
</body>
</html>

