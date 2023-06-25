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

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_budget0001 extends Page
{
    public $Button1 = null;
    public $Label3 = null;
    public $Label2 = null;
    public $DateTimePicker2 = null;
    public $Label1 = null;
    public $Query1 = null;
    public $Query2 = null;
    public $dbamenoec1_erpdonjusto1 = null;
    public $DateTimePicker1 = null;
    function Label3AfterShow($sender, $params)
    {

        $date_ini = $this->DateTimePicker1->Text;
        $date_end = $this->DateTimePicker2->Text;

        $ahorro =0;
        $gasto = 0;
        $saldo = 0;

        if(($date_ini!='')&&($date_end!='')){
            $this->Query1->close();
            $sql = "SELECT SUM(balance) AS 'miel'  FROM entry WHERE account_id = 280 AND entry_date BETWEEN '".$date_ini."' AND '".$date_end."' AND balance < 0";
            $this->Query1->setSQL($sql);
            $this->Query1->open();

            $miel = $this->Query1->fieldget('miel')*-1;
            $this->Query1->close();
            $sql = "SELECT SUM(balance) AS 'propoleo'  FROM entry WHERE account_id = 282 AND entry_date BETWEEN '".$date_ini."' AND '".$date_end."' AND balance < 0";
            $this->Query1->setSQL($sql);
            $this->Query1->open();

            $propoleo = $this->Query1->fieldget('propoleo')*-1;

            $this->Query1->close();
            $sql = "SELECT SUM(balance) AS 'vira_vira'  FROM entry WHERE account_id = 294 AND entry_date BETWEEN '".$date_ini."' AND '".$date_end."' AND balance < 0";
            $this->Query1->setSQL($sql);
            $this->Query1->open();

            $vira_vira = $this->Query1->fieldget('vira_vira')*-1;


            $this->Query1->close();

            $sql = "SELECT  SUM(balance) AS 'Gasto'  FROM entry e INNER JOIN account a ON (e.account_id=a.account_id)
                    WHERE entry_date BETWEEN '".$date_ini."' AND '".$date_end."' AND a.code LIKE '7.1.1.1.02%' AND e.balance > 0";

            $this->Query1->setSQL($sql);
            $this->Query1->open();

            $gasto = $this->Query1->fieldget('Gasto');

            $ahorro = $miel+$propoleo+$vira_vira;

            $saldo = $ahorro -  $gasto;

        }//end if


        ?>

<h1>MATERIAS PRIMAS</h1>
<table border="1">
    <tr>
        <td>Ahorro</td>
        <td>Gasto</td>
        <td>Saldo</td>
    </tr>
    <tr>
        <td><?php echo $ahorro; ?></td>
        <td><?php echo $gasto; ?></td>
        <td><?php echo $saldo; ?></td>
    </tr>
</table>



        <?php



    }
    function Button1Click($sender, $params)
    {
        $this->Label3->Visible=true;
        $this->Label3->Left = 30;
        $this->Label3->Top = 200;

    }
    function view_budget0001ShowHeader($sender, $params)
    {
        echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';

        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function view_budget0001Show($sender, $params)
    {
          echo '<a href="../index.php?action=home">Inicio</a>';
    }
}

global $application;

global $view_budget0001;

//Creates the form
$view_budget0001=new view_budget0001($application);

//Read from resource file
$view_budget0001->loadResource(__FILE__);

//Shows the form
$view_budget0001->show();

?>
