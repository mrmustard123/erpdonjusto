<?php

/**
 * Project:  ErpDonJusto 
 * File: export_libro_diario_xls.php
 * Created on: Mar 16, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */




    $path = dirname(dirname(__FILE__));


    $dirname = str_replace('\\', '/', dirname(dirname(__FILE__)));

    $v_dirname = explode('/',$dirname);

    $v_script_name = explode('/',$_SERVER['SCRIPT_FILENAME']);

    $i = 0;



    $seguir = TRUE;

    while(  $seguir ){



        if($i>(count($v_dirname)-1)){

            $seguir = FALSE;

        }else{

            if($i>(count($v_script_name)-1)){

                $seguir = FALSE;

            }else{  

                if($v_dirname[$i]!=$v_script_name[$i]){

                    $seguir = FALSE;

                }

            }

        }



        $i++;

    }

    $count_script=count($v_script_name);

    $relative_path='';    

    for($j=$i;$j<$count_script-1;$j++){

       $relative_path .= '../'; 

    }

    $path_html ='';

    for($i;$i<count($v_dirname);$i++){

        $path_html .= $v_dirname[$i].'/';        

    }







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