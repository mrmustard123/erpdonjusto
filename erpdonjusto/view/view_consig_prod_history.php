<?php
error_reporting(0);
/**
 * Project:  ErpDonJusto 
 * File: view_consig_prod_history.php
 * Created on: Nov 2, 2018
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


?>



<html>
<head>

    <title>HISTORICO DE CONSIGNATARIO</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
        
</head>

<body>

  <?php require "view_links.php" ?>       
    
  
        
        
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
                    if(isset($params['edt_fecha_ini'])){
                        
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
          <input type="hidden" name="action" id="action" value="consigprodhistory" />

          <div id="div_fechas" >
              <div id="datepicker1"><h3>Fecha Inicio:<?php  if( isset( $params['edt_fecha_ini'] )){ echo $params['edt_fecha_ini']; }  ?></h3>
            <input type="hidden" name="edt_fecha_ini" id="edt_fecha_ini"    autocomplete="off"  />          
            </div>

        
              <div id="datepicker2"><h3>Fecha Fin:<?php  if( isset( $params['edt_fecha_fin'] )){ echo $params['edt_fecha_fin']; }  ?></h3>
            <input type="hidden" name="edt_fecha_fin" id="edt_fecha_fin"    autocomplete="off" />
            </div>
          </div>
          <input type="hidden" id="consig_id" name="consig_id" value="<?php if(isset($_SESSION['consig_id'])){ echo  $_SESSION['consig_id']; } ?>" />          
          <div id="div_selprod">
            <select name="slct_products" id="slct_products">
                <option value="0">TODOS</option>                
              <?php //TO DO: SELECT productos 
              
    $v_products = $model->getStockActiveProducts();
    
        if($v_products){
           
            foreach($v_products as $product){                  
              
              ?>
                <option value="<?php echo $product['product_id']  ?>"><?php   echo utf8_encode($product['product_name']);   ?></option>
                <?php      //Fin select productos       ?>
                
  <?php
            }
        }
  
  
?> 
                
            </select>       
              
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

        
        if( ( isset($_POST['edt_fecha_ini']) ) && ( isset($_POST['edt_fecha_fin']) )  ){
            
            $v_entries = $model->getConsigProdHistory($params['edt_fecha_ini'], $params['edt_fecha_fin'], $params['consig_id'], $params['slct_products']);

        }

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/


?>        
 
<div id="div_tabla">
<h2>Consignaciones del <?php if( isset($params['edt_fecha_ini'])) { echo $params['edt_fecha_ini']; } ?> al <?php if( isset($_POST['edt_fecha_fin'])) { echo $_POST['edt_fecha_fin']; } ?></h2>        

<a  href="<?php echo $relative_path.$path_html; ?>view/export_libro_diario_xls.php?fecha_ini=<?php if( isset($params['edt_fecha_ini'])) {echo $params['edt_fecha_ini']; }  ?>&fecha_fin=<?php  if( isset($_POST['edt_fecha_fin'])){ echo $params['edt_fecha_fin']; } ?>" >Exportar a Excel</a>



<?php



        if($v_entries){
?>            
<table class="table table-striped"  width="100%" border="0">
  <tr>
    <th>FECHA</th>
    <th>MOVIMIENTO</th>
    <th>PRODUCTO</th>
    <th>CANTIDAD</th>
    <th>TIENE</th>
    <th>UDDS. POR PAGAR</th>
    <th>PRECIO UNITARIO</th>
    <th>TOTAL</th>
    <th>COMENTARIO</th>
    <th>CBTE. NRO.</th>
  </tr>
             

<?php            

            foreach($v_entries as $entry){



?>    
               
                <tr>
                    <td><?php echo $entry['consig_date']; ?></td>
                    <td><?php echo $entry['mov_type']; ?></td>
                    <td><?php echo $entry['product_name'];?></td>
                    <td><?php echo $entry['cant']; ?></td>
                    <td><?php echo $entry['tiene']; ?></td>
                    <td><?php echo $entry['topay']; ?></td>
                    <td><?php echo $entry['unit_price']; ?></td>
                    <td><?php echo $entry['total']; ?></td>
                    <td><?php echo utf8_encode($entry['comments']); ?></td>   
                    <td><?php echo utf8_encode($entry['cbte_cont_nro']); ?></td>  
                    


                </tr>                    
                
<?php                

            }            
        }        

?>



</table>

</div>

        </div> <!--end wrapper-->     
    </div> <!--end div_target-->    

</body>
</html>

