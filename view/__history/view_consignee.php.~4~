<?php
require_once("rpcl/rpcl.inc.php");
error_reporting(0);
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
class view_consignee extends Page
{
    public $Label7 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $consignee_list = null;
    public $dsconsignee1 = null;
    public $account_id1 = null;
    public $consig_addr1 = null;
    public $consig_coord1 = null;
    public $consig_details1 = null;
    public $consig_name1 = null;
    public $consig_tel1 = null;
    public $Label1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    public $Label5 = null;
    public $Label6 = null;
    public $Button1 = null;
    public $ctas_por_cobrar_id1 = null;
    function view_consigneeBeforeShow($sender, $params)
    {
      $this->consignee_list->append();
    }
    function Button1Click($sender, $params)
    {
      $this->consignee_list->post();
    }
    function view_consigneeBeforeShowHeader($sender, $params)
    {

        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function view_consigneeShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
}

global $application;

global $view_consignee;

//Creates the form
$view_consignee=new view_consignee($application);

//Read from resource file
$view_consignee->loadResource(__FILE__);

//Shows the form
$view_consignee->show();

?>
