<?php
error_reporting(0);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("comctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_income_outcome extends Page
{
    public $Query16 = null;
    public $Query15 = null;
    public $Query14 = null;
    public $Query13 = null;
    public $Query12 = null;
    public $Query11 = null;
    public $Query10 = null;
    public $Query9 = null;
    public $Button1 = null;
    public $Query8 = null;
    public $Query7 = null;
    public $Query6 = null;
    public $Query5 = null;
    public $Query4 = null;
    public $Query3 = null;
    public $Query2 = null;
    public $Label3 = null;
    public $Label2 = null;
    public $DateTimePicker2 = null;
    public $Label1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $Query1 = null;
    public $DateTimePicker1 = null;



    function view_income_outcomeBeforeShowHeader($sender, $params)
    {
            echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }

    function Button1Click($sender, $params)
    {

          $this->Label1->Visible = true;


    }
    function view_income_outcomeShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
      $this->Label1->setTop(208);
    }

    function Label1AfterShow($sender, $params)
    {

          $date_ini = $this->DateTimePicker1->Text;
          $date_end = $this->DateTimePicker2->Text;

       echo "
          <TABLE BORDER='1' WIDTH='100%'>
            <TR>
              <TD>PRESUPUESTO</TD>
              <TD>AHORRO</TD>
              <TD>GASTO</TD>
            </TR>";


       echo "
            <TR>
              <TD>Ahorro para envases y etiquetas:</TD>";

     $suma=0;
     $this->Query1->close();
     $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 413 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
     $this->Query1->setSQL($sql);
     $this->Query1->open();
     if(!$this->Query1->EOF){
            $suma= $this->Query1->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query2->close();
     $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 413 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
     $this->Query2->setSQL($sql);
     $this->Query2->open();
     if(!$this->Query2->EOF){
            $suma= $this->Query2->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";

       echo "
            <TR>
              <TD>Ahorro para costos de Comercializ.:</TD>";

     $suma=0;
     $this->Query3->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 419 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query3->setSQL($sql);
     $this->Query3->open();
     if(!$this->Query3->EOF){

            $suma= $this->Query3->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query4->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 419 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query4->setSQL($sql);
     $this->Query4->open();
     if(!$this->Query4->EOF){
            $suma= $this->Query4->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "
            <TR>
              <TD>Ahorro para Reserva:</TD>";

     $suma=0;
     $this->Query5->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 433 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query5->setSQL($sql);
     $this->Query5->open();
     if(!$this->Query5->EOF){

            $suma= $this->Query5->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query6->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 433 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query6->setSQL($sql);
     $this->Query6->open();
     if(!$this->Query6->EOF){

            $suma= $this->Query6->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "
            <TR>
              <TD>Ahorro para otros costos de produccion:</TD>";

     $suma=0;
     $this->Query7->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 434 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query7->setSQL($sql);
     $this->Query7->open();
     if(!$this->Query7->EOF){

            $suma= $this->Query7->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query8->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 434 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query8->setSQL($sql);
     $this->Query8->open();
     if(!$this->Query8->EOF){

            $suma= $this->Query8->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "

            <TR>
              <TD>Ahorro para impuestos:</TD>";

     $suma=0;
     $this->Query9->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 435 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query9->setSQL($sql);
     $this->Query9->open();
     if(!$this->Query9->EOF){

            $suma= $this->Query9->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query10->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 435 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query10->setSQL($sql);
     $this->Query10->open();
     if(!$this->Query10->EOF){

            $suma= $this->Query10->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "
            <TR>
              <TD>Ahorro para mano de obra:</TD>";

     $suma=0;
     $this->Query11->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 579 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query11->setSQL($sql);
     $this->Query11->open();
     if(!$this->Query11->EOF){

            $suma= $this->Query11->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query12->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 579 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query12->setSQL($sql);
     $this->Query12->open();
     if(!$this->Query12->EOF){

            $suma= $this->Query12->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "
            <TR>
              <TD>Ahorro para prod. de mat. primas:</TD>";

     $suma=0;
     $this->Query13->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 581 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query13->setSQL($sql);
     $this->Query13->open();
     if(!$this->Query13->EOF){

            $suma= $this->Query13->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query14->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 581 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query14->setSQL($sql);
     $this->Query14->open();
     if(!$this->Query14->EOF){

            $suma= $this->Query14->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";
       echo "
            <TR>
              <TD>Ahorro para pago de Utilidades:</TD>";

     $suma=0;
     $this->Query15->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance > 0  AND entry.account_id = 582 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query15->setSQL($sql);
     $this->Query15->open();
     if(!$this->Query15->EOF){

            $suma= $this->Query15->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>";
     $suma=0;
     $this->Query16->close();
          $sql = "SELECT SUM(balance) AS suma FROM entry WHERE balance < 0  AND entry.account_id = 582 AND (entry_date BETWEEN '".$date_ini."' AND '".$date_end."')";
          $this->Query16->setSQL($sql);
     $this->Query16->open();
     if(!$this->Query16->EOF){

            $suma= $this->Query16->fieldget('suma');
            if($suma==0){ $suma="0";}
     };
     echo "<TD>".$suma."</TD>
          </TR>";

       echo "
          </TABLE>";
    }


}

global $application;

global $view_income_outcome;

//Creates the form
$view_income_outcome=new view_income_outcome($application);

//Read from resource file
$view_income_outcome->loadResource(__FILE__);

//Shows the form
$view_income_outcome->show();

?>
