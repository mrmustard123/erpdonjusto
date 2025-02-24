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

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_budget0002 extends Page
{
    public $Label20 = null;
    public $Label19 = null;
    public $dsentry9 = null;
    public $Query9 = null;
    public $dsentry8 = null;
    public $Query8 = null;
    public $Label18 = null;
    public $Label15 = null;
    public $dsentry7 = null;
    public $lblTotal = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $dsentry1 = null;
    public $Query1 = null;
    public $Query2 = null;
    public $Query3 = null;
    public $Query4 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    public $dsentry2 = null;
    public $dsentry3 = null;
    public $dsentry4 = null;
    public $Label5 = null;
    public $Label6 = null;
    public $Label7 = null;
    public $Label8 = null;
    public $Query5 = null;
    public $dsentry5 = null;
    public $Query6 = null;
    public $dsentry6 = null;
    public $Label9 = null;
    public $Label10 = null;
    public $Label11 = null;
    public $Label12 = null;
    public $Label13 = null;
    public $Label14 = null;
    public $Query7 = null;
    public $Label16 = null;
    public $Label17 = null;
    function view_budget0002BeforeShowHeader($sender, $params)
    {

        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function view_budget0002Show($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
    function Query9AfterOpen($sender, $params)
    {

    /*
    SELECT TRUNCATE(SUM(balance),2) as balance FROM `entry` WHERE account_id = 582 AND entry_date BETWEEN '2019-06-28 11:48:46' AND ADDATE(NOW(),1);
    */

            $otros=$this->Query1->fieldget('balance');
            $envases=$this->Query2->fieldget('balance');
            $comercializacion=$this->Query3->fieldget('balance');
            $reserva=$this->Query4->fieldget('balance');
            $produccion=$this->Query5->fieldget('balance');
            $impuestos=$this->Query6->fieldget('balance');
            $mano_de_obra=$this->Query7->fieldget('balance');
            $mat_primas=$this->Query8->fieldget('balance');
            $utilidades=$this->Query9->fieldget('balance');
            
            if($otros < 0){
              $this->Label2->Font->Color = '#FF000';
            }

            if($envases < 0){
              $this->Label4->Font->Color = '#FF000';
            }

            if($comercializacion < 0){
              $this->Label6->Font->Color = '#FF0000';
            }

            if($reserva < 0){
              $this->Label8->Font->Color = '#FF0000';
            }

            if($produccion < 0){
              $this->Label10->Font->Color = '#FF0000';
            }

            if($impuestos < 0){
              $this->Label12->Font->Color = '#FF0000';
            }

            if($mano_de_obra < 0){
              $this->Label16->Font->Color = '#FF0000';
            }

            if($mat_primas < 0){
              $this->Label17->Font->Color = '#FF0000';
            }

            if($utilidades < 0){
              $this->Label20->Font->Color = '#FF000';
            }
          

            $total = $this->Query1->fieldget('balance')+$this->Query2->fieldget('balance')+$this->Query3->fieldget('balance')+$this->Query4->fieldget('balance')+$this->Query5->fieldget('balance')+$this->Query6->fieldget('balance')+$this->Query7->fieldget('balance')+$this->Query8->fieldget('balance')+$this->Query9->fieldget('balance');
            $this->lblTotal->Caption =  $total;
    }
}

global $application;

global $view_budget0002;

//Creates the form
$view_budget0002=new view_budget0002($application);

//Read from resource file
$view_budget0002->loadResource(__FILE__);

//Shows the form
$view_budget0002->show();

?>
