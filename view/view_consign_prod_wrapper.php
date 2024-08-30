<?php

/*
File: view_consig_prod_wrapper
Author: Leonardo G. Tellez Saucedo
Created on: 26 ago. de 2024 17:41:23
Email: leonardo616@gmail.com
*/


    session_start();

    $_SESSION['view']='radphp';
           
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">
        
        <?php    require 'view_links.php'; ?>       

        <!--script src="<?php echo $path_view; ?>js/jquery-1.6.4.min.js" type="text/javascript"></script-->


<title>ERP DON JUSTO</title>
</head>

<body>

<style>

    #Panel1_outer{
        position: relative !important;
    }

</style>


<style>

    #Panel1_outer{
        position: relative !important;
    }

</style>

    <div class="wrapper">

        <?php require "view_menu.php";  ?>

        <div id="div_target">
            
            <?php  require 'view_consign_prod.php'; ?>
            
        </div> <!--end div_target-->
    </div> <!--end wrapper-->
    
</body>
</html>
    

