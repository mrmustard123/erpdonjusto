<?php
//error_reporting(E_ALL);
error_reporting(0);
session_start();
$_SESSION['view']='radphp';

require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("dbctrls.inc.php");
use_unit("mysql.inc.php");

require_once("database_module01.php");
include("../model/class.db.php");


//Class definition
class view_consign extends Page
{
    public $Label6 = null;
    public $consig_prod_id1 = null;
    public $Label1 = null;
    public $consig_date1 = null;
    public $Label2 = null;
    public $consig_id1 = null;
    public $Label3 = null;
    public $product_id1 = null;
    public $Label4 = null;
    public $cant1 = null;
    public $unit_price1 = null;
    public $Label15 = null;
    public $Label10 = null;
    public $Label14 = null;
    public $lblTiene1 = null;
    public $lblDebe1 = null;
    public $Label5 = null;
    public $Label13 = null;
    public $mov_type1 = null;
    public $lote1 = null;
    public $comments1 = null;
    public $cbte_cont_tipo1 = null;
    public $Label7 = null;
    public $Label16 = null;
    public $cte_cont_nro1 = null;
    public $Button1 = null;
    public $DBRepeater1 = null;
    public $dsbalance_checksum1 = null;
    public $qry_prod_cost = null;
    public $consignee_list = null;
    public $account_list = null;
    public $movement_list = null;
    public $entry_list = null;
    public $Datasource2 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $consig_prod_list = null;
    public $dsconsig_prod1 = null;
    public $dsproduct1 = null;
    public $dsconsignee1 = null;
    public $Query2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $qry_prod_cost_prod = null;
    public $product_list = null;
    public $tbentry1 = null;
    public $configuration_list = null;
    public $tbbalance_checksum1 = null;
    public $qry_budget = null;
    public $Panel1 = null;
    function view_consignBeforeShow($sender, $params)
    {

        $this->product_list->first();
        $this->product_list->Filter = " status='ACTIVO' ";
        $this->product_id1->Clear();

        $this->product_id1->AddItem('[selecionar]', null, 0);
        while(!$this->product_list->EOF){
            $product_name = $this->product_list->fieldget('product_name');
            $product_id = $this->product_list->fieldget('product_id');
            $this->product_id1->AddItem($product_name , null, $product_id);
            $this->product_list->next();
        }

        $this->consignee_list->first();
        $this->consig_id1->Clear();

        $this->consig_id1->AddItem('[selecionar]', null, 0);
        while(!$this->consignee_list->EOF){
            $consig_name = $this->consignee_list->fieldget('consig_name');
            $consig_id = $this->consignee_list->fieldget('consig_id');
            $this->consig_id1->AddItem($consig_name , null, $consig_id);
            $this->consignee_list->next();
        }
        $this->consig_id1->setItemIndex( $_SESSION['consig_id']);

    }


    function view_consignShowHeader($sender, $params)
    {



        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

         require 'view_links.php';


        //echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
       // echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';


        ?>

        <script  type="text/javascript">


            jQuery(document).ready
            (function(){

                $("#product_id1").change(function() {


                        var product_id = $('#product_id1').val();
                        var consig_id = $('#consig_id1').val();

                        $.ajax
                        ({

                          url: 'view_get_consig_prod.php',

                          type: 'POST',

                          data: { consig_id: consig_id, product_id: product_id  },

                          success:function(data){
                            var res = data.split(",");
                            $('#lblTiene1').html(res[0]);
                            $('#lblDebe1').html(res[1]);
                          }

                         });

                });

            });


    </script>

        <?php



    }

