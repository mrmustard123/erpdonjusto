<?php
error_reporting(1);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbctrls.inc.php");
use_unit("db.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_consig_list extends Page
{
    public $Label6 = null;
    public $Label5 = null;
    public $Label4 = null;
    public $Label3 = null;
    public $Label2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $DBRepeater1 = null;
    public $tbconsignee1 = null;
    public $dsconsignee1 = null;
    public $consig_id1 = null;
    public $consig_name1 = null;
    public $consig_tel1 = null;
    public $consig_details1 = null;
    public $consig_coord1 = null;
    public $consig_addr1 = null;
    public $Label1 = null;
    function view_consig_listShow($sender, $params)
    {
     echo '<a href="../index.php?action=home">Inicio</a>';
           $cont = 0;
    }
    function view_consig_listShowHeader($sender, $params)
    {
            echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';

    }
    function consig_id1BeforeShow($sender, $params)
    {
     $_SESSION['cont_consig']++;
    echo $_SESSION['cont_consig'];
    }
    function view_consig_listCreate($sender, $params)
    {
        $_SESSION['cont_consig'] = 0;
    }
}

global $application;

global $view_consig_list;

global $cont;

//Creates the form
$view_consig_list=new view_consig_list($application);

//Read from resource file
$view_consig_list->loadResource(__FILE__);

//Shows the form
$view_consig_list->show();

?>
