<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");

//Class definition
class database_module01 extends DataModule
{
    public $dbapicolad_erpdonjusto1 = null;
    public $tbpos_history1 = null;
    public $dspos_history1 = null;
    function database_module01Show($sender, $params)
    {
        $this->tbpos_history1->Active = true;
    }
}

global $application;

global $database_module01;

//Creates the form
$database_module01=new database_module01($application);

//Read from resource file
$database_module01->loadResource(__FILE__);

?>
