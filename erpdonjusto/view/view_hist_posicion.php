<?php
error_reporting(1);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("comctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_hist_posicion extends Page
{
    public $Button1 = null;
    public $Label4 = null;
    public $DateTimePicker1 = null;
    public $Label3 = null;
    public $Label2 = null;
    public $Label1 = null;
    public $comentario1 = null;
    public $posicion_id1 = null;
    public $apiario1 = null;
    public $dshistorico_posicion1 = null;
    public $tbhistorico_posicion1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    function view_hist_posicionShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
      $this->tbhistorico_posicion1->append();
    }
    function Button1Click($sender, $params)
    {
      $this->tbhistorico_posicion1->fieldset('fecha', $this->DateTimePicker1->Text);
      $this->tbhistorico_posicion1->post();
    }
    function view_hist_posicionShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_hist_posicion;

//Creates the form
$view_hist_posicion=new view_hist_posicion($application);

//Read from resource file
$view_hist_posicion->loadResource(__FILE__);

//Shows the form
$view_hist_posicion->show();

?>
