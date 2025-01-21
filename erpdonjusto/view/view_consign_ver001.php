<?php
error_reporting(1);
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



//Class definition
class view_consign extends Page
{
    public $qry_prod_cost = null;
    public $consignee_list = null;
    public $account_list = null;
    public $movement_list = null;
    public $Label13 = null;
    public $entry_list = null;
    public $Label15 = null;
    public $lblDebe1 = null;
    public $lblTiene1 = null;
    public $Label14 = null;
    public $Datasource2 = null;
    public $Label8 = null;
    public $Label12 = null;
    public $Label11 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $DBRepeater1 = null;
    public $consig_prod_list = null;
    public $dsconsig_prod1 = null;
    public $consig_date1 = null;
    public $consig_prod_id1 = null;
    public $consig_id1 = null;
    public $product_id1 = null;
    public $cant1 = null;
    public $mov_type1 = null;
    public $comments1 = null;
    public $Button1 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    public $Label5 = null;
    public $Label6 = null;
    public $dsproduct1 = null;
    public $dsconsignee1 = null;
    public $Label9 = null;
    public $Query2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $Label10 = null;
    public $unit_price1 = null;
    public $lote1 = null;
    public $Query3 = null;
    public $product_list = null;
    public $tbentry1 = null;
    public $configuration_list = null;
    function view_consignBeforeShow($sender, $params)
    {

        $this->product_list->first();
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



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';


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

    function Button1Click($sender, $params)
    {


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
        $consig_id = $this->consig_id1->getItemIndex();
        $this->consignee_list->LimitStart=-1;
        $this->consignee_list->LimitCount = -1;
        $this->consignee_list->close();
        $this->consignee_list->Filter = 'consig_id = '.$consig_id;
        $this->consignee_list->open();
        $consignee_account_id = $this->consignee_list->fieldget('account_id');

        $this->consignee_list->close();
        $this->consignee_list->Filter = ''; /*restauramos la tabla*/
        $this->consignee_list->open();


        //Obtenemos el precio del producto y el codigo de la cuenta
        $this->product_list->close();
        $this->product_list->Filter = 'product_id = '.$product_id;
        $this->product_list->open();
        $production_cost = $this->product_list->fieldget('production_cost');
        $product_account_id = $this->product_list->fieldget('account_id');


        $this->product_list->close();
        $this->product_list->Filter = ''; /*restauramos la tabla*/
        $this->product_list->open();

        $consignatario = $this->consig_id1->Items[$this->consig_id1->readItemIndex()];
        $cantidad = $this->cant1->Text;
        $producto = $this->product_id1->Items[$this->product_id1->readItemIndex()];
        $lote=$this->lote1->Text;
        $comments = $this->consig_prod_list->fieldget('comments');
        $fecha_actual = $this->consig_date1->Text;
        $user_id = $_SESSION['user_id'];


        $this->account_list->close();
        $this->account_list->Filter = "name = 'Utilidades' AND account_type = 'Apropiacion'";
        $this->account_list->Active = true;
        $this->account_list->open();


        $utilidades_account_id = $this->account_list->fieldget('account_id');

        $this->account_list->close();
        $this->account_list->LimitStart=-1;
        $this->account_list->LimitCount = -1;
        $this->account_list->Filter = ''; /*restauramos la tabla*/
        $this->account_list->open();


        $this->account_list->close();
        $this->account_list->Filter = "name = 'Caja General' AND account_type = 'Apropiacion'";
        $this->account_list->open();

        $caja_general_account_id = $this->account_list->fieldget('account_id');

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
                $total_price = $owes * $unit_price;

                $this->consignation_input($consignee_account_id, $unit_price, $consignatario, $cantidad, $lote, $producto,$product_id,$production_cost,$product_account_id, $user_id,$fecha_actual,$comments);

                break;

            case 'SALIDA':

                if($this->unit_price1->Text!=0){
                    $unit_price = $this->unit_price1->Text;
                }


                $consig_balance = $consig_balance - $cant;
                $owes = $owes;
                $total_price = $owes * $unit_price;

                $this->consignation_output($consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual);

                break;

            case 'DEVOLUCION':
                $consig_balance = $consig_balance - $cant;
                $owes = $owes - $cant;
                $total_price = $owes * $unit_price;

                $this->consignation_return($consignee_account_id,$consignatario,$unit_price,$cantidad, $producto,$product_id,$production_cost,$product_account_id,$user_id,$comments,$fecha_actual);

                break;
            case 'PAGO':

                if($this->unit_price1->Text!=0){
                    $unit_price = $this->unit_price1->Text;
                }

                $cuentas_por_cobrar_clientes = $owes - $consig_balance;
                $cant = $cant - $cuentas_por_cobrar_clientes;
                $owes = $owes - $cuentas_por_cobrar_clientes - $cant;
                $consig_balance = $consig_balance - $cant;

                $total_price = $owes * $unit_price;

                $this->consignation_payment($cuentas_por_cobrar_clientes, $consignee_account_id,$unit_price, $consignatario, $cant, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual);


            break;


        }


        $this->consig_prod_list->fieldset('total_price', $total_price);
        $this->consig_prod_list->fieldset('balance', $consig_balance);
        $this->consig_prod_list->fieldset('owes', $owes);
        $this->consig_prod_list->fieldset('consig_id', $consig_id);
        $this->consig_prod_list->fieldset('product_id', $product_id);
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
                 * 1.3.- Instertar nuevo movimiento de salida de almacen
                 * 2.- Meter a consignacion
                 * 2.1.- Insertar nuevo asiento de entrada del producto a la consignacion
                 * 3.- Insertar nuevo movimiento en la tabla de consingaciones
                 */


                 date_default_timezone_set('America/La_Paz');

                 //1ER ASIENTO
                 /*PONER EN EL HABER EL PRODUCTO QUE SALE DE ALMACEN DE PRODUCTOS TERMINADOS*/

                 $ultima_fecha = $_SESSION['last_date'];

                 if($ultima_fecha){

                     $nuevafecha = strtotime ( '+1 minute' , strtotime ( $ultima_fecha ) ) ;
                     $fecha_actual = date ('Y-m-d H:i:s', $nuevafecha );
                 }else{

                    $fecha_actual = substr($fecha_actual,0,17);
                    $fecha_actual = $fecha_actual . '01';

                 }

                $this->consig_prod_list->fieldset('consig_date', $fecha_actual);

                 $balance = $cantidad * $production_cost * -1;
                 if($production_cost == 0){
                     $balance = 0;
                 }

                 //$details = 'En consignacion a '.$consignatario.' '.$cantidad.' '.$producto;
                 //AQUI GENERAMOS LA ENTRADA
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance',$balance);
                 $this->entry_list->fieldset('account_id',$product_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 /*Primero obtenemos el id de la cuenta "Costos por cobrar"
                  *de la tabla de configuraciones del sistema            */

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = " config_name= 'COSTOS Y UTILIDADES X COBRAR' ";
                 $this->configuration_list->open();

                 $costos_por_cobrar_id = $this->configuration_list->fieldget('config_value');

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = "";
                 $this->configuration_list->open();

                 //2DO ASIENTO
                 /*Poner en el haber los costos por cobrar que viene a ser
                  * la diferencia entre el precio de venta menos el precio de
                  *costo (precio en almacen)               */

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '02';
                 $balance = $cantidad * ($unit_price-$production_cost)*-1;

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details', $comments);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $costos_por_cobrar_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();

                 /*3ER ASIENTO
                  * Poner en el Debe el precio de venta
                  */



                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '03';
                 $balance = $cantidad * $unit_price;

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 /* 1.3.- Instertar nuevo movimiento de salida de almacen*/
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '04';


                 $this->movement_list->append();
                 $this->movement_list->fieldset('mov_type','SALIDA');
                 $this->movement_list->fieldset('mov_date',$fecha_actual);
                 $this->movement_list->fieldset('mov_cant',$cantidad);
                 $this->movement_list->fieldset('mov_lot',$lote);
                 $this->movement_list->fieldset('product_id',$product_id);
                 $this->movement_list->fieldset('comments',$comments);
                 $this->movement_list->fieldset('user_id',$user_id);
                 $this->movement_list->fieldset('reason','CONSIGNACION');
                 $this->movement_list->post();

                 $_SESSION['last_date'] = $fecha_actual;


    }



     function consignation_output($consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual){
            /* TO DO:
             * 1.- Crear asientos en la contabilidad
             * 1.1.- Insertar asiento de costo en almacÃ©n
             * 1.2.- Insertar asiento de utilidades
             * 1.3.- Insertar asiento en Caja General
             */
        date_default_timezone_set('America/La_Paz');

                 $ultima_fecha = $_SESSION['last_date'];

                 if($ultima_fecha){

                     $nuevafecha = strtotime ( '+1 minute' , strtotime ( $ultima_fecha ) ) ;
                     $fecha_actual = date ('Y-m-d H:i:s', $nuevafecha );
                 }else{

                    $fecha_actual = substr($fecha_actual,0,17);
                    $fecha_actual = $fecha_actual . '01';

                 }

                 $this->consig_prod_list->fieldset('consig_date', $fecha_actual);



                $this->account_list->close();
                $this->account_list->Filter = "name = 'Cuentas por Cobrar a Clientes' AND account_type = 'Apropiacion'";
                $this->account_list->open();

                $cuentas_por_cobrar_a_clientes_account_id = $this->account_list->fieldget('account_id');



                //1ER ASIENTO
                /*Entra a cuentas por cobrar el valor del producto*/

                 $cuentas_por_cobrar = $cantidad * $unit_price ;
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '01';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $cuentas_por_cobrar );
                 $this->entry_list->fieldset('account_id', $cuentas_por_cobrar_a_clientes_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();

                 //2DO ASIENTO
                 /*Sale de la consignación el valor del producto*/


                $consinacion =  $cantidad*$unit_price*-1;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '02';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $consinacion );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                $_SESSION['last_date'] = $fecha_actual;

     }


