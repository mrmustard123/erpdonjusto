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
use_unit("comctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_new_consignee extends Page
{
    public $Query2 = null;
    public $Query1 = null;
    public $Label1 = null;
    public $dbapicolad_erpdonjusto1 = null;
    public $tbconsignee1 = null;
    public $dsconsignee1 = null;
    public $Button1 = null;
    public $consig_addr1 = null;
    public $consig_coord1 = null;
    public $consig_details1 = null;
    public $consig_name1 = null;
    public $consig_tel1 = null;
    public $consig_activo1 = null;
    public $tbaccount1 = null;
    public $dsaccount1 = null;
    public $tbaccount2 = null;
    public $dsaccount2 = null;
    public $code1 = null;
    public $code2 = null;
    function Button1Click($sender, $params)
    {

        //TO DO:
       //1. crear cta. x cobrar en plan de cuentas

       $code1 = $this->tbaccount1->fieldget('account_code');
       $name1 = 'Cta.x cobrar a '.$this->tbconsignee1->fieldget('consig_name');
       $this->tbaccount1->fieldset('name',$name1);
       $this->tbaccount1->fieldset('account_type','Apropiacion');


       //2. Crear cta. consignatario en el plan de cuentas

       $code2 = $this->tbaccount2->fieldget('account_code');
       $name2 = 'Consignaciones '.$this->tbconsignee1->fieldget('consig_name');
       $this->tbaccount2->fieldset('name',$name2);
       $this->tbaccount2->fieldset('account_type','Apropiacion');


       $this->tbaccount1->post();
       $this->tbaccount2->post();


       $this->tbaccount1->refresh();
       $this->tbaccount2->refresh();

       $this->Query1->setSQL('SELECT account_id FROM account WHERE `account_code`="'.$code1.'"');
       $this->Query1->open();

       $account_id1 = $this->Query1->fieldget('account_id');

       $this->Query2->setSQL('SELECT account_id FROM account WHERE `account_code`="'.$code2.'"');
       $this->Query2->open();

       $account_id2 = $this->Query2->fieldget('account_id');


       //3. Crear consignatario

       $this->tbconsignee1->fieldset('ctas_por_cobrar_id',$account_id1);
       $this->tbconsignee1->fieldset('account_id',$account_id2);

       $this->tbconsignee1->post();


    }
    function view_new_consigneeShow($sender, $params)
    {
       echo '<a href="../index.php?action=home">Inicio</a>';
       $this->tbconsignee1->append();
       $this->tbaccount1->append();
       $this->tbaccount2->append();
    }
    function view_new_consigneeShowHeader($sender, $params)
    {

        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_new_consignee;

//Creates the form
$view_new_consignee=new view_new_consignee($application);

//Read from resource file
$view_new_consignee->loadResource(__FILE__);

//Shows the form
$view_new_consignee->show();

?>
