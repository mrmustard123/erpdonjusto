<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: view_position_list.php
 * Created on: Jul 19, 2020
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
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

    <?php require "view_links.php" ?>   
    
<!--script src="view/js/jquery-1.6.4.min.js" type="text/javascript"></script-->     
        
<script  type="text/javascript">
     
    function clear_pos_hist(count){
       
        var d = new Date();
        
        document.getElementById('text_pos_body'+count).value = '';
        document.getElementById('text_pos_date'+count).value = d.getFullYear()+'-'+(d.getMonth()+1).toString()+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
        document.getElementById('btn_save_pos'+count).disabled = false;
        document.getElementById('text_pos_body'+count).style.backgroundColor = 'Yellow';
        document.getElementById('text_pos_body'+count).focus();                       
    } 
    
    function recover_pos_hist(count){              
        document.getElementById('btn_save_pos'+count).disabled = true;
        document.getElementById('text_pos_body'+count).style.backgroundColor = 'White';                     
    }
       


</script>


<div class="wrapper">
    
        <?php require "view/view_menu.php";  ?>

        <div id="div_target">  
    
<a href="index.php?action=home">Inicio</a>   
<h1>POSICIONES DEL API&Aacute;RIO</h1>      
 

<?php



        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/
        
        $v_pos_histories = NULL;
            
        $v_pos_histories = $model->getLastPosHistories();
        
        $lenght = count($v_pos_histories);
   


 ?>


        <script type="text/javascript">
            
            
            $(document).ready(function(){       

<?php
            
               $i=1;        
            for($i=1;$i<=$lenght;$i++){
                
            
?>
     
                $("#btn_save_pos<?php echo $i; ?>").click(function(e) {
                    e.preventDefault();                    
                    
                    var contador= <?php echo $i?>;
                    var text_position_id<?php echo $i?> = $("#text_position_id<?php echo $i?>").val();
                    var text_pos_name<?php echo $i?> = $("#text_pos_name<?php echo $i?>").val();
                    var text_pos_descripcion<?php echo $i?> = $("#text_pos_descripcion<?php echo $i?>").val();
                    var text_pos_date<?php echo $i; ?> = $("#text_pos_date<?php echo $i; ?>").val();
                    var hd_change_salud<?php echo $i; ?> = $("#hd_change_salud<?php echo $i; ?>").val();
                    var slct_salud<?php echo $i; ?> = $("#slct_salud<?php echo $i; ?>").val();
                    var text_pos_body<?php echo $i?> = $("#text_pos_body<?php echo $i?>").val();                                                                
                        
                    $.ajax({
                      type:'POST',
                      data: {contador: contador, 
                        text_position_id<?php echo $i?>: text_position_id<?php echo $i?>,
                        text_pos_name<?php echo $i?>:text_pos_name<?php echo $i?>,
                        text_pos_descripcion<?php echo $i?>:text_pos_descripcion<?php echo $i?>,
                        text_pos_date<?php echo $i; ?>:text_pos_date<?php echo $i; ?>,
                        hd_change_salud<?php echo $i; ?>:hd_change_salud<?php echo $i; ?>,
                        slct_salud<?php echo $i; ?>:slct_salud<?php echo $i; ?>,
                        text_pos_body<?php echo $i?>:text_pos_body<?php echo $i?>},
                      dataType: 'JSON',
                      async: true,
                      url:'index.php?action=saveposhistory',
                      contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                      beforeSend: function() {
                        $('#btn_save_pos'+contador).prop('disabled', true);
                        $('#text_pos_body'+contador).css("background-color", "White"); 
                      },
                      success:function() {                       
                        alert('Datos salvados exitosamente');
                      }
                    });                 
                                                                        
                });                


<?php
            }//end for($i...
?>

            });            
                        
        </script> 




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
        
        
       
        

        
        <form method="post" id="form_results" accept-charset="utf-8">
          <!--input type="hidden" name="action" id="action" value="saveposhistory" /-->          
          <input type="hidden" name="text_count" id="text_count" value="" />
          <input type="hidden" name="text_position_id" id="text_position_id<?php echo $count?>" value="<?php echo $pos_history['position_id']; ?>" />
        
          <input class="text_pos_name" name="text_pos_name" id="text_pos_name<?php echo $count?>" value="<?php  echo utf8_encode($pos_history['pos_name']); ?>" />
                           
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
        <button type="normal" class="btn_save_pos" name="btn_save_pos<?php echo $count?>" id="btn_save_pos<?php echo $count?>" disabled="true">GRABAR</button>   
        
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


        </div> <!--end wrapper-->     
    </div> <!--end div_target-->   


</body>
</html>
