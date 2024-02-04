<?php

/**
 * Project:  ErpDonJusto 
 * File: view_supply.php
 * Created on: Mar 13, 2017
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

        <title>MOVIMIENTO DE MATERIALES INDIRECTOS</title>
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

            /* set_item : this function will be executed when we select an item */

            /*alert('hola');*/

            function set_item(item, product_id)

            {

              // change input value 

              $('#edt_supply_id').val(item);
                   

              /* hide proposition list */

              $('#supply_list_id').hide();

              $('#hf_supply_id').val(product_id);

            }




            function get_hint(){



                var min_length = 3; /* min caracters to display the autocomplete */

                var keyword = $('#edt_supply_id').val();



                if (keyword.length >= min_length)

                {

                  $.ajax

                  ({

                    url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethintsupply',

                    type: 'POST',

                    data: {keyword:keyword},

                    success:function(data){

                      $('#supply_list_id').show();

                      $('#supply_list_id').html(data);

                    }

                   });

                }

                else

                {

                  $('#supply_list_id').hide();

                }



            }    



    </script>         

        

    <body>  
        
        
        
        
        
<?php

        require_once 'model/model.php';



        $model = new model();


        $v_movements = $model->getSupplyMovementsCollection();     

?>
        
        
    <a href="index.php?action=home">Inicio</a>

        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_mov_supply"> 

            <input type="hidden" name="action" id="action" value="save_mov_supply" />
        
                        
            <label>Fecha (yyyy-mm-dd H:m:s)</label><br/>

          <?php

                date_default_timezone_set('America/La_Paz');

                $fecha_actual = date('Y-m-d H:i:s');            

            ?>
            <input type="text" id="edt_mov_date" name="edt_mov_date"  value="<?php echo $fecha_actual; ?>" />
    <br/>            
            
            
  
            
            <label>Tipo:</label><br/>
            <select name="slct_mov_type" id="slct_mov_type">
              <option value="SALIDA">SALIDA</option>
              <option value="ENTRADA">ENTRADA</option>
            </select>
            <br/>
          Insumo:<br/>
          <input type="text" id="edt_supply_id" name="edt_supply_id" onKeyUp="get_hint()"   autocomplete="off" />
<br/>

            <ul id="supply_list_id"></ul>

            <br/>     
            
            <input type="hidden" id="hf_supply_id" name="hf_supply_id" value="0" />                                                          
            
            
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

            <input type="submit" id="btn_movement" />

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
                    <td><?php echo $movement['mov_supply_date']; ?></td>
                    <td><?php echo $movement['mov_supply_type']; ?></td>
                    <td><?php echo utf8_encode($movement['supply_name']);?></td>
                    <td><?php echo $movement['mov_supply_cant']; ?></td>
                    
                </tr>                    
                

<?php                

            }
           

        }        



?>                
        
        
    </body>
</html>