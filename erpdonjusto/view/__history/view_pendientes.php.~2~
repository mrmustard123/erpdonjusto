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
class view_pendientes extends Page
{
    public $DateTimePicker1 = null;
    public $cuerpo1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $tbpendientes1 = null;
    public $dspendientes1 = null;
    public $Label1 = null;
    public $btnGravar = null;
    function view_pendientesShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
      $this->tbpendientes1->append();
    }

    function view_pendientesBeforeShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function btnGravarClick($sender, $params)
    {
        $this->tbpendientes1->fieldset('fecha',$this->DateTimePicker1->Text);
        $this->tbpendientes1->fieldset('realizado','N');
        $this->tbpendientes1->post();
    }
}

global $application;

global $view_pendientes;

//Creates the form
$view_pendientes=new view_pendientes($application);

//Read from resource file
$view_pendientes->loadResource(__FILE__);

//Shows the form
$view_pendientes->show();

?>
