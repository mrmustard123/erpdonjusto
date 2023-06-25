<?php
error_reporting(1);
/**
 * Project:  ErpDonJusto 
 * File: view_login.php
 * Created on: Mar 29, 2017
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

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>LOGIN</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
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