     function consignation_return($consignee_account_id,$consignatario,$unit_price, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$user_id,$comments,$fecha_actual){

         /* TO DO:
          * 1.- Generar asientos en la contabilidad
          * 2.- Generar movimiento en stock general
          */

        date_default_timezone_set('America/La_Paz');
                 $ultima_fecha = $_SESSION['last_date'];

                 if($ultima_fecha){

                     $nuevafecha = strtotime ( '+1 minute' , strtotime ( $ultima_fecha ) ) ;
                     $fecha_actual = date ('Y-m-d H:i:s', $nuevafecha );
                 }else{

                    $fecha_actual = substr($fecha_actual,0,17);
                    $fecha_actual = $fecha_actual . '01';

                 }

                $this->consig_prod_list->fieldset('consig_date', $fecha_actual);

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = " config_name= 'COSTOS Y UTILIDADES X COBRAR' ";
                 $this->configuration_list->open();

                 $costos_por_cobrar_id = $this->configuration_list->fieldget('config_value');

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = "";
                 $this->configuration_list->open();

                //1ER ASIENTO
                /*PONER EN EL DEBE EL PRECIO DE COSTO DEL PRODUCTO*/

                 $balance = $cantidad * $production_cost;
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '01';

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $product_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();



                //2DO ASIENTO
                /*PONER EN EL HABER EL PRODUCTO QUE SALE DEL CONSIGNATARIO*/

                 $balance = $cantidad * ($unit_price-$production_cost);
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '02';

                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $costos_por_cobrar_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 //3ER ASIENTO
                /*PONER EN EL HABER EL PRODUCTO QUE ENTRA A ALMACEN DE PRODUCTOS TERMINADOS*/
                 $balance = $cantidad * $unit_price*-1;
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '03';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id',$consignee_account_id );
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '04';
                 /* 1.3.- Instertar nuevo movimiento de entrada de almacen*/
                 $this->movement_list->append();
                 $this->movement_list->fieldset('mov_type','ENTRADA');
                 $this->movement_list->fieldset('mov_date',$fecha_actual);
                 $this->movement_list->fieldset('mov_cant',$cantidad);
                 $this->movement_list->fieldset('mov_lot',$lote);
                 $this->movement_list->fieldset('product_id',$product_id);
                 $this->movement_list->fieldset('comments',$comments);
                 $this->movement_list->fieldset('user_id',$user_id);
                 $this->movement_list->fieldset('reason','DEVOLUCION');
                 $this->movement_list->post();


                $_SESSION['last_date'] = $fecha_actual;



     }