    function Button1Click($sender, $params){


        date_default_timezone_set('America/La_Paz');

        $consig_id = $this->consig_id1->getItemIndex();
        $product_id = $this->product_id1->getItemIndex();

        $this->Query2->Active = false;
        $this->Query2->close();

        /* Obtenemos los datos del producto en esta consignacion*/
        $sql1 = ' SELECT
                            *
                    FROM
                            consig_prod
                    WHERE
                            product_id = '.$product_id.'
                    AND consig_id = '.$consig_id.'
                    ORDER BY
                            consig_date DESC
                    ';
        $this->Query2->LimitStart=0;
        $this->Query2->LimitCount=1;
        $this->Query2->setSQL($sql1);
        $this->Query2->Active = true;
        $this->Query2->Prepare();
        $this->Query2->open();

        if($this->Query2->RecordCount > 0){
            $consig_balance = $this->Query2->fieldget('balance');
            $owes = $this->Query2->fieldget('owes');
            $unit_price = $this->Query2->fieldget('unit_price');
            $total_price = $this->Query2->fieldget('total_price');
        }else{
            $consig_balance = 0;
            $owes = 0;
            $unit_price = 0;
            $total_price = 0;
        }


        if(!$consig_balance){
            $consig_balance = 0;
        }

        $cant = $this->cant1->Text;

        $mov_type = $this->mov_type1->Items[$this->mov_type1->getItemIndex()];



/**********OBTENEMOS LOS DATOS***********************************************/
        /*Obtenemos la cuenta del consignatario*/
        //$consig_id = $this->consig_id1->getItemIndex();
        $this->consignee_list->LimitStart=-1;
        $this->consignee_list->LimitCount = -1;
        $this->consignee_list->close();
        $this->consignee_list->Filter = 'consig_id = '.$consig_id;
        $this->consignee_list->open();
        $consignee_account_id = $this->consignee_list->fieldget('account_id');
        $cuentas_por_cobrar_a_clientes_account_id =$this->consignee_list->fieldget('ctas_por_cobrar_id');

        $this->consignee_list->close();
        $this->consignee_list->Filter = ''; /*restauramos la tabla*/
        $this->consignee_list->open();

/**** VOY A ANULAR ESTE FRAGMENTO, EL production_cost LO OBTENDREMOS DIRECTO DE product
        //Obtenemos los costos para este producto
        $prod_cost_prod = $this->getProdCostProdCollection($product_id);
        if($prod_cost_prod){


            //COSTOS DE PRODUCCION
            //TO DO: Asentar los costos de produccion y crear el(los)
            //producto(s) por los que se esta pagando.

            $longitud = count($prod_cost_prod);


            $production_cost = 0;
            for($i=1;$i<=$longitud;$i++){
                if($prod_cost_prod[$i]['cost_type']=='PRODUCCION'){
                    $production_cost = $production_cost + $prod_cost_prod[$i]['cost_value'];
                }
            }//end for
        }
*/


        //Obtenemos el precio del producto y el codigo de la cuenta
        $this->product_list->close();
        $this->product_list->Filter = 'product_id = '.$product_id;
        $this->product_list->open();
        $product_account_id = $this->product_list->fieldget('account_id');
        $production_cost = $this->product_list->fieldget('production_cost');


        $this->product_list->close();
        $this->product_list->Filter = " status='ACTIVO' "; /*restauramos la tabla*/
        $this->product_list->open();

        $consignatario = $this->consig_id1->Items[$this->consig_id1->readItemIndex()];
        $cantidad = $this->cant1->Text;
        $producto = $this->product_id1->Items[$this->product_id1->readItemIndex()];
        $lote=$this->lote1->Text;
        $comments = ($this->consig_prod_list->fieldget('comments'));
        $fecha_actual = $this->consig_date1->Text;
        $user_id = $_SESSION['user_id'];



        $this->configuration_list->close();
        $this->configuration_list->Filter = " config_name= 'Utilidades para socios' ";
        $this->configuration_list->open();

        $utilidades_account_id = $this->configuration_list->fieldget('config_value');


        $this->configuration_list->close();
        $this->configuration_list->Filter = "";
        $this->configuration_list->open();


        $this->account_list->close();
        $this->account_list->LimitStart=-1;
        $this->account_list->LimitCount = -1;
        $this->account_list->Filter = ''; /*restauramos la tabla*/
        $this->account_list->open();



/*
        $this->configuration_list->close();
        $this->configuration_list->Filter = " config_name= 'Cta. Caja General' ";
        $this->configuration_list->open();

        $caja_general_account_id = $this->configuration_list->fieldget('config_value');
*/

        $caja_general_account_id = 1;  //Eliminar esta variable

        $this->configuration_list->close();
        $this->configuration_list->Filter = "";
        $this->configuration_list->open();




        $this->account_list->close();
        $this->account_list->LimitStart=-1;
        $this->account_list->LimitCount = -1;
        $this->account_list->Filter = ''; /*restauramos la tabla*/
        $this->account_list->open();

/******************************************************************************/

        switch($mov_type){
            case 'ENTRADA':
                $unit_price = $this->unit_price1->Text;

                $consig_balance = $consig_balance + $cant;
                $owes = $owes + $cant;
                $total_price = $cant * $unit_price;

                $this->consignation_input($consignee_account_id, $unit_price, $consignatario, $cantidad, $lote, $producto,$product_id,$production_cost,$product_account_id, $user_id,$fecha_actual,$comments);

                break;

            case 'SALIDA':

                if($this->unit_price1->Text!=0){
                    $unit_price = $this->unit_price1->Text;
                }


                $consig_balance = $consig_balance - $cant;
                $owes = $owes;
                $total_price = $cant * $unit_price;

                $this->consignation_output($consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id);

                break;

            case 'DEVOLUCION':
                $consig_balance = $consig_balance - $cant;
                $owes = $owes - $cant;
                $total_price = $cant * $unit_price;

                $this->consignation_return($consignee_account_id,$consignatario,$unit_price,$cantidad, $producto,$product_id,$production_cost,$product_account_id,$user_id,$comments,$fecha_actual);

                break;
            case 'PAGO':

                if($this->unit_price1->Text!=0){
                    $unit_price = $this->unit_price1->Text;
                }
                $cuentas_por_cobrar_clientes = $owes - $consig_balance;
                $total_price = $cant * $unit_price;
                $pago_normal = $cant-$cuentas_por_cobrar_clientes;
                $owes = $owes - $cant;
                if($pago_normal < 0){
                    $consig_balance =  $consig_balance;
                    $pago_por_cobrar = $cant;
                }else{
                    $consig_balance = $consig_balance - $pago_normal;
                    $pago_por_cobrar = $cant - $pago_normal;
                }

                $this->consignation_payment($cuentas_por_cobrar_clientes, $consignee_account_id,$unit_price, $consignatario, $cantidad, $pago_normal, $pago_por_cobrar, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id);

                break;



            case 'STOCK':

                if($this->unit_price1->Text!=0){
                    $unit_price = $this->unit_price1->Text;
                }

                $consig_balance_old = $consig_balance;
                $cantidad = $consig_balance_old - $cant;
                $consig_balance = $consig_balance - $cantidad;
                //$consig_balance = $consig_balance - $consig_balance_old;
                $owes = $owes;
                $total_price = $cantidad * $unit_price;
                $this->consig_prod_list->fieldset('mov_type', 'SALIDA');
                $this->consig_prod_list->fieldset('cant', $cantidad);
                if($cantidad==0){
                    $this->consig_prod_list->fieldset('mov_type', 'REVISION');
                }else{
                    $this->consignation_output($consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id);
                }

                break;


        }

        $topay = $owes-$consig_balance;

        $this->consig_prod_list->fieldset('total_price', $total_price);
        $this->consig_prod_list->fieldset('balance', $consig_balance);
        $this->consig_prod_list->fieldset('owes', $owes);
        $this->consig_prod_list->fieldset('topay', $topay);
        $this->consig_prod_list->fieldset('consig_id', $consig_id);
        $this->consig_prod_list->fieldset('product_id', $product_id);
        $this->consig_prod_list->fieldset('comments',utf8_encode($comments));
        $this->consig_prod_list->post();
        $this->consig_id1->setItemIndex(-1);
        $this->product_id1->setItemIndex(-1);

    }

