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
class view_pend_empresa extends Page
{
    public $Button3 = null;
    public $dspend_empresa2 = null;
    public $tbpend_empresa2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $tbpend_empresa1 = null;
    public $dspend_empresa1 = null;
    public $pend_empresa1 = null;
    public $cuerpo1 = null;
    public $responsable1 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $DateTimePicker1 = null;
    public $Label3 = null;
    public $Button1 = null;
    public $Button2 = null;
    function Button1Click($sender, $params)
    {
      $this->tbpend_empresa2->fieldset('fecha', $this->DateTimePicker1->Text);
      $this->tbpend_empresa2->fieldset('realizado', 'N');
      $this->tbpend_empresa2->post();
      $this->tbpend_empresa1->refresh();
    }
    function Button2Click($sender, $params)
    {
      $this->tbpend_empresa2->append();

    }
    function Button3Click($sender, $params)
    {
        $this->tbpend_empresa1->refresh();
    }
    function view_pend_empresaBeforeShowHeader($sender, $params)
    {

        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_pend_empresa;

//Creates the form
$view_pend_empresa=new view_pend_empresa($application);

//Read from resource file
$view_pend_empresa->loadResource(__FILE__);

//Shows the form
$view_pend_empresa->show();

?>
