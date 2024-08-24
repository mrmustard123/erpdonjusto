<?php


/**
 * Project:  ErpLeo
 * File: view_home.php
 * Created on: Feb 17, 2017
 * Author: Leonardo Gabriel Tellez Saucedo (mr_mustard123@hotmail.com)
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">

        <link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />



	<script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/bootstrap.min.css" rel="stylesheet" />
        <link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />        
        <link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/styles.css" rel="stylesheet" />
	<link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo $relative_path.$path_html; ?>view/js/jquery-ui-1.11.4.js"></script>
        <script type="text/javascript" src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js"></script>
        
        

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-3.3.1.slim.min.js"></script>    
    <!-- Bootstrap JS -->
    <script src="<?php echo $relative_path.$path_html; ?>view/js/bootstrap.min.js" 
    ></script>

    <script type="text/javascript">
        
        function onclick(myurl){                                                        
            $.ajax({
                    url: myurl,
                    type: 'POST',
                    success:function(data){                        
                      $('#div_target').show();
                      $('#div_target').html(data);
                    }
            });                        
        }//end function
        
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });                     
            
            $.ajax({

                    url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethintsupply',

                    type: 'POST',

                    success:function(data){

                      $('#div_target').show();

                      $('#div_target').html(data);

                    }

            });
            
            
        });        
    </script>   
        


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



<?php

        require_once 'model/model.php';



        $model = new model();

        /*var_dump($model);*/

        $v_functionalities = NULL;

        $user_id = $_SESSION['user_id'];

        $v_functionalities = $model->getUserFunctionalities($user_id);


?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar"  style="background: #7386D5">
            <div class="sidebar-header" >
                <div style="float: left"><h3>Inicio</h3></div><div style="float: left;margin-left: 2em"><img src="<?php echo $relative_path.$path_html; ?>view/images/logo_adj.png" width="40em" height="40em"/></div>
            </div>

            <ul class="list-unstyled components">
                <p><u>Ap&iacute;cola Don Justo</u></p>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CONTABILIDAD</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <?php
                          if(in_array('13', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=formentry">&bullet;&nbsp;Asientos</a>
                        </li>
                        <?php
                          }//end if
                          if(in_array('14', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=librodiario">&bullet;&nbsp;LIBRO DI&Aacute;RIO</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('15', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=getresults">&bullet;&nbsp;RESULTADOS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('16', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=accountsplan">&bullet;&nbsp;PLAN DE CUENTAS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('17', $v_functionalities)){
                        ?>                                                
                        <li>
                            <a href="index.php?action=newaccount">&bullet;&nbsp;Nueva Cuenta</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('18', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=accountsplan">&bullet;&nbsp;LIBRO MAYOR</a>
                        </li>
                        <?php
                            }//end if
                        ?> 
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">ALMACENES</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <?php
                            if(in_array('19', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=movement">&bullet;&nbsp;Nuevo Movimiento de Producto/Ingrediente</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('20', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=mov_stock">&bullet;&nbsp;Nuevo Movimiento de Material Indirecto</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('21', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=movementslist">&bullet;&nbsp;LISTA DE MOVIMIENTOS DE PROD/INGRD</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('22', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=movsupplylist">&bullet;&nbsp;LISTA DE MOV. MATERIALES INDIRECTOS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('23', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=stock">&bullet;&nbsp;STOCK GENERAL</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('44', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_supply_price.php">&bullet;&nbsp;PRECIO DEL INSUMO</a>
                        </li>
                        <?php
                            }//end if    
                        ?>                        
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">CONSIGNACIONES/CLIENTES</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3"
                        
                        <?php
                            if(in_array('24', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consign_prod.php">&bullet;&nbsp;Consignaciones</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('25', $v_functionalities)){
                        ?>                      
                        <li>
                            <a href="view/view_new_consignee.php">&bullet;&nbsp;Nuevo Consignatario</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('26', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_lasts_mov.php">&bullet;&nbsp;ULTIMOS MOVIMIENTOS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('27', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_lasts_pay.php">&bullet;&nbsp;ULTIMOS PAGOS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('28', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_list.php">&bullet;&nbsp;LISTA DE CONSIGNATARIOS</a>
                        </li>
                        <?php
                            }//end if
                        ?>                        
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">GERENCIAL</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                        <?php
                            if(in_array('29', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_prod_sales_report1.php">&bullet;&nbsp;CONSULTA DE VENTAS X PRODUCTO PAGADAS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('38', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_prod_sales_report3.php">&bullet;&nbsp;CONSULTA DE VENTAS X PRODUCTO SALIDAS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('30', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_budget_0002.php">&bullet;&nbsp;PRESUPUESTO</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('31', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_income_outcome.php">&bullet;&nbsp;AHORRO VS. GASTO</a>
                        </li>
                           <?php
                                }//end if
                                if(in_array('39', $v_functionalities)){
                          ?>                        
                        <li>
                            <a href="view/view_farmacorps_mas_salida.php">&bullet;&nbsp;FARMACORPS CON M&Aacute;S SALIDAS(HIST&Oacute;RICO)</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('41', $v_functionalities)){
                          ?>                        
                        <li>
                            <a href="view/view_farmacorps_mas_salida_a_60_dias.php">&bullet;&nbsp;FARMACORPS CON M&Aacute;S SALIDAS A 60 D&Iacute;AS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('42', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_consig_max_sprays_stock.php">&bullet;&nbsp;CONSIGNAT&Aacute;RIOS CON MAYOR STOCK DE SPRAYS</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('43', $v_functionalities)){
                       ?>                        
                        <li>
                            <a href="view/view_salidas_farmacorp_x_mes.php">&bullet;&nbsp;SALIDAS FARMACORP X MES 2021</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('37', $v_functionalities)){
                          ?>                                                
                        <li>
                            <a href="index.php?action=pend_empresa">&bullet;&nbsp;Pendientes Empresa</a>
                        </li>
                        <?php
                            }//end if
                        ?>                                               
                        
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">APIARIO</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu6">
                        <?php
                            if(in_array('32', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=bitacora">&bullet;&nbsp;Nueva Bit&aacute;cora</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('33', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="view/view_bitacora_list.php">&bullet;&nbsp;Ver Bit&aacute;cora</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('35', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=pendientes">&bullet;&nbsp;Pendientes Apiario</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('36', $v_functionalities)){
                        ?>                        
                        <li>
                            <a href="index.php?action=poshistory">&bullet;&nbsp;Listado de Posiciones</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('45', $v_functionalities)){
                        ?>                           
                        <li>
                            <a href="index.php?action=report_pos_hist">&bullet;&nbsp;Reporte historia de posiciones</a>
                        </li>
                        <?php
                            }//end if
                            if(in_array('46', $v_functionalities)){
                        ?>                           
                        <li>
                            <a href="index.php?action=report_pos_hist_alive">&bullet;&nbsp;Reporte historia de posiciones vivas</a>
                        </li>
                        <?php
                            }//end if
                        ?>   
                        
                    </ul>
                </li>
                 
            </ul>

        </nav>
        
        <div id="div_target">
            
        </div>

    </div>
</body>
</html>


