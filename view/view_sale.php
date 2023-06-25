<?php

/**
 * Project:  ErpDonJusto 
 * File: view_sale.php
 * Created on: Mar 23, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */





?>

<html>
    <head>
        <title>VENTAS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
    </head>
    <body>
        <div>
            <h1>VENTAS</h1>
            <form>
              <p>Fecha: 
                <label>
                  <input type="text" name="edt_date" id="edt_date">
                </label>
              <br>
              Cliente: 
              <label>
                <input type="text" name="edt_client" id="edt_client">
              </label>
              <input type="hidden" name="hf_client_id" id="hf_client_id">
              </p>
              <p>Producto: 
                <label>
                  <input type="text" name="edt_product" id="edt_product">
                </label>
                <input type="hidden" name="hf_product_id" id="hf_product_id">
              </p>
              <p>Cantidad: 
                <label>
                  <input type="text" name="edt_cant" id="edt_cant">
                </label>
              </p>
              <p>
                <label>
                  <input type="submit" name="btn_ok" id="btn_ok" value="Enviar">
                </label>
              </p>
          </form>
            <table border="1">
              <tr>
                    <td>PRODUCTO</td>
                    <td>CANT</td>
                </tr>
                
               <tr>
                    <td></td>
                    <td></td>
                </tr>                
                
                
            </table>
        
        
        
        </div>
    </body>
</html>

