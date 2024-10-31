<html>
<head>

    <title>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">

        
</head>

<body>

<?php
error_reporting(0);
/*
  Created on : 26 jun. de 2023, 11:21:25
  Author: Leonardo G. Tellez Saucedo
 */

require_once 'model/model.php';
require_once 'model/class.pos_history.php';
require_once 'model/class.position.php';

    $model = new model();


    $v_positions = $model->getPositionCollection_alive();
    
       
    echo '<a href="index.php?action=home">Inicio</a>';  
    
    echo '<H1>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </H1>';
    
    foreach($v_positions as $position){
        
        
        $ActualPosition = new Position();
               
        $ActualPosition->setPosition_id($position['position_id']);
        $ActualPosition->setPos_name($position['pos_name']);
        $ActualPosition->setDescripcion($position['descripcion']);
        $ActualPosition->setCoordenadas($position['coordenadas']);
        $ActualPosition->setSalud($position['salud']);        
        $ActualPosition->setId_apiario($position['id_apiario']);
        
        $pos = $ActualPosition->getPosition_id();
        $v_pos_histories = $model->getPosHistory($pos);        
        
        
        echo '<h2>Posici&oacute;n # '.$ActualPosition->getPosition_id().'</h2>';
        echo '<p><strong>Configuraci&oacute;n actual: </strong>'.$ActualPosition->getDescripcion().'<br/>';
        echo '<strong>Salud actual: </strong>'.$ActualPosition->getSalud().'</p>';
        
        foreach($v_pos_histories as $pos_history){

            $PosHistory = new PosHistory();

            $PosHistory->setPos_hist_id($pos_history['pos_hist_id']);
            $PosHistory->setPos_hist_date($pos_history['pos_hist_date']);
            $PosHistory->setPos_hist_body($pos_history['pos_hist_body']);
            $PosHistory->setPosition_id($pos_history['position_id']);

            $new_position = $PosHistory->getPosition_id();

            echo $PosHistory->getPos_hist_date().': ';

            echo $PosHistory->getPos_hist_body().'</BR>';


        }           
    }
    

    
?>
</body>
</html>