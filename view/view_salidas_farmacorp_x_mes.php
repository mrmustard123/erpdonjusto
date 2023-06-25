<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_salidas_farmacorp_x_mes extends Page
{
    public $Label5 = null;
    public $Label1 = null;
    public $DBRepeater1 = null;
    public $dbapicolad_erpdonjusto1 = null;
    public $Datasource1 = null;
    public $Query1 = null;
    public $Label2 = null;
    public $Label3 = null;
    public $Label4 = null;
    function view_salidas_farmacorp_x_mesBeforeShowHeader($sender, $params)
    {
            echo '<meta name="HandheldFriendly" content="true">';

        echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

        echo '<meta name="viewport" content="width=device-width">';



        echo ' <link   type="text/css"  href="css/erpdonjusto.css'.'" rel="stylesheet" />';
        echo  '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
    }
    function view_salidas_farmacorp_x_mesShow($sender, $params)
    {
      echo '<a href="../index.php?action=home">Inicio</a>';
    }
    function view_salidas_farmacorp_x_mesBeforeShow($sender, $params)
    {
    $this->Query1->Active = TRUE;
      $this->Query1->setSQL("SELECT
	MONTH(p.consig_date) as 'MES', YEAR(p.consig_date) AS 'ANO',
	SUM(p.total_price) AS 'monto'
FROM
	consig_prod AS p
INNER JOIN consignee AS c ON (p.consig_id = c.consig_id)
WHERE
	c.account_id IN (
		SELECT
			account_id
		FROM
			account
		WHERE
			account_code LIKE '1.1.2.2.02%'
	)
AND p.mov_type = 'SALIDA' AND p.consig_date BETWEEN '2021-01-01 00:00:00' AND '2021-12-31 23:59:59'
GROUP BY
	MONTH(p.consig_date)
ORDER BY
	MONTH(p.consig_date)




");

      $this->Query1->Open();
    }
}

global $application;

global $view_salidas_farmacorp_x_mes;

//Creates the form
$view_salidas_farmacorp_x_mes=new view_salidas_farmacorp_x_mes($application);

//Read from resource file
$view_salidas_farmacorp_x_mes->loadResource(__FILE__);

//Shows the form
$view_salidas_farmacorp_x_mes->show();

?>
