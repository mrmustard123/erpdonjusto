<html>
<head>

    <title>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">

        
</head>

<body>

<?php
error_reporting(1);
/*
  Created on : 26 jun. de 2023, 11:21:25
  Author: Leonardo G. Tellez Saucedo
 */

require_once 'model/model.php';
require_once 'model/class.pos_history.php';

    $model = new model();

    $v_pos_histories = $model->get_list_pos_hist();
    $v_positions = $model->getPostionCollection();
    
    $old_position = 0;
    
    echo '<a href="index.php?action=home">Inicio</a>';  
    
    echo '<H1>REPORTE HISTORICO DE POSICIONES DEL API&Aacute;RIO </H1>';
    
    foreach($v_pos_histories as $pos_history){
        
        $PosHistory = new PosHistory();
        
        $PosHistory->setPos_hist_id($pos_history['pos_hist_id']);
        $PosHistory->setPos_hist_date($pos_history['pos_hist_date']);
        $PosHistory->setPos_hist_body($pos_history['pos_hist_body']);
        $PosHistory->setPosition_id($pos_history['position_id']);
        
        $new_position = $PosHistory->getPosition_id();
        
        if($old_position<>$new_position){
            echo '<h2>Posicion # '.$PosHistory->getPosition_id().'</h2><br/>';
            echo 'Configuraci&iacute;n actual: '.$PosHistory->ge
        }
        
        echo $PosHistory->getPos_hist_date().'</BR>';
        
        echo $PosHistory->getPos_hist_body().'</BR></BR>';
        
        
        $old_position = $PosHistory->getPosition_id();
 
        
    }
    
?>
</body>
</html>