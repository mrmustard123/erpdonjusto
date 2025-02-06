<?php
error_reporting(E_ALL);
/**
 * Project:  ErpDonJusto 
 * File: view_diary.php
 * Created on: Mar 7, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


?>



<html>
<head>

    <title>LIBRO DI&Aacute;RIO</title>
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
          <input type="hidden" name="action" id="action" value="librodiario" />

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
        
        $v_entries = NULL;

        
        if( ( isset($_POST['edt_fecha_ini']) ) && ( isset($_POST['edt_fecha_fin']) )  ){
            
            $v_entries = $model->getLibroDiario($params['edt_fecha_ini'], $params['edt_fecha_fin']);

        }

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/


?>        
 
<div id="div_tabla">
<h2>Libro Di&aacute;rio del <?php if( isset($params['edt_fecha_ini'])) { echo $params['edt_fecha_ini']; } ?> al <?php if( isset($_POST['edt_fecha_fin'])) { echo $_POST['edt_fecha_fin']; } ?></h2>        

<a  href="<?php echo $relative_path.$path_html; ?>view/export_libro_diario_xls.php?fecha_ini=<?php if( isset($params['edt_fecha_ini'])) {echo $params['edt_fecha_ini']; }  ?>&fecha_fin=<?php  if( isset($_POST['edt_fecha_fin'])){ echo $params['edt_fecha_fin']; } ?>" >Exportar a Excel</a>


<table class="table table-striped"  width="100%" border="0">
  <tr>
    <th>ID</th>
    <th>FECHA</th>
    <th>CODIGO</th>
    <th>CUENTA</th>
    <th>GLOSA</th>
    <th>DEBE</th>
    <th>HABER</th>
    <th>NRO. DOC</th>    
  </tr>
 
<?php



        if($v_entries){

            

            foreach($v_entries as $entry){
                
                $new_entry = $entry['entry_date'];
                                        
                if($old_entry!='')
                {
                    if($new_entry!=$old_entry)
                    {
?>                
                        <tr>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>
                            <td>****</td>    
                        </tr> 
<?php                 
                    }
                }                

?>    
               
                <tr>
                    <td><?php echo $entry['entry_id']; ?></td>
                    <td><?php echo $entry['entry_date']; ?></td>
                    <td><?php echo $entry['account_code']; ?></td>
                    <td><?php 
                        if($entry['balance']>=0){
                            echo utf8_encode($entry['name']);
                        }else{
                            echo '&nbsp;&nbsp;'.utf8_encode($entry['name']);
                        }
                        ?>
                    </td>
                    <td class="entry_details"><?php echo ($entry['details']); ?></td>

                    <td><?php 

                            if($entry['balance']>=0){

                                echo bcdiv($entry['balance'],1,2) ; 

                            }

                            

                            ?>

                    </td>

                    <td><?php 

                            if($entry['balance']<0){

                                echo bcdiv($entry['balance'],1, 2)  ; 

                            }                    

                    

                    ?></td>
                    <td><?php echo $entry['cbte_cont_nro']; ?></td>
                </tr> 
                

<?php                
                $old_entry = $entry['entry_date'];
                
             
            }
           

        }        

?>
                
               

</table>

</div>

        </div> <!--end wrapper-->     
    </div> <!--end div_target-->            

</body>
</html>

