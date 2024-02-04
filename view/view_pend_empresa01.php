<?php
error_reporting(0);
/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: view_pend_empresa01.php
 * Created on: Sep 17, 2020
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

require_once "realpath.php";
$paths = realpath::get_realpath();
$relative_path = $paths["relative_path"];
$path_html = $paths["path_html"];
/*
echo 'Relative path: '.$relative_path.'<br/>';
echo 'Path html: '.$path_html.'<br/>';
*/
?>



<html>
<head>

    <title>PENDIENTES EMPRESA</title>
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


jQuery( document ).ready(function(){

                jQuery('#datepicker1').datepicker({
                <?php    
                    if(isset($params['edt_fecha_ini'])){
                        
                        echo 'defaultDate: "'.$params['edt_fecha_ini'].'",';
                    }         
                ?>    
                
                    inline: true,
                    dateFormat: "yy-mm-dd",
                    onSelect: function(date){ 
                       jQuery('#edt_fecha_ini').val(date);
                    }                                               
                });
				             
                
				
});



</script>
    
<a href="index.php?action=home">Inicio</a>   
<div class="date_select_container">

      <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results">
          <input type="hidden" name="action" id="action" value="nuevo_pend_empr" />

          <div id="div_fechas" >
            <div id="datepicker1">
                <h3>Fecha:</h3>
                <input type="hidden" name="edt_fecha_ini" id="edt_fecha_ini"    autocomplete="off"  />
            </div>
              <br>
              <label for="lname"><h3>Pendiente:</h3></label>
              <textarea type="text" id="txt_pendiente" name="txt_pendiente" rows="4" cols="20"  > </textarea>
              <label for="lname"><h3>Asignaci&oacute;n</h3></label>
              <input type="text" id="txt_asignacion" name="txt_asignacion" autocomplete="off" >              
          </div>

          <div id="div_button">
          <input type="submit" name="btn_submit" id="btn_submit" value="Adicionar"/>
          </div>
      </form>
      <p>&nbsp;</p>
</div>
        
        
        
        
        

<?php


        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/
        
        $v_entries = NULL;


            
            $v_entries = $model->getPendEmpresa();

        

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/


?>        
 
<div id="div_tabla">




<table width="100%" border="1">
 
<?php



        if($v_entries){

            

            foreach($v_entries as $entry){



?>    
               
                <tr>
                    <td>
                        
                        
                        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results<?php echo $entry['pend_empresa_id']; ?>">
                                <input type="hidden" name="action" id="action" value="modif_pend_empr" />
                                
                                <input type="hidden" name="id_pend_empr" id="id_pend_empr" value="<?php echo $entry['pend_empresa_id']; ?>" />
                                <label>Fecha:</label><br>
                                <label><?php echo $entry['fecha'];   ?></label><br> 
                                <input type="hidden" name="edt_fecha_ini<?php echo $entry['pend_empresa_id']; ?>" id="edt_fecha_ini<?php echo $entry['pend_empresa_id']; ?>"  value="<?php echo $entry['fecha']; ?>"  />
                                <br>
                                <label for="lname">Pendiente:</label> <br>
                                <textarea  id="txt_pendiente<?php echo $entry['pend_empresa_id']; ?>" name="txt_pendiente<?php echo $entry['pend_empresa_id']; ?>"   rows="4" cols="20" > <?php echo utf8_encode($entry['cuerpo']); ?> </textarea> <br>
                                <label for="lname">Asignaci&oacute;n:</label><br>
                                <input type="text" id="txt_asignacion<?php echo $entry['pend_empresa_id']; ?>" name="txt_asignacion<?php echo $entry['pend_empresa_id']; ?>" autocomplete="off"  value="<?php echo $entry['responsable']; ?>">              
                                <br>
                                <label>Realizado:  </label>
                                <input type="checkbox" name="chk_realizado<?php echo $entry['pend_empresa_id']; ?>" value="S"> 
                            

                            <div id="div_button">
                            <input type="submit" name="btn_submit" id="btn_submit" value="Modificar"/>
                            </div>
                        </form>                        
                                                                        
                    
                    </td>
                </tr>                    
                

<?php                

            }
           

        }        



?>

</table>

</div>


</body>
</html>