     function consignation_payment($cuentas_por_cobrar_clientes, $consignee_account_id,$unit_price, $consignatario, $cantidad, $producto,$product_id,$production_cost,$product_account_id,$utilidades_account_id, $caja_general_account_id,$user_id, $comments,$fecha_actual){

            /* TO DO:
             * 1.- Crear asientos en la contabilidad
             * 1.1.- Insertar asiento de costo en almacÃ©n
             * 1.2.- Insertar asiento de utilidades
             * 1.3.- Insertar asiento en Caja General
             */

                 date_default_timezone_set('America/La_Paz');
                 $ultima_fecha = $_SESSION['last_date'];

                 if($ultima_fecha){

                     $nuevafecha = strtotime ( '+1 minute' , strtotime ( $ultima_fecha ) ) ;
                     $fecha_actual = date ('Y-m-d H:i:s', $nuevafecha );
                 }else{

                    $fecha_actual = substr($fecha_actual,0,17);
                    $fecha_actual = $fecha_actual . '01';

                 }



            $this->consig_prod_list->fieldset('consig_date', $fecha_actual);


            if($cantidad>0){



                 $this->configuration_list->close();
                 $this->configuration_list->Filter = " config_name= 'COSTOS Y UTILIDADES X COBRAR' ";
                 $this->configuration_list->open();

                 $costos_por_cobrar_id = $this->configuration_list->fieldget('config_value');

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = "";
                 $this->configuration_list->open();

                /*1ER ASIENTO: DEVOLVER A CUENTAS POR COBRAR LO QUE SE PRESTÓ
                 */


                 $costos_por_cobrar = $cantidad*($unit_price - $production_cost);

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '01';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $costos_por_cobrar );
                 $this->entry_list->fieldset('account_id', $costos_por_cobrar_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 /*2DO ASIENTO Consignatário
                  */

                 $consignacion = $costos_por_cobrar*-1;

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '02';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $consignacion );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();





                //3ER ASIENTO
                /*PONER EN EL HABER EL COSTO DE PRODUCCION DEL PRODUCTO EN CONSIGNACION*/


                 $precio_en_almacen = $cantidad * $production_cost * -1;
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '03';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $precio_en_almacen );
                 $this->entry_list->fieldset('account_id', $consignee_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();




                //Obtenemos los costos para este producto
                $this->qry_prod_cost->close();
                $SQL = "SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE cost_name = 'Impuestos' and product_id =".$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();


                //TO DO:
                //impuestos
                // porcentaje del impuesto en base al precio unitario
                 //4TO ASIENTO


                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $impuesto_account_id = $this->qry_prod_cost->fieldget('account_id');


                $impuesto = $price_percent * $unit_price*-1*$cantidad;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '04';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $impuesto );
                 $this->entry_list->fieldset('account_id', $impuesto_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                //TO DO:
                //Costos de venta
                //porcentaje del costo de venta en base al precio unitario
                 //5TO ASIENTO


                $this->qry_prod_cost->close();
                $SQL = "SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE  cost_name = 'Costos de venta' and product_id =".$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();

                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $costos_de_venta_account_id = $this->qry_prod_cost->fieldget('account_id');


                $costos_de_venta = $price_percent * $unit_price*-1*$cantidad;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '05';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $costos_de_venta );
                 $this->entry_list->fieldset('account_id', $costos_de_venta_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                //TO DO:
                //Fondo de inversiones
                //procentaje para futuras inversiones
                 //6TO ASIENTO


                $this->qry_prod_cost->close();
                $SQL = 'SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE cost_name LIKE "%Fondo de Inversiones%" and product_id ='.$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();

                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $fondo_de_inversiones_account_id = $this->qry_prod_cost->fieldget('account_id');

                $fondo_de_inversiones = $price_percent * $unit_price*-1*$cantidad;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '06';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $fondo_de_inversiones );
                 $this->entry_list->fieldset('account_id', $fondo_de_inversiones_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();



                //7MO ASIENTO
                 /*PONER EN EL HABER LAS UTILIDADES*/

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '07';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 //$this->entry_list->fieldset('details','Ha pagado '.$consignatario.' '.$cantidad.' '.$producto);
                 $this->entry_list->fieldset('details',$comments);
                 $costos = ($precio_en_almacen+$impuesto+$costos_de_venta+$fondo_de_inversiones)*-1;
                 $utilidades = ($unit_price * $cantidad) - $costos;
                 $utilidades = $utilidades*-1;
                 $this->entry_list->fieldset('balance', $utilidades );
                 $this->entry_list->fieldset('account_id', $utilidades_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 //8VO ASIENTO
                 /* Poner en el Debe lo que entra a Caja General*/
                 /*PONER EN EL DEBE LO QUE ENTRA A CAJA GENERAL*/
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '08';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 //$this->entry_list->fieldset('details','Ha pagado '.$consignatario.' '.$cantidad.' '.$producto);
                 $this->entry_list->fieldset('details',$comments);
                 $balance = $unit_price * $cantidad;
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $caja_general_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();
            }
            if($cuentas_por_cobrar_clientes >0){



                $this->account_list->close();
                $this->account_list->Filter = "name = 'Cuentas por Cobrar a Clientes' AND account_type = 'Apropiacion'";
                $this->account_list->open();

                $cuentas_por_cobrar_a_clientes_account_id = $this->account_list->fieldget('account_id');

                $this->account_list->close();
                $this->account_list->LimitStart=-1;
                $this->account_list->LimitCount = -1;
                $this->account_list->Filter = ''; /*restauramos la tabla*/
                $this->account_list->open();

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = " config_name= 'COSTOS Y UTILIDADES X COBRAR' ";
                 $this->configuration_list->open();

                 $costos_por_cobrar_id = $this->configuration_list->fieldget('config_value');

                 $this->configuration_list->close();
                 $this->configuration_list->Filter = "";
                 $this->configuration_list->open();

                /*1ER ASIENTO: DEVOLVER A CUENTAS POR COBRAR LO QUE SE PRESTÓ
                 */


                 $costos_por_cobrar = $cuentas_por_cobrar_clientes*($unit_price - $production_cost)*-1;

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '09';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $costos_por_cobrar );
                 $this->entry_list->fieldset('account_id', $costos_por_cobrar_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 /*2DO ASIENTO cuentas por cobrar
                  */

                 $consignacion = $costos_por_cobrar*-1;

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '10';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $consignacion );
                 $this->entry_list->fieldset('account_id', $cuentas_por_cobrar_a_clientes_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                //3ER ASIENTO
                /*PONER EN EL HABER EL COSTO DE PRODUCCION DEL PRODUCTO EN CONSIGNACION*/


                 $precio_en_almacen = $cuentas_por_cobrar_clientes * $production_cost * -1;
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '11';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('balance', $precio_en_almacen );
                 $this->entry_list->fieldset('account_id', $cuentas_por_cobrar_a_clientes_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();




                //Obtenemos los costos para este producto
                $this->qry_prod_cost->close();
                $SQL = "SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE cost_name = 'Impuestos' and product_id =".$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();


                //TO DO:
                //impuestos
                // porcentaje del impuesto en base al precio unitario
                 //4TO ASIENTO


                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $impuesto_account_id = $this->qry_prod_cost->fieldget('account_id');


                $impuesto = $price_percent * $unit_price*-1*$cuentas_por_cobrar_clientes;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '12';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $impuesto );
                 $this->entry_list->fieldset('account_id', $impuesto_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                //TO DO:
                //Costos de venta
                //porcentaje del costo de venta en base al precio unitario
                 //5TO ASIENTO


                $this->qry_prod_cost->close();
                $SQL = "SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE  cost_name = 'Costos de venta' and product_id =".$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();

                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $costos_de_venta_account_id = $this->qry_prod_cost->fieldget('account_id');


                $costos_de_venta = $price_percent * $unit_price*-1*$cuentas_por_cobrar_clientes;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '13';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $costos_de_venta );
                 $this->entry_list->fieldset('account_id', $costos_de_venta_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                //TO DO:
                //Fondo de inversiones
                //procentaje para futuras inversiones
                 //6TO ASIENTO


                $this->qry_prod_cost->close();
                $SQL = 'SELECT * from prod_cost_prod as p INNER JOIN product_cost as c on (p.prod_cost_id=c.prod_cost_id) WHERE cost_name LIKE "%Fondo de Inversiones%" and product_id ='.$product_id;
                $this->qry_prod_cost->setSQL($SQL);
                $this->qry_prod_cost->open();

                $price_percent =  $this->qry_prod_cost->fieldget('cost_value');
                $fondo_de_inversiones_account_id = $this->qry_prod_cost->fieldget('account_id');

                $fondo_de_inversiones = $price_percent * $unit_price*-1*$cuentas_por_cobrar_clientes;


                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '14';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $this->entry_list->fieldset('balance', $fondo_de_inversiones );
                 $this->entry_list->fieldset('account_id', $fondo_de_inversiones_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();



                //7MO ASIENTO
                 /*PONER EN EL HABER LAS UTILIDADES*/

                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '15';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $costos = ($precio_en_almacen+$impuesto+$costos_de_venta+$fondo_de_inversiones)*-1;
                 $utilidades = ($unit_price * $cuentas_por_cobrar_clientes) - $costos;
                 $utilidades = $utilidades*-1;
                 $this->entry_list->fieldset('balance', $utilidades );
                 $this->entry_list->fieldset('account_id', $utilidades_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();


                 //6TO ASIENTO
                 /* Poner en el Debe lo que entra a Caja General*/
                 /*PONER EN EL DEBE LO QUE ENTRA A CAJA GENERAL*/
                 $fecha_actual = substr($fecha_actual,0,17);
                 $fecha_actual = $fecha_actual . '16';
                 $this->entry_list->append();
                 $this->entry_list->fieldset('entry_date',$fecha_actual);
                 $this->entry_list->fieldset('details',$comments);
                 $balance = $unit_price * $cuentas_por_cobrar_clientes;
                 $this->entry_list->fieldset('balance', $balance );
                 $this->entry_list->fieldset('account_id', $caja_general_account_id);
                 $this->entry_list->fieldset('user_id',$user_id);
                 $this->entry_list->post();

            }


                $_SESSION['last_date'] = $fecha_actual;

     }


    function view_consignShow($sender, $params)
    {

        echo '<a href="../index.php?action=home">Inicio</a></br>';
        echo '<a href="view_consign_prod.php">Consignaciones</a></br>';

        $this->consig_prod_list->append();

        date_default_timezone_set('America/La_Paz');

        $fecha_actual = date('Y-m-d H:i:s');

        $this->consig_prod_list->fieldset('consig_date',$fecha_actual);
        $this->consig_prod_list->fieldset('cant',0);
        $this->Query1->close();
        $sql = 'SELECT c.consig_date, c.mov_type, c.cant, p.product_name, g.consig_name  FROM consig_prod AS c INNER JOIN product AS p ON (p.product_id=c.product_id) INNER JOIN consignee AS g ON (g.consig_id = c.consig_id) WHERE 1 ORDER BY c.consig_date DESC';
        $this->Query1->setSQL($sql);
        $this->Query1->open();

        $this->consig_prod_list->fieldset('unit_price', 0);

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
