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
class view_budget0003 extends Page
{
    public $dsentry8 = null;
    public $Query8 = null;
    public $Label18 = null;
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
    public $Label9 = null;
    public $Label10 = null;
    public $Label11 = null;
    public $Label12 = null;
    public $Label13 = null;
    public $Label14 = null;
    public $Query7 = null;
    public $lblCostoProdMatPrim = null;
    function view_budget0003BeforeShowHeader($sender, $params)
    {

        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function view_budget0003Show($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
    function Query8AfterOpen($sender, $params)
    {

            $total = $this->Query1->fieldget('balance')+$this->Query2->fieldget('balance')+$this->Query3->fieldget('balance')+$this->Query4->fieldget('balance')+$this->Query5->fieldget('balance')+$this->Query7->fieldget('balance')+$this->Query8->fieldget('balance');
            $this->lblTotal->Caption =  $total;

    }
}

global $application;

global $view_budget0003;

//Creates the form
$view_budget0003=new view_budget0003($application);

//Read from resource file
$view_budget0003->loadResource(__FILE__);

//Shows the form
$view_budget0003->show();

?>
