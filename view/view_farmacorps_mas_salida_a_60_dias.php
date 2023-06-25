<?php
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
class view_farmacorp_mas_salida_a_60_dias extends Page
{
   public $Query1 = null;
   public $dbapicolad_erpdonjusto1 = null;
   public $Datasource1 = null;
   public $Label1 = null;
   public $Label2 = null;
   public $Label3 = null;
   public $DBRepeater1 = null;
   public $Label4 = null;
   public $Label5 = null;
   function view_farmacorp_mas_salida_a_60_diasBeforeShowHeader($sender, $params)
   {
      echo '<meta name="HandheldFriendly" content="true">';

      echo '<meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">';

      echo '<meta name="viewport" content="width=device-width">';



      echo ' <link   type="text/css"  href="css/erpdonjusto.css' . '" rel="stylesheet" />';
      echo '<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>';
   }
   function view_farmacorp_mas_salida_a_60_diasShow($sender, $params)
   {
      echo '<a href="../index.php?action=home">Inicio</a>';
   }
   function view_farmacorp_mas_salida_a_60_diasBeforeShow($sender, $params)
   {
      $this->Query1->Active = TRUE;
      $this->Query1->setSQL("SELECT
	c.consig_name,
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
AND p.mov_type = 'SALIDA'
AND CAST(p.consig_date AS DATE) > CAST(
	DATE_SUB(NOW(), INTERVAL 60 DAY) AS DATE
)
GROUP BY
	c.consig_name
ORDER BY
	monto DESC

");

      $this->Query1->Open();
   }
   function view_farmacorp_mas_salida_a_60_diasCreate($sender, $params)
   {
      $this->Query1->Active = 1;
   }
}

global $application;

global $view_farmacorp_mas_salida_a_60_dias;

//Creates the form
$view_farmacorp_mas_salida_a_60_dias = new view_farmacorp_mas_salida_a_60_dias($application);

//Read from resource file
$view_farmacorp_mas_salida_a_60_dias->loadResource(__FILE__);

//Shows the form
$view_farmacorp_mas_salida_a_60_dias->show();

?>