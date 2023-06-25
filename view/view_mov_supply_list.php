<?php

/**
 * Project:  ErpDonJusto
 * File: view_movment_list.php
 * Created on: Mar 15, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */





    $path = dirname(dirname(__FILE__));


    $dirname = str_replace('\\', '/', dirname(dirname(__FILE__)));

    $v_dirname = explode('/',$dirname);

    $v_script_name = explode('/',$_SERVER['SCRIPT_FILENAME']);

    $i = 0;



    $seguir = TRUE;

    while(  $seguir ){



        if($i>(count($v_dirname)-1)){

            $seguir = FALSE;

        }else{

            if($i>(count($v_script_name)-1)){

                $seguir = FALSE;

            }else{

                if($v_dirname[$i]!=$v_script_name[$i]){

                    $seguir = FALSE;

                }

            }

        }



        $i++;

    }

    $count_script=count($v_script_name);

    $relative_path='';

    for($j=$i;$j<$count_script-1;$j++){

       $relative_path .= '../';

    }

    $path_html ='';

    for($i;$i<count($v_dirname);$i++){

        $path_html .= $v_dirname[$i].'/';

    }




?>



<html>
<head>

    <title>MOVIMIENTOS DE INSUMOS</title>
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
    <div>
      <p></p>
      <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_results">
          <input type="hidden" name="action" id="action" value="movsupplylist" />

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

            $v_entries = $model->getSupplyMovementsByDateCollection($params['edt_fecha_ini'], $params['edt_fecha_fin']);

        }

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/


?>

<h2>Movimientos de Insumos <?php if( isset($params['edt_fecha_ini'])) { echo $params['edt_fecha_ini']; } ?> al <?php if( isset($_POST['edt_fecha_fin'])) { echo $_POST['edt_fecha_fin']; } ?></h2>

<div>
<table width="100%" border="1">
  <tr>
    <td>FECHA</td>
    <td>TIPO</td>
    <td>CANT</td>
    <td>PRODUCTO</td>
    <td>OBSERVACI&Oacute;N</td>
  </tr>


<?php



        if($v_entries){



            foreach($v_entries as $entry){

?>

                <tr>
                    <td><a href="<?php echo $relative_path.$path_html; ?>view/view_mov_supply_details.php?movid=<?php echo $entry['mov_supply_id']; ?>" ><?php echo $entry['mov_supply_date']; ?></a></td>
                    <td><?php echo $entry['mov_supply_type']; ?></td>
                    <td><?php echo $entry['mov_supply_cant'];?></td>
                    <td><?php echo utf8_encode($entry['supply_name']); ?></td>
                    <td><?php echo utf8_encode($entry['comments']); ?></td>
                </tr>


<?php

            }


        }



?>

</table>






</div>



</body>
</html>



