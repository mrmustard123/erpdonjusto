<?php

/**
 * Project:  ErpDonJusto 
 * File: view_client.php
 * Created on: Mar 30, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


    $path = dirname(dirname(__FILE__));


    $dirname = str_replace('\\', '/', dirname(dirname(__FILE__)));

    $v_dirname = explode('/',$dirname);

    $v_script_name = explode('/',$_SERVER['SCRIPT_FILENAME']);

    $i = 0;



    $seguir = TRUE;

    while(  $seguir ){



        if($i>(count($v_dirname)-1)){

            $seguir = FALSE;

        }else{

            if($i>(count($v_script_name)-1)){

                $seguir = FALSE;

            }else{  

                if($v_dirname[$i]!=$v_script_name[$i]){

                    $seguir = FALSE;

                }

            }

        }



        $i++;

    }

    $count_script=count($v_script_name);

    $relative_path='';    

    for($j=$i;$j<$count_script-1;$j++){

       $relative_path .= '../'; 

    }

    $path_html ='';

    for($i;$i<count($v_dirname);$i++){

        $path_html .= $v_dirname[$i].'/';        

    }







?>

<html>
    <head>
        <title>CLIENTES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
    </head>
    <body>
        <div>
            
<a href="index.php?action=home">Inicio</a> <br />
<a href="index.php?action=clientlist">Lista de Clientes</a> <br/>
<?php


    require_once 'model/model.php';
    
    $model = new model();


    if($_POST['hf_id_client']){
        
        $client_id = $_POST['hf_id_client'];
        
        $cliente = $model->getClient($client_id);
        
        echo 'Hola';
        
        
        
        
        
    }




?>

        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php"> 

            <input type="hidden" name="action" id="action" value="save_client" />

            <label>Nombre:</label><br/>
            <input type="text" id="edName" name="edName" value="<?php echo $cliente->getClientName(); ?>"/><br/>
            <label>Direcci&oacute;n:</label><br/>
            <input type="text" id="edAddress" name="edAddress" value="<?php echo $cliente->getAddress(); ?>"/><br/>            
            <label>Barrio:</label><br/>
            <input type="text" id="edNeighborhood" name="edNeighborhood" value="<?php echo $cliente->getNeighborhood(); ?>"/><br/>             
            <label>Hor&aacute;rio de entrega preferido:</label><br/>
            <input type="text" id="edHour" name="edHour" value="<?php echo $cliente->getPrefered_time();  ?>" /><br/>           
            <label>Coordenadas:</label><br/>
            <input type="text" id="edCoordinates" name="edCoordinates" value="<?php echo $client->getCoordinates(); ?>"/><br/>
            <label>Celular:</label><br/>
            <input type="text" id="edMobile" name="edMobile" value="<?php echo $cliente->getMobile(); ?>"/><br/>
            <label>Tel&eacute;fono:</label><br/>
            <input type="text" id="edPhone" name="edPhone" value="<?php echo $cliente->getPhone();    ?>"/><br/>
            <label>E-mail:</label><br/>
            <input type="text" id="edEmail" name="edEmail" value="<?php echo $cliente->getEmail(); ?>"/><br/>
            <label>&iquest;C&oacute;mo se enter&oacute; de ADJ?</label><br/>
            <input type="text" id="edHowKnew" name="edHowKnew" value="<?php echo $cliente->getHow_knew(); ?>"/><br/>
            
            
            <label>Forma de Pago:</label><br/>
            <select id="slct_pay_method" name="slct_pay_method">
                <option <?php  if($cliente->getPay_method() == 'AL CONTADO'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?> >AL CONTADO</option>
                <option<?php  if($cliente->getPay_method() == 'AL CONTADO'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?>>TRANSFERENCIA</option>                                    
            </select><br/>              
            
            <label>Sexo:</label><br/>
            <select id="slct_gender" name="slct_gender">
                <option <?php  if($cliente->getPay_method() == 'FEMENINO'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?>>FEMENINO</option>
                <option<?php  if($cliente->getPay_method() == 'MASCULINO'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?>>MASCULINO</option>                                    
            </select><br/>
            
            <label>&iquest;Es empresa?:</label><br/>
            <select id="slct_company" name="slct_company">
                <option value="F" <?php  if($cliente->getCompany() == 'F'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?> >NO</option>
                <option value="T" <?php  if($cliente->getCompany() == 'T'){  echo 'selected = true'; }else{ echo 'selected = false'; }  ?>>SI</option>
            </select>
                                             

            <br/>                        
            
            <label>Observaciones:</label><br/>
            <textarea rows="4" cols="30" id="edComments" name="edComments"> </textarea>

            <br/>
            <br/>            
           

            <input type="submit" id="btn_account"  value="Aceptar" />

        </form>
        
        </div>
    </body>
</html>