    function consignation_input($consignee_account_id, $unit_price, $consignatario, $cantidad, $lote, $producto,$product_id,$production_cost,$product_account_id, $user_id,$fecha_actual,$comments){
                        /*TO DO:
                  * 1.- Sacar de stock
                  * 1.1.- Buscar codigo de la cuenta del producto
                  * 1.2.- Insertar nuevo asiento de salida del producto de stock
                  * 1.2.1.- Obtener precio de venta
                  * 2.- Meter a consignacion
                  * 2.1.- Insertar nuevo asiento de entrada del producto a la consignacion
                  * 3.- Insertar nuevo movimiento en la tabla de consingaciones
                    4.- Instertar nuevo movimiento de salida de almacen
                    5.- Disminuir stock del producto.
                  */


                  date_default_timezone_set('America/La_Paz');



                 /*4TO ASIENTO
                  * Poner en el Debe el precio de venta
                  */

                 $balance = $cantidad * $unit_price;

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments) );
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();

                  //1ER ASIENTO
                  /*PONER EN EL HABER EL PRODUCTO QUE SALE DE ALMACEN DE PRODUCTOS TERMINADOS*/


                 $this->consig_prod_list->fieldset('consig_date', $fecha_actual);

                  $balance = $cantidad * $production_cost * -1;
                  if($production_cost == 0){
                      $balance = 0;
                  }


                  //1ER ASIENTO
                  //Costo de producción del producto en el haber
                  $this->entry_list->append();
                  $this->entry_list->fieldset('entry_date',$fecha_actual);
                  $this->entry_list->fieldset('details',utf8_encode($comments));
                  $this->entry_list->fieldset('balance',$balance);
                  $this->entry_list->fieldset('account_id',$product_account_id);
                  $this->entry_list->fieldset('user_id',$user_id);
                  $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                  $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                  $this->entry_list->post();



                  //2DO ASIENTO
                  /* Poner la ganancia del producto vendido (sin la utilidad para socios) */

                 $prod_cost_prod = $this->getProdCostProdCollection($product_id);
                 if($prod_cost_prod){
                    //TO DO: Asentar los costos de produccion y crear el(los)
                    //producto(s) por los que se esta pagando.

                    $longitud = count($prod_cost_prod);

                    $costos_x_cobrar = 0;
                    for($i=1;$i<=$longitud;$i++){


                            if($prod_cost_prod[$i]['cost_type']=='VENTA'){
                              $costos_x_cobrar = $costos_x_cobrar + ($prod_cost_prod[$i]['cost_value']*$unit_price);
                            }else{
                              $costos_x_cobrar = $costos_x_cobrar + $prod_cost_prod[$i]['cost_value'];

                            }




                    }//end for
                 }//end if

                 $balance= $cantidad*($costos_x_cobrar-$production_cost)*-1;


                 /*Primero obtenemos el id de la cuenta "Costos por cobrar"
                  *de la tabla de configuraciones del sistema            */

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = " config_name= 'COSTOS X COBRAR' ";
                  $this->configuration_list->open();

                  $ganancia_por_venta_de_productos_id = $this->configuration_list->fieldget('config_value');

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = "";
                  $this->configuration_list->open();


                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments));
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $ganancia_por_venta_de_productos_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();

                 $costos_x_cobrar_menos_production_cost = $balance;


                  $this->configuration_list->close();
                  $this->configuration_list->Filter = " config_name= 'Utilidades para socios' ";
                  $this->configuration_list->open();

                  $utilidades_para_socios_id = $this->configuration_list->fieldget('config_value');

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = "";
                  $this->configuration_list->open();



                 //3ER ASIENTO
                 /*Poner utilidades para socios en el haber               */
                  /* $balance = $cantidad * ( $unit_price - ($product_cost+($costos_x_cobrar-$product_cost))*-1; simplificando $product_cost:*/
                 $balance = $cantidad * ( $unit_price - ($costos_x_cobrar))*-1;

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details', utf8_encode($comments));
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $utilidades_para_socios_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();




                 /* 1.3.- Instertar nuevo movimiento de salida de almacen*/


                 $this->movement_list->append();
                 $this->movement_list->fieldset('mov_type','SALIDA');
                 $this->movement_list->fieldset('mov_date',$fecha_actual);
                 $this->movement_list->fieldset('mov_cant',$cantidad);
                 $this->movement_list->fieldset('mov_lot',$lote);
                 $this->movement_list->fieldset('product_id',$product_id);
                 $this->movement_list->fieldset('comments',utf8_encode($comments));
                 $this->movement_list->fieldset('user_id',$user_id);
                 $this->movement_list->fieldset('reason','CONSIGNACION');
                 $this->movement_list->post();


                 /*Disminuimos el stock del producto*/

                  $this->product_list->close();
                  $this->product_list->Filter = " product_id= ".$product_id." ";
                  $this->product_list->open();

                  $stock = $this->product_list->fieldget('stock');

                  $stock = $stock-$cantidad;

                  $this->product_list->edit();
                  $this->product_list->fieldset('stock',$stock);
                  $this->product_list->post();

                  $this->product_list->close();
                  $this->product_list->Filter = " status='ACTIVO' ";
                  $this->product_list->open();


    }



     function consignation_output($consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id){
            /* TO DO:
             * 1.- Crear asientos en la contabilidad
             * 1.1.- Insertar asiento de costo en almacen
             * 1.2.- Insertar asiento de utilidades
             * 1.3.- Insertar asiento en Caja General
             */
                date_default_timezone_set('America/La_Paz');


                //1ER ASIENTO
                /*Entra a cuentas por cobrar el valor del producto*/


                $consignacion =  $cantidad*$unit_price*-1;


                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments));
                 $this->entry_list->fieldset('balance', $consignacion );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();


                 $this->consig_prod_list->fieldset('consig_date', $fecha_actual);


                 //2DO ASIENTO
                 /*Sale de la consignación el valor del producto*/


                 $cuentas_por_cobrar = $cantidad * $unit_price ;


                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments));
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $cuentas_por_cobrar );
                 $this->entry_list->fieldset('account_id', $cuentas_por_cobrar_a_clientes_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();

     }


     function consignation_return($consignee_account_id,$consignatario,$unit_price, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$user_id,$comments,$fecha_actual){


                  date_default_timezone_set('America/La_Paz');

                  //1ER ASIENTO
                  /*PONER EN EL HABER EL PRODUCTO QUE SALE DE ALMACEN DE PRODUCTOS TERMINADOS*/


                 $this->consig_prod_list->fieldset('consig_date', $fecha_actual);

                  $balance = $cantidad * $production_cost;
                  if($production_cost == 0){
                      $balance = 0;
                  }


                  //1ER ASIENTO
                  //Costo de producción del producto en el debe
                  $this->entry_list->append();
                  $this->entry_list->fieldset('entry_date',$fecha_actual);
                  $this->entry_list->fieldset('details',utf8_encode($comments));
                  $this->entry_list->fieldset('balance',$balance);
                  $this->entry_list->fieldset('account_id',$product_account_id);
                  $this->entry_list->fieldset('user_id',$user_id);
                  $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                  $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                  $this->entry_list->post();



                  //2DO ASIENTO
                  /* Poner la ganancia del producto vendido (sin la utilidad para socios) */

                 $prod_cost_prod = $this->getProdCostProdCollection($product_id);
                 if($prod_cost_prod){
                    //TO DO: Asentar los costos de produccion y crear el(los)
                    //producto(s) por los que se esta pagando.

                    $longitud = count($prod_cost_prod);

                    $costos_x_cobrar = 0;
                    for($i=1;$i<=$longitud;$i++){

                            if($prod_cost_prod[$i]['cost_type']=='VENTA'){
                              $costos_x_cobrar = $costos_x_cobrar + ($prod_cost_prod[$i]['cost_value']*$unit_price);
                            }else{
                              $costos_x_cobrar = $costos_x_cobrar + $prod_cost_prod[$i]['cost_value'];
                            }

                    }//end for
                 }//end if

                 $balance= $cantidad*($costos_x_cobrar-$production_cost);


                 /*Primero obtenemos el id de la cuenta "Costos por cobrar"
                  *de la tabla de configuraciones del sistema            */

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = " config_name= 'COSTOS X COBRAR' ";
                  $this->configuration_list->open();

                  $ganancia_por_venta_de_productos_id = $this->configuration_list->fieldget('config_value');

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = "";
                  $this->configuration_list->open();


                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments));
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $ganancia_por_venta_de_productos_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();


                  $this->configuration_list->close();
                  $this->configuration_list->Filter = " config_name= 'Utilidades para socios' ";
                  $this->configuration_list->open();

                  $utilidades_para_socios_id = $this->configuration_list->fieldget('config_value');

                  $this->configuration_list->close();
                  $this->configuration_list->Filter = "";
                  $this->configuration_list->open();



                 //3ER ASIENTO
                 /*Poner utilidades para socios en el debe               */
                  /* $balance = $cantidad * ( $unit_price - ($product_cost+($costos_x_cobrar-$product_cost))*-1; simplificando $product_cost:*/
                 $balance = $cantidad * ( $unit_price - ($costos_x_cobrar));

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details', utf8_encode($comments));
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $utilidades_para_socios_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();

                 /*4TO ASIENTO
                  * Poner en el Haber el precio de venta
                  */

                 $balance = $cantidad * $unit_price*-1;

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',utf8_encode($comments));
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                 $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                 $this->entry_list->post();


                 /* 1.3.- Instertar nuevo movimiento de entrada a almacen*/


                 $this->movement_list->append();
                 $this->movement_list->fieldset('mov_type','ENTRADA');
                 $this->movement_list->fieldset('mov_date',$fecha_actual);
                 $this->movement_list->fieldset('mov_cant',$cantidad);
                 $this->movement_list->fieldset('mov_lot',$lote);
                 $this->movement_list->fieldset('product_id',$product_id);
                 $this->movement_list->fieldset('comments',utf8_encode($comments));
                 $this->movement_list->fieldset('user_id',$user_id);
                 $this->movement_list->fieldset('reason','DEVOLUCION');
                 $this->movement_list->post();


                 /*Aumentamos el stock del producto*/

                  $this->product_list->close();
                  $this->product_list->Filter = " product_id= ".$product_id." ";
                  $this->product_list->open();

                  $stock = $this->product_list->fieldget('stock');

                  $stock = $stock+$cantidad;

                  $this->product_list->edit();
                  $this->product_list->fieldset('stock',$stock);
                  $this->product_list->post();

                  $this->product_list->close();
                  $this->product_list->Filter = " status='ACTIVO' ";
                  $this->product_list->open();



     }

     function getProdCostProdCollection($product_id){



                $sql = "SELECT
                    `c`.`prod_cost_prod_id` AS `prod_cost_prod_id`,
                    `p`.`product_name` AS `product_name`,
                    `t`.`cost_name` AS `cost_name`,
                    `c`.`cost_value` AS `cost_value`,
                    `t`.`account_id` AS `account_id`,
                    `t`.`cost_type` AS `cost_type`,
                    `t`.`saving_type` AS `saving_type`,
                    `t`.`saving_id` AS `saving_id`
                    FROM
                    (
                            (
                                    `prod_cost_prod` `c`
                                    JOIN `product` `p` ON (
                                            (
                                                    `c`.`product_id` = `p`.`product_id`
                                            )
                                    )
                            )
                            JOIN `product_cost` `t` ON (
                                    (
                                            `c`.`prod_cost_id` = `t`.`prod_cost_id`
                                    )
                            )
                    )
                    WHERE
                     c.product_id = ".$product_id."
                    ORDER BY
                    `p`.`product_name`,
                    `t`.`cost_name`";
                $this->qry_prod_cost_prod->setActive(false);
                $this->qry_prod_cost_prod->SQL = $sql;
                $this->qry_prod_cost_prod->setActive(true);

                $this->qry_prod_cost_prod->open();

                $prod_cost_prod = array();

                $this->qry_prod_cost_prod->first();
                $i=1;
                while(!$this->qry_prod_cost_prod->EOF){
                    $prod_cost_prod[$i]['prod_cost_prod_id'] = $this->qry_prod_cost_prod->fieldget('prod_cost_prod_id');
                    $prod_cost_prod[$i]['product_name'] = $this->qry_prod_cost_prod->fieldget('product_name');
                    $prod_cost_prod[$i]['cost_name'] = $this->qry_prod_cost_prod->fieldget('cost_name');
                    $prod_cost_prod[$i]['cost_value'] = $this->qry_prod_cost_prod->fieldget('cost_value');
                    $prod_cost_prod[$i]['account_id'] = $this->qry_prod_cost_prod->fieldget('account_id');
                    $prod_cost_prod[$i]['cost_type'] = $this->qry_prod_cost_prod->fieldget('cost_type');
                    $prod_cost_prod[$i]['saving_type'] = $this->qry_prod_cost_prod->fieldget('saving_type');
                    $prod_cost_prod[$i]['saving_id'] = $this->qry_prod_cost_prod->fieldget('saving_id');
                    $this->qry_prod_cost_prod->next();
                    $i++;
                }

                return $prod_cost_prod;

     }


     function findProdCostProdByCostName($cost_name, $prod_cost_prod){


        $longitud = count($prod_cost_prod);


        $prod_cost = array();

        $i=0;
        do{
            $i++;
        }while($prod_cost_prod[$i]['cost_name']!=$cost_name && $i<=$longitud);

        if($prod_cost_prod[$i]['cost_name']==$cost_name){

            $prod_cost['prod_cost_prod_id'] =    $prod_cost_prod[$i]['prod_cost_prod_id'];
            $prod_cost['product_name'] = $prod_cost_prod[$i]['product_name'];
            $prod_cost['cost_name'] = $prod_cost_prod[$i]['cost_name'];
            $prod_cost['cost_value'] = $prod_cost_prod[$i]['cost_value'];
            $prod_cost['account_id'] = $prod_cost_prod[$i]['account_id'];
            $prod_cost['cost_type'] = $prod_cost_prod[$i]['cost_type'];
            return $prod_cost;

        }else{
            return NULL;
        }







     }

     function getProductProductionCostAccountID(){

                    $this->configuration_list->close();
                    $this->configuration_list->Filter = " config_name= 'Costos de produccion de productos' ";
                    $this->configuration_list->open();

                    $costos_por_cobrar_id = $this->configuration_list->fieldget('config_value');

                    $this->configuration_list->close();
                    $this->configuration_list->Filter = "";
                    $this->configuration_list->open();

                    return $costos_por_cobrar_id;

     }
     
     
    function process_payment_type($pago, $account_id,$fecha_actual, $comments, $unit_price, $user_id, $product_id){
//$cuentas_por_cobrar_clientes, $consignee_account_id,$unit_price, $consignatario, $cantidad, $pago_normal, $pago_por_cobrar, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id        


                   /* Poner en el Debe lo que entra a Venta de Productos Terminados
                    VOY A ANULAR ESTA PARTE PARA CLARIDAD EN LA CONTABILIDAD 09NOV2022*/
                   /*07mar2023: lo voy a reestablecer*/

                   $this->configuration_list->close();
                   $this->configuration_list->Filter = " config_name= 'CTA. VENTA DE PRODUCTOS TERMINADOS' ";
                   $this->configuration_list->open();

                   $venta_de_productos_terminados_id = $this->configuration_list->fieldget('config_value');

                   $this->configuration_list->close();
                   $this->configuration_list->Filter = "";
                   $this->configuration_list->open();

                   /*Poner en el debe lo que entra a Venta de productos terminados*/

                   $this->entry_list->append();
                   $this->entry_list->fieldset('entry_date',$fecha_actual);
                   $this->entry_list->fieldset('details',utf8_encode($comments));
                   $balance1 = $unit_price * $pago;
                   $this->entry_list->fieldset('balance', $balance1 );
                   $this->entry_list->fieldset('account_id', $venta_de_productos_terminados_id);
                   $this->entry_list->fieldset('user_id',$user_id);
                   $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                   $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                   $this->entry_list->post();


                    //Si es pago por cobrar, colocar en el Haber lo que sale de cuentas x cobrar ó
                   // si es pago normal , colocar en el Haber lo que sale de consignación X


                    $balance = $unit_price*$pago*-1;


                    $this->entry_list->append();
                    $this->entry_list->fieldset('entry_date',$fecha_actual);
                    $this->entry_list->fieldset('details',utf8_encode($comments));
                    $this->entry_list->fieldset('balance', $balance );
                    $this->entry_list->fieldset('account_id', $account_id);
                    $this->entry_list->fieldset('user_id',$user_id);
                    $this->entry_list->fieldset('cbte_cont_tipo',$this->consig_prod_list->fieldget('cbte_cont_tipo'));
                    $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                    $this->entry_list->post();




                    //Obtenemos los costos para este producto

                    $prod_cost_prod = $this->getProdCostProdCollection($product_id);
                    if($prod_cost_prod){


                        //TO DO: Asentar los costos de produccion y crear el(los)
                        //producto(s) por los que se esta pagando.

                        $longitud = count($prod_cost_prod);


                        $caja_de_ahorro_mano_de_obra=0;
                        $caja_de_ahorro_impuestos=0;
                        $caja_de_ahorro_costos_comercializacion=0;
                        $caja_de_ahorro_costos_produccion=0;
                        $caja_de_ahorro_reserva=0;
                        $caja_de_ahorro_mat_prim=0;
                        $caja_de_ahorro_envases=0;
                        $caja_de_ahorro_utilidades=0;

                        $caja_de_ahorro_mano_de_obra_id=0;
                        $caja_de_ahorro_impuestos_id=0;
                        $caja_de_ahorro_costos_comercializacion_id=0;
                        $caja_de_ahorro_costos_produccion_id=0;
                        $caja_de_ahorro_reserva_id=0;
                        $caja_de_ahorro_mat_prim_id=0;
                        $caja_de_ahorro_envases_id=0;
                        $caja_de_ahorro_utilidades_id=0;

                        $this->tbbalance_checksum1->refresh();

                        $this->tbbalance_checksum1->last();

                        $checksum = $this->tbbalance_checksum1->fieldget('checksum');



                        for($i=1;$i<=$longitud;$i++){



                            //1.- AQUI PASAMOS LO QUE ES PARA EL AHORRO PARA PAGO DE MANO DE OBRA
                            if($prod_cost_prod[$i]['saving_type']=='MANO DE OBRA'){

                                $caja_de_ahorro_mano_de_obra=$caja_de_ahorro_mano_de_obra+($pago * $prod_cost_prod[$i]['cost_value']);
                                $caja_de_ahorro_mano_de_obra_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if


                            //2.- AQUI PASAMOS LO QUE ES PARA EL AHORRO DE COSTOS DE PRODUCCION
                            if($prod_cost_prod[$i]['saving_type']=='PRODUCCION'){

                                $caja_de_ahorro_costos_produccion=$caja_de_ahorro_costos_produccion+($pago * $prod_cost_prod[$i]['cost_value']);
                                $caja_de_ahorro_costos_produccion_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if


                            //3.- AQUI PASAMO LO QUE ES PARA EL AHORRO DE COSTOS DE COMERCIALIZACION
                            if($prod_cost_prod[$i]['saving_type']=='COMERCIALIZ'){

                                $caja_de_ahorro_costos_comercializacion=$caja_de_ahorro_costos_comercializacion+($pago * ($prod_cost_prod[$i]['cost_value']*$unit_price));
                                $caja_de_ahorro_costos_comercializacion_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if


                            //4.- AQUI PASAMOS LO QUE ES PARA EL AHORRO DE COSTOS DE ENVASES
                            if($prod_cost_prod[$i]['saving_type']=='ENVASE'){

                                $caja_de_ahorro_envases=$caja_de_ahorro_envases+($pago * $prod_cost_prod[$i]['cost_value']);
                                $caja_de_ahorro_envases_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if

                            //5.- AQUI PASAMOS LO QUE ES PARA EL AHORRO PARA IMPUESTOS
                            if($prod_cost_prod[$i]['saving_type']=='IMPUESTOS'){

                                $caja_de_ahorro_impuestos=$caja_de_ahorro_impuestos+($pago * ($prod_cost_prod[$i]['cost_value']*$unit_price));
                                $caja_de_ahorro_impuestos_id= $prod_cost_prod[$i]['saving_id'];


                            }//end if

                            //6.- AQUI PASAMOS LO QUE ES PARA EL AHORRO DE COSTOS DE PRODUCCION DE MATERIAS PRIMAS
                            if($prod_cost_prod[$i]['saving_type']=='MAT. PRIM.'){
                                
                                $caja_de_ahorro_mat_prim=$caja_de_ahorro_mat_prim+($pago * $prod_cost_prod[$i]['cost_value']);
                                $caja_de_ahorro_mat_prim_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if



                            //7.- AQUI PASAMOS LO QUE ES PARA EL AHORRO DE RESERVAS
                            if($prod_cost_prod[$i]['saving_type']=='RESERVA'){

                                $caja_de_ahorro_reserva=$caja_de_ahorro_reserva+($pago * ($prod_cost_prod[$i]['cost_value']*$unit_price));
                                $caja_de_ahorro_reserva_id=$prod_cost_prod[$i]['saving_id'];


                            }//end if

                        }//end for

                        //ASIENTO DE CAJA DE AHORRO PARA MANO DE OBRA
                        if($caja_de_ahorro_mano_de_obra!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_mano_de_obra );
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_mano_de_obra_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }

                        //ASIENTO DE CAJA DE AHORRO PARA COSTOS DE PRODUCCION
                        if($caja_de_ahorro_costos_produccion!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_costos_produccion);
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_costos_produccion_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }


                        //ASIENTO DE CAJA DE AHORRO PARA COSTOS DE COMERCIALIZACION
                        if($caja_de_ahorro_costos_comercializacion!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_costos_comercializacion );
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_costos_comercializacion_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }


                        //ASIENTO DE CAJA DE AHORRO PARA ENVASES
                        if($caja_de_ahorro_envases!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_envases );
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_envases_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }

                        /*
                         * 18ene2025: Se borrara este asiento por que los impuestos son 
                         * un costo fijo.
                         */
                        //ASIENT0 DE CAJA DE AHORRO PARA IMPUESTOS
                        /*
                        if($caja_de_ahorro_impuestos!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_impuestos );
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_impuestos_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }
                        */

                        /*
                         * 
                        **03sept2021: Estoy anulando este codigo por que a partir de ahora*
                         * la caja de ahorro de mat. prim. sera un costo fijo y se sacara de
                         * caja de ahorro reserva de forma anual.
                         * REVISION 04AGO2022: Lo volvere a habilitar pues lo que haremos
                         * es poner este costo en 0
                         * REVISION 08feb2023: Ha cambiado la politica de la empresa.
                         * Ahora lo de mat. primas no irá a utilidades sino a reserva.
                         ***/

                        //ASIENTO DE CAJA DE AHORRO DE MATERIAS PRIMAS
                        /*
                        if($caja_de_ahorro_mat_prim!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',$comments);
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_mat_prim );
                            $this->entry_list->fieldset('account_id', $caja_de_ahorro_mat_prim_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        } 
                        /*/


                        /***Entonces adicionamos este nuevo codigo***/
                        /*$caja_de_ahorro_reserva = $caja_de_ahorro_reserva+$caja_de_ahorro_mat_prim; Ya no adicionaremos a reserva lo de mat. primas*/

                        //ASIENTO DE CAJA DE AHORRO PARA FONDO DE RESERVA
                        if($caja_de_ahorro_reserva!=0)
                        {
                            $this->entry_list->append();
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            $this->entry_list->fieldset('details',utf8_encode($comments));
                            $this->entry_list->fieldset('entry_date',$fecha_actual);
                            /*El ahorro de materias primas y el ahorro para impuestos los sumaremos a reserva*/
                            $caja_de_ahorro_reserva=$caja_de_ahorro_reserva+$caja_de_ahorro_mat_prim+$caja_de_ahorro_impuestos;                          
                            $this->entry_list->fieldset('balance', $caja_de_ahorro_reserva);
                            $this->entry_list->fieldset('account_id',$caja_de_ahorro_reserva_id);
                            $this->entry_list->fieldset('user_id',$user_id);
                            $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                            $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                            $this->entry_list->post();
                        }


                        //7.- AQUI PASAMOS LO QUE ES PARA EL AHORRO DE UTILIDADES

                        $this->configuration_list->close();
                        $this->configuration_list->Filter = " config_name= 'Caja de ahorro Utilidades' ";
                        $this->configuration_list->open();

                        $caja_de_ahorro_utilidades_id = $this->configuration_list->fieldget('config_value');

                        $this->configuration_list->close();
                        $this->configuration_list->Filter = "";
                        $this->configuration_list->open();


                        /**03sept2021: Cambiaremos esto pues lo de caja de ahorro mat. prim. lo estamos pasando a caja de ahorro de reserva
                        $costos = $caja_de_ahorro_mano_de_obra+$caja_de_ahorro_impuestos+$caja_de_ahorro_costos_comercializacion+$caja_de_ahorro_costos_produccion+$caja_de_ahorro_reserva+$caja_de_ahorro_mat_prim+$caja_de_ahorro_envases;
                         **/
                        /*Entonces quitamos lo de caja de ahorro mat. prim. de la suma:
                        $costos = $caja_de_ahorro_mano_de_obra+$caja_de_ahorro_impuestos+$caja_de_ahorro_costos_comercializacion+$caja_de_ahorro_costos_produccion+$caja_de_ahorro_reserva+$caja_de_ahorro_envases;*/

                        /*Revision 04ago2022: volvemos a lo anterior pues solo pondremos el costo en 0 */
                        //$costos = $caja_de_ahorro_mano_de_obra+$caja_de_ahorro_impuestos+$caja_de_ahorro_costos_comercializacion+$caja_de_ahorro_costos_produccion+$caja_de_ahorro_reserva+$caja_de_ahorro_mat_prim+$caja_de_ahorro_envases;
                        
                        /*Revision 21ene2025: quitaremos $caja_de_ahorro_mat_prim por que lo estamos sumando en $caja_de_ahorro_reserva, del mismo modo $caja_de_ahorro_impuestos pues se ha difinido que es un costo fijo */
                        $costos = $caja_de_ahorro_mano_de_obra+$caja_de_ahorro_costos_comercializacion+$caja_de_ahorro_costos_produccion+$caja_de_ahorro_reserva+$caja_de_ahorro_envases;
                        
                        
                      
                        $caja_de_ahorro_utilidades = ($pago*$unit_price)-$costos;

                        $checksum = $checksum + $costos + $caja_de_ahorro_utilidades;
                        $balance_checksum = $costos + $caja_de_ahorro_utilidades;


                        $this->entry_list->append();
                        $this->entry_list->fieldset('entry_date',$fecha_actual);
                        $this->entry_list->fieldset('details',utf8_encode($comments));
                        $this->entry_list->fieldset('entry_date',$fecha_actual);
                        $this->entry_list->fieldset('balance', $caja_de_ahorro_utilidades );
                        $this->entry_list->fieldset('account_id', $caja_de_ahorro_utilidades_id);
                        $this->entry_list->fieldset('user_id',$user_id);
                        $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                        $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                        $this->entry_list->post();


                        /*Poner en el haber lo que sale de Venta de productos terminados */

                        $this->entry_list->append();
                        $this->entry_list->fieldset('entry_date',$fecha_actual);
                        $this->entry_list->fieldset('details',utf8_encode($comments));
                        $balance2 = $unit_price * $pago*-1;
                        $this->entry_list->fieldset('balance', $balance2 );
                        $this->entry_list->fieldset('account_id', $venta_de_productos_terminados_id);
                        $this->entry_list->fieldset('user_id',$user_id);
                        $this->entry_list->fieldset('cbte_cont_tipo', $this->consig_prod_list->fieldget('cbte_cont_tipo'));
                        $this->entry_list->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                        $this->entry_list->post();


                        $this->qry_budget->close();
                        $sql ="SELECT SUM(balance) as `Total` FROM `entry` WHERE account_id in (432, 413, 419, 433, 434, 435, 579,581, 582) AND entry_date BETWEEN '2019-06-28 11:48:46' AND NOW()";
                        $this->qry_budget->SQL = $sql;
                        $this->qry_budget->open();

                        $budget = $this->qry_budget->fieldget('Total');


                        $this->tbbalance_checksum1->append();
                        $this->tbbalance_checksum1->fieldset('checksum_date', $fecha_actual);
                        $this->tbbalance_checksum1->fieldset('checksum', $checksum);
                        $this->tbbalance_checksum1->fieldset('budget', $budget);
                        $this->tbbalance_checksum1->fieldset('cbte_cont_nro', $this->consig_prod_list->fieldget('cbte_cont_nro'));
                        $this->tbbalance_checksum1->fieldset('balance', $balance_checksum);
                        $this->tbbalance_checksum1->post();

                    }//end if
                             
                  
         
     }//end function process_payment_type


     function consignation_payment($cuentas_por_cobrar_clientes, $consignee_account_id,$unit_price, $consignatario, $cantidad, $pago_normal, $pago_por_cobrar, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual,$cuentas_por_cobrar_a_clientes_account_id){

            /* TO DO:
             * 1.- Crear asientos en la contabilidad
             * 1.1.- Insertar asiento de costo en almacÃ©n
             * 1.2.- Insertar asiento de utilidades
             * 1.3.- Insertar asiento en Caja General
             */

            date_default_timezone_set('America/La_Paz');

            $this->consig_prod_list->fieldset('consig_date', $fecha_actual);


            if($cuentas_por_cobrar_clientes >0){                          
                    $pago=$pago_por_cobrar;
                    $account_id = $cuentas_por_cobrar_a_clientes_account_id;                    
            }//end if(cuentas_por_cobrar_a_clientes >0)

             if($pago_normal>0){          
                    $pago=$pago_normal;
                    $account_id = $consignee_account_id;                        
             }//end if pago normal

             $this->process_payment_type($pago, $account_id,$fecha_actual, $comments, $unit_price, $user_id, $product_id);
            
     }


    function view_consignShow($sender, $params)
    {

        $this->consig_prod_list->append();

        date_default_timezone_set('America/La_Paz');

        $fecha_actual = date('Y-m-d H:i:s.u');

        $this->consig_prod_list->fieldset('consig_date',$fecha_actual);
        $this->consig_prod_list->fieldset('cant',0);
        $this->Query1->close();
        $sql = 'SELECT c.consig_date, c.mov_type, c.cant, p.product_name, g.consig_name  FROM consig_prod AS c INNER JOIN product AS p ON (p.product_id=c.product_id) INNER JOIN consignee AS g ON (g.consig_id = c.consig_id) WHERE 1 ORDER BY c.consig_prod_id DESC';
        $this->Query1->setSQL($sql);
        $this->Query1->open();

        $this->consig_prod_list->fieldset('unit_price', 0);

    }
    function view_consignStartBody($sender, $params)
    {
       echo "<style>
                #Panel1_outer{
                    position: relative !important;
                    width: 100% !important;
                }
            </style>";
       echo '<div class="wrapper">';
       require "view_menu.php";
       echo '<div id="div_target">';

    }
    function view_consignAfterShowFooter($sender, $params)
    {
       echo '</div> <!--end div_target-->';
       echo '</div> <!--end wrapper-->';
    }
}

global $application;

global $view_consign;

//Creates the form
$view_consign=new view_consign($application);

//Read from resource file
$view_consign->loadResource(__FILE__);

//Shows the form
$view_consign->show();

?>
