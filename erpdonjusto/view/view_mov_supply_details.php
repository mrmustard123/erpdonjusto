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

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_mov_supply_details extends Page
{
    public $Shape8 = null;
    public $Shape6 = null;
    public $Shape2 = null;
    public $Shape3 = null;
    public $Shape4 = null;
    public $Shape5 = null;
    public $Shape1 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    public $Label5 = null;
    public $Label6 = null;
    public $Label7 = null;
    public $Label8 = null;
    public $Label9 = null;
    public $Label10 = null;
    public $lblTitulo = null;
    public $Label13 = null;
    public $Label14 = null;
    public $Label15 = null;
    public $Label16 = null;
    public $Query1 = null;
    public $dsQuery1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    function view_mov_supply_detailsShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
      $mov_supply_id = $_GET['movid'];
      $sql = "SELECT m.*, s.supply_name FROM mov_supply as m INNER JOIN supply as s ON (m.supply_id = s.supply_id) WHERE m.mov_supply_id =".$mov_supply_id;
      $this->Query1->setSQL($sql);
      $this->Query1->open();
    }
    function view_mov_supply_detailsShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_mov_supply_details;

//Creates the form
$view_mov_supply_details=new view_mov_supply_details($application);

//Read from resource file
$view_mov_supply_details->loadResource(__FILE__);

//Shows the form
$view_mov_supply_details->show();

?>
