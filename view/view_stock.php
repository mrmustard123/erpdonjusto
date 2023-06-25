<?php

/**
 * Project:  ErpDonJusto 
 * File: view_stock.php
 * Created on: Mar 7, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width"> 

<title>STOCK</title>
</head>

<body>
<h2>STOCK</h2>

<a href="index.php?action=movement">Nuevo Movimiento Producto/Ingrediente</a><br/>   
<a href="index.php?action=home">Inicio</a>  

<h2>PRODUCTOS</h2>
<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>PRODUCTO</td>
    <td>UNIDAD</td>
    <td>STOCK</td>
    <td>STOCK MIN</td>
  </tr>
  
  <?php
  
    require_once 'model/model.php';

    $model = new model();
    
    $v_products = $model->getStockProducts();
    
        if($v_products){
           
            foreach($v_products as $product){    
   
                if($product['stock']<$product['stock_min']){                 
?>
            <tr style="color: #FF0000">
<?php
                }else{ 
?>
            <tr>
<?php                                                     
                }
?>
            
              <td><?php   echo $product['product_id'];     ?></td>
              <td><?php   echo utf8_encode($product['product_name']);   ?></td>
              <td><?php   echo $product['unit'];           ?></td>
              <td><?php   echo $product['stock'];         ?></td>             
              <td><?php   echo $product['stock_min'];         ?></td> 
            </tr>
  
  
  <?php
            }
        }
  
  
  
  
  
  ?>
  
  
</table>

<h2>INSUMOS</h2>
<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>INSUMO</td>
    <td>UNIDAD</td>
    <td>STOCK</td>
    <td>STOCK MIN</td>
  </tr>
  
  <?php
  
    
    $v_supplies = $model->getStockSupplies();
    
        if($v_supplies){
           
            foreach($v_supplies as $supply){    
       
                  if($supply['stock']<$supply['stock_min']){                 
?>
            <tr style="color: #FF0000">
<?php
                }else{ 
?>
            <tr>
<?php                                                     
                }
?>
  
              
              <td><?php   echo $supply['supply_id'];     ?></td>
              <td><?php   echo utf8_encode($supply['supply_name']);   ?></td>
              <td><?php   echo $supply['unit'];           ?></td>
              <td><?php   echo $supply['stock'];          ?></td>
              <td><?php   echo $supply['stock_min'];          ?></td>
            </tr>
  
  
  <?php
            }
        }
  
  
  
  
  
  ?>
  
  
</table>





</body>
</html>

