<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("comctrls.inc.php");

include("database_module01.php");
include("../model/class.db.php");

//Class definition
class view_costos_ahorrados1 extends Page
{
    public $Label1 = null;
    public $DateTimePicker1 = null;
    public $DateTimePicker2 = null;
    public $lblFechaInicial = null;
    public $lblFechaFinal = null;
    function Label1AfterShow($sender, $params)
    {
          echo '<table border=1>
                  <tr>
                    <td>Titulo 1</td>
                    <td>Titulo 2</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                  <tr>
                    <td>Holi 2</td>
                    <td>Holi 1</td>
                  </tr>
                </table>


          ';
    }
}

global $application;

global $view_costos_ahorrados1;

//Creates the form
$view_costos_ahorrados1=new view_costos_ahorrados1($application);

//Read from resource file
$view_costos_ahorrados1->loadResource(__FILE__);

//Shows the form
$view_costos_ahorrados1->show();

?>
