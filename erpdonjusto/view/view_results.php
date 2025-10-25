<?php

/**
 * Project:  ErpLeo 
 * File: view_results.php
 * Created on: Feb 14, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
 */
 
?>



<html>
<head>

<title>RESULTADOS</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  

</head>

<body>
<?php

require 'view/view_links.php';

?>
        
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
    

<div class="wrapper">
    
    <?php require "view/view_menu.php";  ?>    
    
    <div id="div_target">
        
<div class="date_select_container">

      <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results">
          <input type="hidden" name="action" id="action" value="getresults" />

          <div id="div_fechas" >
              <div id="datepicker1"><h3>Fecha Inicio:<?php  if( isset( $params['edt_fecha_ini'] )){ echo $params['edt_fecha_ini']; }  ?></h3>
            <input type="hidden" name="edt_fecha_ini" id="edt_fecha_ini"    autocomplete="off"  />          
            </div>

        
              <div id="datepicker2"><h3>Fecha Fin:<?php  if( isset( $params['edt_fecha_fin'] )){ echo $params['edt_fecha_fin']; }  ?></h3>
            <input type="hidden" name="edt_fecha_fin" id="edt_fecha_fin"    autocomplete="off" />
            </div>
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
        
        $v_activos = NULL;
        $v_pasivos = NULL;
        $v_capitales = NULL;
        $v_ingresos = NULL;
        $v_egresos = NULL;
        
        if( ( isset($_POST['edt_fecha_ini']) ) && ( isset($_POST['edt_fecha_fin']) )  ){

            $v_activos = $model->getBalanceActivos($_POST['edt_fecha_ini'], $_POST['edt_fecha_fin']);
            $v_pasivos = $model->getBalancePasivos($_POST['edt_fecha_ini'], $_POST['edt_fecha_fin']);
            $v_capitales = $model->getBalanceCapitales($_POST['edt_fecha_ini'], $_POST['edt_fecha_fin']);
            $v_ingresos = $model->getResultadosIngresos($_POST['edt_fecha_ini'], $_POST['edt_fecha_fin']);
            $v_egresos = $model->getResultadosEgresos($_POST['edt_fecha_ini'], $_POST['edt_fecha_fin']);
        }

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/


?>        
 
<h2>Balance General del <?php if( isset($_POST['edt_fecha_ini'])) { echo $_POST['edt_fecha_ini']; } ?> al <?php if( isset($_POST['edt_fecha_fin'])) { echo $_POST['edt_fecha_fin']; } ?></h2>        

<div>
       
<table width="100%" border="1">

    <tr>
      <td colspan="2">ACTIVO</td>
    </tr>

<?php
        $total_activos =0;
        if($v_activos){

            

            foreach($v_activos as $activo){ 
                $total_activos = $total_activos + $activo['Suma'];
?>    
    <tr>     
	  <td><?php echo $activo['account_code']; ?></td>
      <td><?php echo  ($activo['Cuenta']); ?></td>
      <td><?php echo $activo['Suma']; ?></td>
    </tr>
      
<?php
            
            }
        } 
?>
    <tr>      
      <td>Total activos:</td>
      <td><?php echo $total_activos; ?></td>
    </tr>    
 
</table>
  
</div>

<div>
       
<table width="100%" border="1">

    <tr>
      <td colspan="2">PASIVO</td>
    </tr>

<?php
        $total_pasivos = 0;
        if($v_pasivos){

            

            foreach($v_pasivos as $pasivo){  
                $total_pasivos = $total_pasivos + $pasivo['Suma'];
?>    
    <tr>    
	  <td><?php echo $activo['account_code']; ?></td>	
      <td><?php echo  ($pasivo['Cuenta']); ?></td>
      <td><?php echo $pasivo['Suma']; ?></td>
    </tr>
      
<?php
            
            }
        } 
?>
    
    <tr>      
      <td>Total pasivos:</td>
      <td><?php echo $total_pasivos; ?></td>
    </tr>    
 
</table>
  
</div>



<div>
       
<table width="100%" border="1">

    <tr>
      <td colspan="2">CAPITAL</td>
    </tr>

<?php
        if($v_capitales){

            

            foreach($v_capitales as $capital){                  
?>    
    <tr>      
	  <td><?php echo $activo['account_code']; ?></td>
      <td><?php echo  ($capital['Cuenta']); ?></td>
      <td><?php echo $capital['Suma']; ?></td>

    </tr>
      
<?php
            
            }
        } 
?>
 
</table>
  
</div>

<h2>Estado de Resultados del <?php if( isset($_POST['edt_fecha_ini'])) { echo $_POST['edt_fecha_ini']; } ?> al <?php if( isset($_POST['edt_fecha_fin'])) { echo $_POST['edt_fecha_fin']; } ?></h2>        





<div>
       
<table width="100%" border="1">

    <tr>
      <td colspan="2">INGRESOS</td>
    </tr>

<?php
        $total_ingresos = 0;
        if($v_ingresos){

            
            
            foreach($v_ingresos as $ingreso){
                if($ingreso['Suma']>0){
                    $total_ingresos = $total_ingresos + $ingreso['Suma'];
                }
?>    
    <tr> 
	  <td><?php echo $activo['account_code']; ?></td>	
      <td><?php echo  ($ingreso['Cuenta']); ?></td>
      <td><?php echo $ingreso['Suma']; ?></td>
    </tr>
      
<?php
            
            }
        } 
?>
    <tr>      
      <td>Total ingresos:</td>
      <td><?php echo $total_ingresos; ?></td>
    </tr>
 
</table>
  
</div>




<div>
       
<table width="100%" border="1">

    <tr>
      <td colspan="2">EGRESOS</td>
    </tr>

<?php
        $total_egresos = 0;
        if($v_egresos){

            
            
            foreach($v_egresos as $egreso){  
                $total_egresos = $total_egresos + $egreso['Suma'];
?>    
    <tr>  
	  <td><?php echo $activo['account_code']; ?></td>    
      <td><?php echo  ($egreso['Cuenta']); ?></td>
      <td><?php echo $egreso['Suma']; ?></td>
    </tr>
      
<?php
            
            }
        } 
?>
    
    <tr>      
      <td>Total egresos:</td>
      <td><?php echo $total_egresos; ?></td>
    </tr>    
 
</table>
  
</div>        
        
        
        
        
        
        
        
        
      </div> <!--end wrapper-->     
</div> <!--end div_target-->





</body>
</html>