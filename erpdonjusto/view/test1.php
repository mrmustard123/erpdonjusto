<?php
error_reporting(0);
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("comctrls.inc.php");
use_unit("qooxdoo/comctrls.inc.php");

//Class definition
class Test1 extends Page
{
    public $Label6 = null;
    public $Label5 = null;
    public $Label4 = null;
    public $Label3 = null;
    public $Label2 = null;
    public $Label1 = null;
    public $user_id1 = null;
    public $entry_id1 = null;
    public $entry_date1 = null;
    public $details1 = null;
    public $balance1 = null;
    public $account_id1 = null;
    public $dsentry1 = null;
    public $tbentry1 = null;
    public $Button1 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $DateTimePicker1 = null;
    function Button1Click($sender, $params)
    {
        /*
                 $this->tbentry1->append();
                 $this->tbentry1->fieldset('entry_id',NULL);
                 $this->tbentry1->fieldset('entry_date','2017-07-25 15:20:39');
                 $this->tbentry1->fieldset('details','Test1');
                 $this->tbentry1->fieldset('balance',7.31);
                 $this->tbentry1->fieldset('account_id',216);
                 $this->tbentry1->fieldset('user_id',4);
                 $this->tbentry1->post();
         *
         */
    }
}

global $application;

global $Test1;

//Creates the form
$Test1=new Test1($application);

//Read from resource file
$Test1->loadResource(__FILE__);

//Shows the form
$Test1->show();

?>
