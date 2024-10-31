<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_mapa_apiarios extends Page
{
    public $Image1 = null;
    public $Panel2 = null;
    public $lblPos01 = null;
    public $Label2 = null;
}

global $application;

global $view_mapa_apiarios;

//Creates the form
$view_mapa_apiarios=new view_mapa_apiarios($application);

//Read from resource file
$view_mapa_apiarios->loadResource(__FILE__);

//Shows the form
$view_mapa_apiarios->show();

?>
