<?php


/**
 * Project:  ErpLeo
 * File: view_home.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">

        <link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />



	<script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />
	<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.js"></script>


<title>ERP DON JUSTO</title>
</head>

<body>

        <script>
            var refreshSn = function ()
            {
                var time = 300000; // 5 mins
                setTimeout(
                    function ()
                    {
                    $.ajax({
                       url: '<?php echo $relative_path.$path_html; ?>view/refresh_session.php',
                       cache: false,
                       complete: function () {refreshSn();}
                    });
                },
                time
            );
            };

            // Call in page
            refreshSn()
        </script>

<h2>INICIO</h2>


<?php

        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/

        $v_functionalities = NULL;

        $user_id = $_SESSION['user_id'];

        $v_functionalities = $model->getUserFunctionalities($user_id);




?>

<table width="100%" border="0">
  <tr>
    <td>CONTABILIDAD</td>
  </tr>
  <?php

    if(in_array('13', $v_functionalities)){


  ?>

  <tr>
      <td class="menu_ppal_btn"><a href="index.php?action=formentry">-Asientos</a></td>
  </tr>

  <?php

    }//end if

    if(in_array('14', $v_functionalities)){


  ?>

  <tr>
      <td class="menu_ppal_btn"><a href="index.php?action=librodiario">-LIBRO DI&Aacute;RIO</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('15', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=getresults">-RESULTADOS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('16', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=accountsplan">-PLAN DE CUENTAS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('17', $v_functionalities)){

  ?>
 <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=newaccount">-Nueva Cuenta</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('18', $v_functionalities)){

  ?>

  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=accountsplan">-LIBRO MAYOR</a></td>
  </tr>
    <?php

    }//end if



  ?>
  <tr>
    <td>ALMACENES</td>
  </tr>
    <?php


    if(in_array('19', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=movement">-Nuevo Movimiento de Producto/Ingrediente</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('20', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=mov_stock">-Nuevo Movimiento de Material Indirecto</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('21', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=movementslist">-LISTA DE MOVIMIENTOS DE PROD/INGRD</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('22', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=movsupplylist">-LISTA DE MOV. MATERIALES INDIRECTOS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('23', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=stock">-STOCK GENERAL</a></td>
  </tr>
    <?php

    }//end if
    
    if(in_array('44', $v_functionalities)){

  ?>
  <tr>
    <td class="menu_ppal_btn"><a href="view/view_supply_price.php">-PRECIO DEL INSUMO</a></td>
  </tr>
    <?php

    }//end if    



  ?>
  <!--tr>
    <td>CRM</td>
  </tr>
  <tr>
      <td class="menu_ppal_btn"><a href="index.php?action=client">-Nuevo Cliente</a></td>
  </tr>
  <tr>
    <td class="menu_ppal_btn"><a href="index.php?action=clientlist">-LISTA DE CLIENTES</a></td>
  </tr-->

  <tr>
    <td>CONSIGNACIONES/CLIENTES</td>
  </tr>
    <?php



    if(in_array('24', $v_functionalities)){

  ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consign_prod.php">-Consignaciones</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('25', $v_functionalities)){

    ?>
    <tr>
      <!--td class="menu_ppal_btn"><a href="view/view_consignee.php">-Nuevo Consignatario</a></td-->
      <td class="menu_ppal_btn"><a href="view/view_new_consignee.php">-Nuevo Consignatario</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('26', $v_functionalities)){

    ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_lasts_mov.php">-ULTIMOS MOVIMIENTOS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('27', $v_functionalities)){

    ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_lasts_pay.php">-ULTIMOS PAGOS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('28', $v_functionalities)){

    ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_list.php">-LISTA DE CONSIGNATARIOS</a></td>
  </tr>
    <?php

    }//end if



    ?>
    <tr>
    <td>GERENCIAL</td>
    </tr>
    <?php



    if(in_array('29', $v_functionalities)){

    ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_prod_sales_report1.php">-CONSULTA DE VENTAS X PRODUCTO PAGADAS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('38', $v_functionalities)){

    ?>
  <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_prod_sales_report3.php">-CONSULTA DE VENTAS X PRODUCTO SALIDAS</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('30', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_budget_0002.php">-PRESUPUESTO</a></td>
  </tr>
    <?php

    }//end if

    if(in_array('31', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_income_outcome.php">-AHORRO VS. GASTO</a></td>
  </tr>
      <?php

    }//end if

    if(in_array('39', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_farmacorps_mas_salida.php">-FARMACORPS CON M&Aacute;S SALIDAS(HIST&Oacute;RICO)</a></td>
  </tr>
      <?php

    }//end if



    if(in_array('41', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_farmacorps_mas_salida_a_60_dias.php">-FARMACORPS CON M&Aacute;S SALIDAS A 60 D&Iacute;AS</a></td>
  </tr>
      <?php

    }//end if

    if(in_array('42', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_consig_max_sprays_stock.php">-CONSIGNAT&Aacute;RIOS CON MAYOR STOCK DE SPRAYS</a></td>
  </tr>
      <?php

    }//end if



    if(in_array('43', $v_functionalities)){

    ?>
    <tr>
      <td class="menu_ppal_btn"><a href="view/view_salidas_farmacorp_x_mes.php">-SALIDAS FARMACORP X MES 2021</a></td>
  </tr>
      <?php

    }//end if


    if(in_array('37', $v_functionalities)){

    ?>
    <tr>
        <td class="menu_ppal_btn"><a href="index.php?action=pend_empresa">-Pendientes Empresa</a></td>
    </tr>
    <?php

    }//end if

    ?>

    <tr>
    <td>APIARIO</td>
    </tr>

    <?php



    if(in_array('32', $v_functionalities)){

    ?>

    <tr>
        <td class="menu_ppal_btn"><a href="index.php?action=bitacora">-Nueva Bit&aacute;cora</a></td>
   </tr>

    <?php

    }//end if

    if(in_array('33', $v_functionalities)){

    ?>

   <tr>
        <td class="menu_ppal_btn"><a href="view/view_bitacora_list.php">-Ver Bit&aacute;cora</a></td>
   </tr>
    <?php

    }//end if

    if(in_array('35', $v_functionalities)){

    ?>
    <tr>
        <td class="menu_ppal_btn"><a href="index.php?action=pendientes">-Pendientes Apiario</a></td>
   </tr>
    <?php

    }//end if

    if(in_array('36', $v_functionalities)){

    ?>

    <tr>
        <td class="menu_ppal_btn"><a href="index.php?action=poshistory">-Listado de Posiciones</a></td>
   </tr>
    <?php

    }//end if

    if(in_array('45', $v_functionalities)){

    ?>   
   
    <tr>
        <td class="menu_ppal_btn"><a href="index.php?action=report_pos_hist">-Reporte historia de posiciones</a></td>
   </tr>
    <?php

    }//end if

    ?>   



</table>





</body>
</html>


