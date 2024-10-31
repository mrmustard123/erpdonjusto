<?php

/*
File: test3
Author: Leonardo G. Tellez Saucedo
Created on: 28 ago. de 2024 16:47:14
Email: leonardo616@gmail.com
*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Button Click JQuery </title>


    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>    

    <script type="text/javascript">
            $(document).ready
            (function(){            
                $("#btn_save_pos").click(function(e) {
                  e.preventDefault();

                  alert('hola mundo!');

                });                 
            });
    </script>    



</head>

<body>
    
    
    <form method="post" action="test3.php" id="form_results" accept-charset="utf-8">
          <input type="hidden" name="action" id="action" value="saveposhistory" />          
          <input type="hidden" name="text_count" id="text_count" value="1" />
          <input type="hidden" name="text_position_id" id="text_position_id" value="1" />
        
          <input class="text_pos_name" name="text_pos_name" id="text_pos_name" value="Posicion 1" />
                           
        <br> 
        <br>
        <label>Descripci&oacute;n:</label><a href="test3.php">Historia</a>         
        <br>
        <textarea class="text_pos_descripcion" name="text_pos_descripcion" id="text_pos_descripcion">Descripcion </textarea>
        <br>
        <input  type="hidden" id="hd_change_descript" name="hd_change_descript"    value="HOli holi" />   
        <br>
        <label>Fecha:</label>
        <br>
        <input class="text_pos_date" name="text_pos_date" id="text_pos_date" value="2024-08-28"/>
        <br>
        
        <input  type="hidden" id="hd_change_salud" name="hd_change_salud"    value="Salud" />           
        <label>Salud:</label><a href="test3.php">Historia</a><br/>        
        <select id="slct_salud" name="slct_salud">
            <option selected  value='BUENA' >BUENA</option>
            <option  value='FUERTE' >FUERTE</option>
            <option  value='CON TURIROS' >CON TURIROS</option>
            <option value='DEBIL'  >DEBIL</option>
            <option  value='MUERTA'  >MUERTA</option>
            <option   value='EXCELENTE'  >EXCELENTE</option>                                                    
            <option   value='TRABAJANDO BIEN'  >TRABAJANDO BIEN</option>
            <option   value='ALIMENTAR'  >ALIMENTAR</option>            
            <option   value='COSECHAR'  >COSECHAR</option>                        
        </select>

        <br/>        
        <br>
        <label>Anotaci&oacute;n:</label><a href="test3.php">Historia</a>        
        <br>
        <textarea class="text_pos_body" name="text_pos_body" id="text_pos_body"  rows=8 >Holi holi holi</textarea>
        <br>                
        <button type="normal" class="btn_save_pos" name="btn_save_pos" id="btn_save_pos">GRABAR</button>        
      </form>    
    
    
    
    



</body>

</html>


