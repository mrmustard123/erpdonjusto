<?php
error_reporting(1);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_consig_lasts_mov extends Page
{
    public $dbamenoec1_erpdonjusto1 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $DBRepeater1 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label5 = null;
    public $Label6 = null;
    public $Label7 = null;
    function view_consig_lasts_movShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
    function view_consig_lasts_movShowHeader($sender, $params)
    {



        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_consig_lasts_mov;

//Creates the form
$view_consig_lasts_mov=new view_consig_lasts_mov($application);

//Read from resource file
$view_consig_lasts_mov->loadResource(__FILE__);

//Shows the form
$view_consig_lasts_mov->show();

?>
