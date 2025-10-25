<?php

/**
 * Project:  ErpLeo 
 * File: view_movement.php
 * Created on: Feb 18, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */


?>  


<html>

    <head>

        <title>MOVIMIENTO</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">   
        

    </head>
    
    
<?php    require 'view/view_links.php'; ?>
    
    <!--script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>        
    <link   type="text/css"       href="view/js/jquery-ui-1.11.4.css" rel="stylesheet" />	        
    <script type="text/javascript" src="view/js/jquery-ui-1.11.4.js"></script>         
    <link   type="text/css"       href="view/css/bootstrap.min.css" rel="stylesheet" /-->            


     <script  type="text/javascript">

            /* set_item : this function will be executed when we select an item */

            /*alert('hola');*/

            function set_item(item, product_id)

            {

              // change input value 

              $('#edt_product_id').val(item);
                   

              /* hide proposition list */

              $('#product_list_id').hide();

              $('#hf_product_id').val(product_id);

            }




            function get_hint(){



                var min_length = 3; /* min caracters to display the autocomplete */

                var keyword = $('#edt_product_id').val();



                if (keyword.length >= min_length)

                {

                  $.ajax

                  ({

                    url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethintprod',

                    type: 'POST',

                    data: {keyword:keyword},

                    success:function(data){

                      $('#product_list_id').show();

                      $('#product_list_id').html(data);

                    }

                   });

                }

                else

                {

                  $('#product_list_id').hide();

                }



            }    



    </script>         

        

    <body>  
        
        
    <div class="wrapper">

        <?php require "view/view_menu.php";  ?>

        <div id="div_target">
            
      
        
<?php

        require_once 'model/model.php';



        $model = new model();


        $v_movements = $model->getMovementsCollection();     

?>
        
             
    <a href="index.php?action=home">Inicio</a>

        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_movement"> 

            <input type="hidden" name="action" id="action" value="save_movement" />
        
                        
            <label>Fecha (yyyy-mm-dd H:m:s)</label><br/>

            <?php

                date_default_timezone_set('America/La_Paz');

                $fecha_actual = date('Y-m-d H:i:s');            

            ?>

            <input type="text" id="edt_mov_date" name="edt_mov_date"  value="<?php echo $fecha_actual; ?>" /><br/>            
            
            
  
            
            <label>Tipo:</label><br/>
            <select name="slct_mov_type" id="slct_mov_type">
                <option value="ENTRADA">ENTRADA</option>                   
                <option value="SALIDA">SALIDA</option>             
            </select>
            
            <br/>
            
            <label>Producto</label><br/>

            <input type="text" id="edt_product_id" name="edt_product_id" onkeyup="get_hint()"   autocomplete="off" /><br/>

            <ul id="product_list_id"></ul>

    
            
            <input type="hidden" id="hf_product_id" name="hf_product_id" value="0" />                                                          

            <label>Raz&oacute;n:</label><br/>
            <select name="slct_mov_reason" id="slct_mov_reason">
                <option value="PRODUCCION">PRODUCCION</option>
                <option value="VENTA">VENTA</option>
                <option value="CONSIGNACION">CONSIGNACION</option>                
                <option value="DEVOLUCION">DEVOLUCION</option>   
                <option value="ALMACENAJE">ALMACENAJE</option> 
                <option value="COSECHA">COSECHA</option> 
            </select>
            
            <br/>            
            
            <label>Cant:</label><br/>

            <input type="text" id="edt_cant" name="edt_cant"/>            

            <br/>
            
            <label>Lote:</label><br/>

            <input type="text" id="edt_lot" name="edt_lot"/>            

            <br/>            

            <label>Observaciones:</label><br/>

            <textarea id="ta_comments" name="ta_comments" rows="4"></textarea><br/>



            <br/>
            <br/>

            <input type="submit" id="btn_movement" value="Aceptar"  />

        </form>        
        
            <table border="1">

                <tr>
                    <td>FECHA</td>
                    
                    <td>TIPO</td>
                    
                    <td>PRODUCTO</td>
                    
                    <td>CANT</td>                    

                </tr>        
                
<?php                

        if($v_movements){

           
            foreach($v_movements as $movement){

?>    
               
                <tr>
                    <td><?php echo $movement['mov_date']; ?></td>
                    <td><?php echo $movement['mov_type']; ?></td>
                    <td><?php echo  ($movement['product_name']);?></td>
                    <td><?php echo $movement['mov_cant']; ?></td>
                    
                </tr>                    
                

<?php                
            }           
        }        

?>                
        
        </div> <!--end wrapper-->     
    </div> <!--end div_target-->                       
                
        
    </body>
</html>




