<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class Page1 extends Page
{
    public $Image1 = null;
    public $Panel2 = null;
    public $lblPos01 = null;
    public $Label2 = null;
}

global $application;

global $Page1;

//Creates the form
$Page1=new Page1($application);

//Read from resource file
$Page1->loadResource(__FILE__);

//Shows the form
$Page1->show();

?>
