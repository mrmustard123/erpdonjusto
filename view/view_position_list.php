<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: view_position_list.php
 * Created on: Jul 19, 2020
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
    
    
    
    
/*    
    if(isset($params['code'])){                
        $_SESSION['account_code'] = $params['code'];        
    }
    
    if(isset($params['code'])){                
        $_SESSION['account_name'] = $params['name'];        
    }
*/    
    
 


?>




<html>
<head>

    <title>LISTA DE POSICIONES API&Aacute;RIO </title>
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
        
<script  type="text/javascript">
    
    function clear_pos_hist(count){
        
        var d = new Date();
        
        document.getElementById('text_pos_body'+count).value = '';
        document.getElementById('text_pos_date'+count).value = d.getFullYear()+'-'+(d.getMonth()+1).toString()+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
        document.getElementById('btn_save_pos'+count).disabled = false;
        document.getElementById('text_pos_body'+count).style.backgroundColor = 'Yellow';
        document.getElementById('text_pos_body'+count).focus();
        
                
    }



</script>
    
<a href="index.php?action=home">Inicio</a>   
<h1>POSICIONES DEL API&Aacute;RIO</h1>      
 

<?php



        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/
        
        $v_pos_histories = NULL;
            
        $v_pos_histories = $model->getLastPosHistories();
             

        
?>


<table width="100%" border="1">

<?php


        if($v_pos_histories){

            $count = 1;
            
            foreach($v_pos_histories as $pos_history){
               

?>
  
  <tr>
    <td>

        <br>        
        <br> 
        
        <br> 
        
      <form method="post" action="<?php echo $relative_path.$path_html;?>index.php" id="form_results<?php echo $count?>">
          <input type="hidden" name="action" id="action" value="saveposhistory" />
          
          <input type="hidden" name="text_count" id="text_count" value="<?php echo $count; ?>" />
          <input type="hidden" name="text_position_id<?php echo $count?>" id="text_position_id<?php echo $count?>" value="<?php echo $pos_history['position_id']; ?>" />
        
          <input class="text_pos_name" name="text_pos_name<?php echo $count?>" id="text_pos_name<?php echo $count?>" value="<?php  echo utf8_encode($pos_history['pos_name']); ?>" />
                           
        <br> 
        <br>
        <label>Descripci&oacute;n:</label><a href="index.php?action=poshisdescript&pos=<?php  echo $pos_history['position_id']; ?>">Historia</a>         
        <br>
        <textarea class="text_pos_descripcion" name="text_pos_descripcion<?php echo $count?>" id="text_pos_descripcion<?php echo $count?>"><?php echo utf8_encode($pos_history['descripcion']); ?></textarea>
        <br>
        <input  type="hidden" id="hd_change_descript<?php echo $count?>" name="hd_change_descript<?php echo $count?>"    value="<?php echo utf8_encode($pos_history['descripcion']); ?>" />   
        <br>
        <label>Fecha:</label>
        <br>
        <input class="text_pos_date" name="text_pos_date<?php echo $count; ?>" id="text_pos_date<?php echo $count; ?>" value="<?php echo $pos_history['pos_hist_date'];  ?>"/>
        <br>
        
        <input  type="hidden" id="hd_change_salud<?php echo $count?>" name="hd_change_salud<?php echo $count?>"    value="<?php echo utf8_encode($pos_history['salud']); ?>" />           
        <label>Salud:</label><a href="index.php?action=poshistsalud&pos=<?php  echo $pos_history['position_id']; ?>">Historia</a><br/>        
        <select id="slct_salud<?php echo $count; ?>" name="slct_salud<?php echo $count; ?>">
            <option <?php if($pos_history['salud']=='BUENA'){ echo ' selected '; }   ?> value='BUENA' >BUENA</option>
            <option <?php if($pos_history['salud']=='FUERTE'){ echo ' selected '; }   ?> value='FUERTE' >FUERTE</option>
            <option <?php if($pos_history['salud']=='CON TURIROS'){ echo ' selected '; }   ?> value='CON TURIROS' >CON TURIROS</option>
            <option <?php if($pos_history['salud']=='DEBIL'){ echo ' selected '; } ?> value='DEBIL'  >DEBIL</option>
            <option <?php if($pos_history['salud']=='MUERTA'){ echo ' selected '; } ?> value='MUERTA'  >MUERTA</option>
            <option <?php if($pos_history['salud']=='EXCELENTE'){ echo ' selected '; } ?>  value='EXCELENTE'  >EXCELENTE</option>                                                    
            <option <?php if($pos_history['salud']=='TRABAJANDO BIEN'){ echo ' selected '; } ?>  value='TRABAJANDO BIEN'  >TRABAJANDO BIEN</option>
            <option <?php if($pos_history['salud']=='ALIMENTAR'){ echo ' selected '; } ?>  value='ALIMENTAR'  >ALIMENTAR</option>            
            <option <?php if($pos_history['salud']=='COSECHAR'){ echo ' selected '; } ?>  value='COSECHAR'  >COSECHAR</option>                        
        </select>

        <br/>        
        <br>
        <label>Anotaci&oacute;n:</label><a href="index.php?action=poshistorylist&pos=<?php  echo $pos_history['position_id']; ?>">Historia</a>        
        <br>
        <textarea class="text_pos_body" name="text_pos_body<?php echo $count?>" id="text_pos_body<?php echo $count?>"  rows=8 ><?php echo utf8_encode($pos_history['pos_hist_body']); ?></textarea>
        <br>                
        <button type="submit" class="btn_save_pos" name="btn_save_pos<?php echo $count?>" id="btn_save_pos<?php echo $count?>" disabled="true">GRABAR</button>        
      </form>
      <button type="normal" class="btn_nueva_pos" id="btn_new_pos<?php echo $count?>" onclick="clear_pos_hist(<?php echo $count; ?>)">NUEVA ENTRADA</button>                
        
       

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
