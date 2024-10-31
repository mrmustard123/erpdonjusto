<?php

/**
 * Project:  erpdonjusto_1_0_0_6 
 * File: view_bitacora.php
 * Created on: Jun 18, 2020
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

    <title>BIT&Aacute;CORA</title>
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
                    if(isset($params['edt_fecha'])){
                        
                        echo 'defaultDate: "'.$params['edt_fecha'].'",';
                    }         
                ?>    
                
                    inline: true,
                    dateFormat: "yy-mm-dd",
                    onSelect: function(date){ 
                       jQuery('#edt_fecha').val(date);
                    }                                               
                });
				                                				




});



</script>  

<a href="index.php?action=home">Inicio</a>  

      <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results">
          <input type="hidden" name="action" id="action" value="savebitacora" />

          <div id="div_fecha_bitacora" >
              <div id="datepicker1"><h3>Fecha Inicio:<?php  if( isset( $params['edt_fecha'] )){ echo $params['edt_fecha']; }  ?></h3>
            <input type="hidden" name="edt_fecha" id="edt_fecha_ini"    autocomplete="off"  />          
            </div>
          </div>
          
          <div id="cuerpo_bitacora">
            <textarea name="edt_cuerpo" rows="20" cols="35"></textarea>
          </div>
                    

          <div id="div_button">
          <input type="submit" name="btn_submit" id="btn_submit" value=">>> OK <<<"/>
          </div>
      </form>



</body>
</html>
