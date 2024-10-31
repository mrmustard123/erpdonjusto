<?php
error_reporting(0);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");

include("database_module01.php");
//include("../model/class.db.php");

//Class definition
class view_get_consig_prod extends Page
{
    public $dbamenoec1_erpdonjusto1 = null;
    public $Query1 = null;
    function view_get_consig_prodShow($sender, $params)
    {
            $product_id = 0;
            $consig_id = 0;
            $product_id = $_POST['product_id'];
            $consig_id = $_POST['consig_id'];
            $this->Query1->LimitCount = 1;
            $this->Query1->close();
            $sql = "SELECT * FROM consig_prod WHERE consig_id = ".$consig_id." AND product_id = ".$product_id." ORDER BY consig_date DESC";
            $this->Query1->setSQL($sql);
            $this->Query1->open();
            $this->Query1->last();
            if($this->Query1->RecordCount > 0){
                echo $this->Query1->fieldget('balance').','.$this->Query1->fieldget('topay').',';
            }else{
                echo '0,0';

            }

    }
    function view_get_consig_prodShowHeader($sender, $params)
    {
       echo '<script src="./js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
}

global $application;

global $view_get_consig_prod;

//Creates the form
$view_get_consig_prod=new view_get_consig_prod($application);

//Read from resource file
$view_get_consig_prod->loadResource(__FILE__);

//Shows the form
$view_get_consig_prod->show();

?>
