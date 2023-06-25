<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: view_hist_pendientes.php
 * Created on: Dec 23, 2021
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

    <title>HISTORICO DE POSICION</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  

</head>

<body>




        
<script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>        
<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />	        
<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.css" rel="stylesheet" />	        
<script type="text/javascript" src="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.js"></script>         
        

    
<a href="index.php?action=home">Inicio</a>   
<br>
<a href="index.php?action=poshistory">Listado de Posiciones</a>  

 

<?php



        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/
        
        $pos = $params['pos'];
        
        $v_pos_histories = NULL;
            
        $v_pos_histories = $model->getPosDescripHistory($pos);
             

        
?>

<h1>HISTORICO POSICION <?php echo $pos; ?></h1>      


<table width="100%" border="1">

<?php


        if($v_pos_histories){

            $count = 1;
            
            foreach($v_pos_histories as $pos_history){
               

?>
  
  <tr>
    <td>
       <?php
       
            echo $pos_history['posic_descrip_hsit_date'];
            echo '<br>';
            echo utf8_encode($pos_history['descripcion']);
            echo '<br>';
       
       ?>
        
    </td>

  </tr>
  
  
<?php

                $count++;

            }//end foreach...
            
     
            
            
        }//end if($v_pos_histories...


?>
</table>
</body>
</html>
