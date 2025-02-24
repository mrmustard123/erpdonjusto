<?php
error_reporting(1);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("comctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbctrls.inc.php");
use_unit("db.inc.php");

//Class definition
class ViewConsigSalesProdReport2 extends Page
{
    public $Label10 = null;
    public $Label9 = null;
    public $Label7 = null;
    public $Label6 = null;
    public $Label4 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Button1 = null;
    public $DateTimePicker1 = null;
    public $DateTimePicker2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $DBRepeater1 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $Label3 = null;
    public $Label5 = null;
    public $Label8 = null;
    public $Label11 = null;
    function ViewConsigSalesProdReport2Show($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
    function Button1Click($sender, $params)
    {


      $this->Query1->Active = false;
      $this->Query1->close();

      $date_ini = $this->DateTimePicker1->Text;
      $date_end = $this->DateTimePicker2->Text;

      $sql = "SELECT p.product_name, SUM(c.cant) AS 'cantidad',  SUM(c.unit_price*c.cant) as 'Total_Bs' FROM `consig_prod` AS c INNER JOIN product AS p ON (c.product_id=p.product_id) WHERE c.consig_date BETWEEN '" . $date_ini . "' AND '" . $date_end . "' AND c.mov_type = 'SALIDA' GROUP BY c.product_id";

      $this->Query1->setSQL($sql);

      $this->Query1->open();
    }
    function ViewConsigSalesProdReport2ShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
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
}

global $application;

global $ViewConsigSalesProdReport2;

//Creates the form
$ViewConsigSalesProdReport22=new ViewConsigSalesProdReport($application);

//Read from resource file
$ViewConsigSalesProdReport2->loadResource(__FILE__);

//Shows the form
$ViewConsigSalesProdReport2->show();

?>
