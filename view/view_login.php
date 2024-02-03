<?php
error_reporting(1);
/**
 * Project:  ErpDonJusto 
 * File: view_login.php
 * Created on: Mar 29, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

include 'realpath.php';

?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>LOGIN</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       
        <meta name="HandheldFriendly" content="true">
        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">        
        <meta name="viewport" content="width=device-width">  
        <link type="text/css" href="<?php echo $relative_path.$path_html; ?>view/css/bootstrap.min.css" rel="stylesheet" />        
    </head>
    <body>

        <div>
            <h1>LOGIN</h1>
            
    

        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php"> 

            <input type="hidden" name="action" id="action" value="access" />

            <label>Usu&aacute;rio</label><br/>
            <input type="text" id="edUser" name="edUser"/><br/>            
            <label>Contrase&ntilde;a</label><br/>
            <input type="password" id="edPassword" name="edPassword"  /><br/>              
           
            <br/>
            <br/>            
           

            <input type="submit" id="btn_account"  value="Aceptar" />

        </form>     
        
        </div>
    </body>
</html>
