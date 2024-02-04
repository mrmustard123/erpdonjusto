<?php

/**
 * Project:  ErpDonJusto 
 * File: export_libro_diario_xls.php
 * Created on: Mar 16, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



require_once "realpath.php";
$paths = realpath::get_realpath();
$relative_path = $paths["relative_path"];
$path_html = $paths["path_html"];

/*
echo 'Relative path: '.$relative_path.'<br/>';
echo 'Path html: '.$path_html.'<br/>';
*/






/*Se establecen los encabezados para que el navegador interprete que descargará un archivo de Excel.*/

header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=libro_diario.xls");
header("Pragma: no-cache");
header("Expires: 0");


$fecha_ini = $_GET['fecha_ini'];
$fecha_fin = $_GET['fecha_fin'];

require_once '../model/model.php';

        $model = new model();

        /*var_dump($model);*/
        
        $v_entries = NULL;

        
        if( ( isset($_GET['fecha_ini']) ) && ( isset($_GET['fecha_fin']) )  ){
            
            $v_entries = $model->getLibroDiario($_GET['fecha_ini'], $_GET['fecha_fin']);

        }

        /*echo '<h1>var_dump:</h1><br>';*/

        /*var_dump($v_entries);*/
        
        $print = '';


      
 
$print .= 
'<table>
  <tr>
    <td>FECHA</td>
    <td>CODIGO</td>
    <td>NOMBRE</td>
    <td>GLOSA</td>
    <td>DEBE</td>
    <td>HABER</td>
  </tr>';
 
  
 


        if($v_entries){

            

            foreach($v_entries as $entry){



 
            $print.=   
                '<tr>
                    <td>'. $entry['entry_date']. '</td>
                    <td>'. $entry['account_code'] .'</td>
                    <td>'.$entry['name'] .'</td>
                    <td>'. $entry['details'] .'</td>
                    <td>'; 

                            if($entry['balance']>0){

                                $print .= ' '.str_replace( '.', ',',$entry['balance']); 

                            }

                            

                         

                   $print.=' </td>

                    <td>';

                            if($entry['balance']<0){

                                $print .= ' '.str_replace('.', ',',$entry['balance']); 

                            }                    

                    

                    $print .= '</td>
                </tr>';                    
                
              

            }
           

        }        
    $print .= '</table>';
    echo $print;

?>