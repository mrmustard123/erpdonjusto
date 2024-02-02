<?php 

/**
 * Project:  ErpDonJusto 
 * File: view_ldger.php
 * Created on: Mar 20, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

include "realpath.php";
    
    
    
    
    
    if(isset($params['code'])){                
        $_SESSION['account_code'] = $params['code'];        
    }
    
    if(isset($params['code'])){                
        $_SESSION['account_name'] = $params['name'];        
    }
    
    
    
    




?>




<html>
<head>

<title>LIBRO MAYOR </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  

</head>

<body>




        
<script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>        
<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />	        
<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.css" rel="stylesheet" />	        
<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/bootstrap.min.css" rel="stylesheet" />        
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
				
                jQuery('#datepicker2').datepicker({
                <?php
                    if(isset($params['edt_fecha_fin'])){
                        
                        echo 'defaultDate: "'.$params['edt_fecha_fin'].'",';
                    }                    
                ?>
                    inline: true,
                    dateFormat: "yy-mm-dd",
                    onSelect: function(date){ 
                       jQuery('#edt_fecha_fin').val(date);
                    }       
                });
			
});



</script>
    
<a href="index.php?action=home">Inicio</a>   
<h1>Libro Mayor <?php echo $_SESSION['account_code']; ?></h1>
<h1><?php echo utf8_encode($_SESSION['account_name']); ?></h1>
<div class="date_select_container">

      <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results">
          <input type="hidden" name="action" id="action" value="ledger" />

          <div id="div_fechas" >
              <div id="datepicker1"><h3>Fecha Inicio: <?php  if( isset( $params['edt_fecha_ini'] )){ echo $params['edt_fecha_ini']; }  ?></h3>
            <input type="hidden" name="edt_fecha_ini" id="edt_fecha_ini"    autocomplete="off"  />          
            </div>

        
              <div id="datepicker2"><h3>Fecha Fin: <?php  if( isset( $params['edt_fecha_fin'] )){ echo $params['edt_fecha_fin']; }  ?></h3>
            <input type="hidden" name="edt_fecha_fin" id="edt_fecha_fin"    autocomplete="off" />
            </div>
              <input type="hidden" id="edt_code" name="edt_code" value="<?php if(isset($_SESSION['account_code'])){ echo  $_SESSION['account_code']; } ?>" />
          </div>

          <div id="div_button">
          <input type="submit" name="btn_submit" id="btn_submit" value=">>> OK <<<"/>
          </div>
      </form>
      <p>&nbsp;</p>
</div>
        
 

<?php



        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/
        
        $v_entries = NULL;

        
        if( ( isset($params['edt_fecha_ini']) ) && ( isset($params['edt_fecha_fin']) )  ){
            
            $v_entries = $model->getLedger($params['edt_fecha_ini'], $params['edt_fecha_fin'], $params['edt_code']);

        }



?>


<table  class="table table-striped"  width="100%" border="0">
  <tr>
    <td>FECHA</td>
    <td>C&Oacute;DIGO</td>
    <td>NRO. DOC.</td>    
    <td>CUENTA</td>
    <td>GLOSA</td>
    <td>DEBE</td>
    <td>GLOSA</td>
    <td>HABER</td>    
  </tr>
<?php


        if($v_entries){

            $suma_debe = 0;
            $suma_haber = 0;
           // $saldo= 0;
            

            foreach($v_entries as $entry){

?>
  
  
  <tr>
    <td><?php  echo $entry['entry_date']; ?></td>
    <td><?php  echo $entry['account_code']; ?></td>
   <td><?php  echo $entry['cbte_cont_nro']; ?></td>    
    <td><?php  echo utf8_encode($entry['name']); ?></td>
    <td><?php  if($entry['balance']>0){ echo utf8_encode($entry['details']); }else{ echo '&nbsp;';} ?></td>
    <td><?php  if($entry['balance']>0){ echo bcdiv($entry['balance'],1,2)   ; $suma_debe = $suma_debe +$entry['balance']; }else{ echo '&nbsp;';} ?></td>
    <td><?php  if($entry['balance']<0){ echo utf8_encode($entry['details']); }else{ echo '&nbsp;';} ?></td>
    <td><?php  if($entry['balance']<0){ echo bcdiv($entry['balance'],1,2); $suma_haber = $suma_haber +$entry['balance'];}else{ echo '&nbsp;';} ?></td>
  </tr>
  
  
<?php

                 

            }
            
?>
  <tr>
    <td>TOTAL: </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
    <td><?php  echo number_format($suma_debe, 2, '.',''); ?></td>
    <td></td>
    <td><?php  echo number_format($suma_haber, 2, '.',''); ?></td>  
  </tr>
  
  
  
<?php  
            
            
            
        }


?>
</table>
</body>
</html>