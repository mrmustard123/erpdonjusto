<?php

/**
 * File: view_last_pos_histories
 * Author: Leonardo G. Tellez Saucedo <leonardo616@gmail.com>
 * Date: 28 may. de 2024 00:45:40
 * User: user
 */

?>

<html>
<head>

    <title>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">

        
</head>

<body>

<?php
error_reporting(1);


require_once 'model/model.php';
require_once 'model/class.pos_history.php';
require_once 'model/class.position.php';

    $model = new model();


    $v_pos_histories = $model->getLastPosHistories();
    
       
    echo '<a href="index.php?action=home">Inicio</a>';  
    
    echo '<H1>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </H1>';
    
   
        
        foreach($v_pos_histories as $pos_history){

            $PosHistory = new PosHistory();

            $PosHistory->setPos_hist_id($pos_history['pos_hist_id']);
            $PosHistory->setPos_hist_date($pos_history['pos_hist_date']);
            $PosHistory->setPos_hist_body($pos_history['pos_hist_body']);
            $PosHistory->setPosition_id($pos_history['position_id']);

            $new_position = $PosHistory->getPosition_id();

            echo $PosHistory->getPos_hist_date().'</BR>';

            echo $PosHistory->getPos_hist_body().'</BR></BR>';


        }           
    
    

    
?>
</body>
</html>
