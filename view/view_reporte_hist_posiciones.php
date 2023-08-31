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
    
    $old_position = 0;
    
    echo '<a href="index.php?action=home">Inicio</a>';  
    
    echo '<H1>HISTORICO DE POSICIONES</H1>';
    
    foreach($v_pos_histories as $pos_history){
        
        $PosHistory = new PosHistory();
        
        $PosHistory->setPos_hist_id($pos_history['pos_hist_id']);
        $PosHistory->setPos_hist_date($pos_history['pos_hist_date']);
        $PosHistory->setPos_hist_body($pos_history['pos_hist_body']);
        $PosHistory->setPosition_id($pos_history['position_id']);
        
        $new_position = $PosHistory->getPosition_id();
        
        if($old_position<>$new_position){
            echo '<h2>Posicion # '.$PosHistory->getPosition_id().'</h2>';
        }
        
        echo $PosHistory->getPos_hist_date().'</BR>';
        
        echo $PosHistory->getPos_hist_body().'</BR></BR>';
        
        
        $old_position = $PosHistory->getPosition_id();
 
        
    }
    
    
    
    






