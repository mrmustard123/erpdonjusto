<?php
//error_reporting(E_ALL);
error_reporting(0);
echo 'HOLA MUNDer!';
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("comctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbctrls.inc.php");
use_unit("db.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class ViewConsigSalesProdReport extends Page
{
    public $Label10 = null;
    public $Label9 = null;
    public $Label7 = null;
    public $Label6 = null;
    public $Label4 = null;
    public $Button1 = null;
    public $DBRepeater1 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $Label3 = null;
    public $Label5 = null;
    public $Label8 = null;
    public $Label11 = null;
    function Button1Click($sender, $params)
    {


      $this->Query1->Active = false;
      $this->Query1->close();

        if( ( isset($_POST['edt_fecha_ini']) ) && ( isset($_POST['edt_fecha_fin']) )  ){

            $date_ini = $_POST['edt_fecha_ini'];// $this->DateTimePicker1->Text;
            $date_end = $_POST['edt_fecha_fin'];// $this->DateTimePicker2->Text;

        }



      $sql = "SELECT p.product_name, SUM(c.cant) AS 'cantidad',  SUM(c.unit_price*c.cant) as 'Total_Bs' FROM `consig_prod` AS c INNER JOIN product AS p ON (c.product_id=p.product_id) WHERE c.consig_date BETWEEN '" . $date_ini .' 00:00:00 '. "' AND '" . $date_end .' 23:59:59 '. "' AND c.mov_type = 'PAGO' GROUP BY c.product_id";
            //SELECT p.product_name, SUM(c.cant) AS 'cantidad',  SUM(c.unit_price*c.cant) as 'Total_Bs' FROM `consig_prod` AS c INNER JOIN product AS p ON (c.product_id=p.product_id) WHERE c.consig_date BETWEEN '                              ' AND '                              ' AND c.mov_type = 'PAGO' GROUP BY c.product_id

      $this->Query1->setSQL($sql);

      $this->Query1->open();
    }
    function ViewConsigSalesProdReportShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        //require_once("view_links.php"); //no lo estoy poniendo por que le adiciona 'view' al path y no funciona

        ?>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js" ></script>


	<link   type="text/css"       href="css/bootstrap.min.css" rel="stylesheet" />
        <link   type="text/css"       href="css/erpdonjusto.css" rel="stylesheet" />
        <link   type="text/css"       href="css/styles.css" rel="stylesheet" />
	<link   type="text/css"       href="js/jquery-ui-1.11.4.css" rel="stylesheet" />
        <!--/*ES IMPORTANTE EL ORDEN DE LOS SCRIPTS JS PARA LA COMPATIBILIDAD
        POR EJEMPLO DEL DATAPICKER Y EL SIDEBAR COLLAPSE*/ -->
        <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.11.4.js" type="text/javascript"></script>




        <?php
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
<?php

    }
    function Label11AfterShow($sender, $params)
    {


       echo '<table border="1">
                  <tr>
                    <td> PRODUCTO  </td>
                    <td> CANTIDAD  </td>
                    <td> TOTAL BS.- </td>
                  </tr>';
        $total_cant=0;
        $total_bs =0;
        $this->Query1->first();
        while (!$this->Query1->EOF){
          $cantidad = $this->Query1->fieldget('cantidad');
          $dinero = $this->Query1->fieldget('Total_Bs');
          echo '<tr>
                    <td>'.$this->Query1->fieldget('product_name').'</td>
                    <td>'.$cantidad.'</td>
                    <td>'.$dinero.'</td>
                </tr>';

          $total_cant = $total_cant+$cantidad;
          $total_bs = $total_bs+$dinero;
          $this->Query1->next();
        }//end while

        echo   '<tr>
                    <td>TOTAL </td>
                    <td>'.$total_cant.'</td>
                    <td>'.$total_bs.'</td>
                </tr>';

    }
    function ViewConsigSalesProdReportStartBody($sender, $params)
    {
?>

<div class="date_select_container">


          <input type="hidden" name="action" id="action" value="librodiario" />

          <div id="div_fechas" >
              <div id="datepicker1"><h3>Fecha Inicio:<?php  if( isset( $params['edt_fecha_ini'] )){ echo $params['edt_fecha_ini']; }  ?></h3>
            <input type="hidden" name="edt_fecha_ini" id="edt_fecha_ini"    autocomplete="off"  />
            </div>


              <div id="datepicker2"><h3>Fecha Fin:<?php  if( isset( $params['edt_fecha_fin'] )){ echo $params['edt_fecha_fin']; }  ?></h3>
            <input type="hidden" name="edt_fecha_fin" id="edt_fecha_fin"    autocomplete="off" />
            </div>
          </div>


      <p>&nbsp;</p>
</div>

<?php


    }
}

global $application;

global $ViewConsigSalesProdReport;

//Creates the form
$ViewConsigSalesProdReport=new ViewConsigSalesProdReport($application);

//Read from resource file
$ViewConsigSalesProdReport->loadResource(__FILE__);

//Shows the form
$ViewConsigSalesProdReport->show();

?>
