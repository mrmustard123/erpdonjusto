<?php
/*HE DESHABILITADO ESTE ARCHIVO POR QUE ESTABA ACTUALIZANDO MAL PROD_COST_PROD*/
error_reporting(1);
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
use_unit("jsval/formvalidator.inc.php");
use_unit("dbctrls.inc.php");
use_unit("mysql.inc.php");

include("database_module01.php");
//include("../model/class.db.php");

//Class definition
class view_supply_price extends Page
{
    public $Panel1 = null;
    public $tbsupply1 = null;
    public $dssupply1 = null;
    public $tbproduct_cost1 = null;
    public $dsproduct_cost1 = null;
    public $tbsupply_price1 = null;
    public $tbsupply2 = null;
    public $dssupply2 = null;
    public $Query1 = null;

    public $account_id;

    function supply_name1Change($sender, $params)
    {


            $supply_id = $this->supply_name1->getItemIndex();

            $this->tbsupply2->Filter =  ' supply_id='.$supply_id;
            $this->tbsupply2->refresh();

            $account_id = $this->tbsupply2->fieldget('cost_account_id');



            if($account_id){
              $this->tbproduct_cost1->Filter = ' account_id='.$account_id;
              $this->tbproduct_cost1->refresh();
            }

    }

    function Button1Click($sender, $params)
    {

           $cost_value = $this->tbsupply2->fieldget('price');
           $supply_id= $this->tbsupply2->fieldget('supply_id');
           $supply_name = $this->tbsupply2->fieldget('supply_name');
           $supply_prod_cost_id = $this->tbsupply2->fieldget('prod_cost_id');

           $this->tbsupply2->post();


           if(ISSET($supply_prod_cost_id)){

            $sql = "UPDATE prod_cost_prod SET cost_value=".$cost_value." WHERE prod_cost_id=".$supply_prod_cost_id." #";

            $this->Query1->setSQL($sql);

            $this->Query1->buildQuery();

            $this->Query1->Prepare();

            $this->Query1->open();
           }


           date_default_timezone_set('America/La_Paz');
           $fecha_actual = date('Y-m-d H:i:s');

           $this->tbsupply_price1->append();
           $this->tbsupply_price1->fieldset('value',$cost_value);
           $this->tbsupply_price1->fieldset('start_date',$fecha_actual);
           $this->tbsupply_price1->fieldset('comments',$supply_name);
           $this->tbsupply_price1->fieldset('supply_id',$supply_id);
           $this->tbsupply_price1->post();



    }
    function view_supply_priceShow($sender, $params)
    {
        //echo 'ESTO ES ON SHOW!';
        $this->supply_name1->Clear();
        $this->supply_name1->AddItem('[selecionar]', null, 0);
        $this->tbsupply1->first();
        while(!$this->tbsupply1->EOF){
            $supply_name1 = $this->tbsupply1->fieldget('supply_name');
            $supply_id = $this->tbsupply1->fieldget('supply_id');
            $this->supply_name1->AddItem($supply_name1 , null, $supply_id);
            $this->tbsupply1->next();
        }


    }
    function Button2Click($sender, $params)
    {
        $this->tbsupply2->edit();
    }


    function view_supply_priceShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        require 'view_links.php';

        /*echo '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';*/





    }
    function view_supply_priceStartBody($sender, $params)
    {
      //echo 'ESTO ES ON START BODY';

      //echo '<form  style="margin-bottom: 0" id="view_supply_price" name="view_supply_price" method="post"   action="/erpdonjusto/view/view_supply_price.php" >';

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
    function view_supply_priceAfterShow($sender, $params)
    {
       //echo 'ESTO ES AFTER SHOW';
    }
    function view_supply_priceAfterShowFooter($sender, $params)
    {
      //echo 'ESTO ES AFTER SHOW FOOTER';
      echo '</div> <!--end div_target-->';
      echo '</div> <!--end wrapper-->';
      //echo '</form>';

    }
    function view_supply_priceTemplate($sender, $params)
    {
      //echo 'ESTO ES ON TEMPLATE';
    }
    function view_supply_priceBeforeShowHeader($sender, $params)
    {
      //echo 'ESTO ES ON BEFORE SHOW HEADER';
    }
    function Panel1AfterShow($sender, $params)
    {
       //echo 'ESTO ES PANEL1 AFTER SHOW';
    }
    function Panel1BeforeShow($sender, $params)
    {
      //echo 'ESTO ES PANEL1 BEFORE SHOW';
    }
    function Panel1Show($sender, $params)
    {
      //echo 'ESTO ES PANEL1 ON SHOW';
    }
}

global $application;

global $view_supply_price;

//Creates the form
$view_supply_price=new view_supply_price($application);

//Read from resource file
$view_supply_price->loadResource(__FILE__);

//Shows the form
$view_supply_price->show();

?>
