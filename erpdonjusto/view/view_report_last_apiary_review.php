<html>    
<head>

    <title>REPORTE DE LA &Uacute;LTIMA REVISI&Oacute;N DEL API&Aacute;RIO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="HandheldFriendly" content="true">
        <meta charset="UTF-8">

        
</head>

<body>

<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(1);
/*
  Created on : 29 may. de 2023, 17:38:25
  Author: Leonardo G. Tellez Saucedo
 */

    require_once 'model/model.php';
    require_once 'model/class.pos_history.php';
    require_once 'model/class.position.php';

    $model = new model();
   
       
    echo '<a href="index.php?action=home">Inicio</a>';  
    
    echo '<H1>REPORTE DE LA &Uacute;LTIMA REVISI&Oacute;N DEL API&Aacute;RIO</H1>';
 
    if(!isset($_GET['flow'])){
      $_SESSION['apiary_review']= 0;  
    }
    
    
    if($_GET['flow']=='previous'){
     $_SESSION['apiary_review'] = $_SESSION['apiary_review']+1;   
    }
    
    if($_GET['flow']=='following'){
        
        $_SESSION['apiary_review'] = $_SESSION['apiary_review']-1;     
    }
    
    
    
    $flow = $_SESSION['apiary_review'];
    
    $v_pos_histories = $model->getPositionCollection_last_review($flow);        


    foreach($v_pos_histories as $pos_history){


        echo '<h2>Posici&oacute;n # '.$pos_history['position_id'].'</h2>';

        echo $pos_history['pos_hist_date'].': ';

        echo  ($pos_history['pos_hist_body']).'</BR>';

    }          
    
    
    
    echo '<a href="index.php?action=report_last_apiary_review&flow=previous"> < </a>';
    echo '<a href="index.php?action=report_last_apiary_review&flow=following"> > </a>';

    

    
?>
</body>
</html>