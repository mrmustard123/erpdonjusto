<?php
//error_reporting(E_ALL);
error_reporting(0);
session_start();
$_SESSION['view']='radphp';
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("dbctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_consign_prod extends Page
{
    public $Label1 = null;
    public $consig_id1 = null;
    public $consig_details1 = null;
    public $Button1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    public $Label9 = null;
    public $Label10 = null;
    public $Label7 = null;
    public $Label11 = null;
    public $Label13 = null;
    public $DBRepeater1 = null;
    public $Panel1 = null;
    public $dsconsignee2 = null;
    public $tbconsignee1 = null;
    public $dsconsig_prod1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $Datasource1 = null;
    public $consignee_list = null;
    public $dsconsignee1 = null;
    public $Query1 = null;
    public $tbconsig_prod1 = null;
    function consig_id1Change($sender, $params)
    {
            $consig_id = 0;
            $this->Query1->Active = false;
            $consig_id = $this->consig_id1->getItemIndex();
            $_SESSION['consig_id'] = $consig_id;
            $this->Query1->close();
            $sql = "SELECT  a.consig_date, c.product_name, a.balance, a.topay, a.total_price  FROM consig_prod AS a, product AS c,
                (SELECT product_id, MAX(consig_date) AS c_date FROM consig_prod WHERE consig_id = ".$consig_id."
                GROUP BY product_id
                ORDER BY consig_date) AS b  WHERE (a.product_id = b.product_id) AND (a.consig_date = b.c_date) AND (a.product_id = c.product_id) AND (a.consig_id = ".$consig_id.")";
            $this->Query1->setSQL($sql);
            $this->Query1->open();
            $this->Query1->Active = true;

            if($consig_id){
              $this->tbconsignee1->close();
              $this->tbconsignee1->Filter = 'consig_id = '.$consig_id;
              $this->tbconsignee1->open();
            }



    }
    function view_consign_prodShow($sender, $params)
    {


        $this->consignee_list->first();
        $this->consig_id1->Clear();

        $this->consig_id1->AddItem('[selecionar]', null, 0);
        while(!$this->consignee_list->EOF){
            $consig_name = $this->consignee_list->fieldget('consig_name');
            $consig_id = $this->consignee_list->fieldget('consig_id');
            $this->consig_id1->AddItem($consig_name , null, $consig_id);
            $this->consignee_list->next();
        }


    }
    function view_consign_prodShowHeader($sender, $params)
    {


        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        require 'view_links.php';


    }
    function Button1Click($sender, $params)
    {
      $this->tbconsignee1->post();
    }
    function view_consign_prodStartBody($sender, $params)
    {

      echo "<style>
                #Panel1_outer{
                    position: relative !important;
                    width: 100% !important;
                }
            </style>";
       echo '<div class="wrapper">';
       require "view_menu.php";
       echo '<div id="div_target">';
    }
    function view_consign_prodAfterShowFooter($sender, $params)
    {

       echo '</div> <!--end div_target-->';
       echo '</div> <!--end wrapper-->';

    }
}

global $application;

global $view_consign_prod;

//Creates the form
$view_consign_prod=new view_consign_prod($application);

//Read from resource file
$view_consign_prod->loadResource(__FILE__);

//Shows the form
$view_consign_prod->show();

?>
