<?php    
/*echo 'Soy request_functions.php<br>';*/    

 /* 
* REQUEST-AJAX 
* Retorna un array de parametros de una solicitud, 
* ya sea la solicid por un metodo GET O POST *  
* nota: solo debe ser usado para solicitudes Ajax(utf-8) */        
function import_request_data()
{    
    $params = array();    
    foreach ($_GET as $qs_key => $qv_value) 
    {        
        if(is_array($qv_value))
        {            
            foreach ($qv_value as $key => $value)
            {                
                /*$qv_value[$key]= mysql_real_escape_string( utf8_decode($value) );*/                
                $qv_value[$key]= addslashes( utf8_decode($value) );                
                /*$qv_value[$key]= addslashes( $value); */                
                /*echo $qv_value[$key].'<br>';*/            
                
            }            
            $params["$qs_key"] = $qv_value;        
            
        }  
        else 
        {                       
            /*echo 'utf8_decode: '.utf8_decode($qv_value).'<br>';*/            
            /*echo 'mysql real escape : '. addslashes ( $qv_value).'<br>';*/            
            /*$params["$qs_key"] = mysql_real_escape_string( utf8_decode($qv_value) );*/            
            $params["$qs_key"] = addslashes( utf8_decode($qv_value) );            
            /* $params["$qs_key"] = addslashes( $qv_value); */        
            
        }    
        
    }        
    
    foreach ($_POST as $qs_key => $qv_value) 
    {        
        if(is_array($qv_value))
        {            
            foreach ($qv_value as $key => $value)
            {                
                /*$qv_value[$key]= mysql_real_escape_string( utf8_decode($value) ); */                
                $qv_value[$key]= addslashes( utf8_decode($value) );                
                /*$qv_value[$key]= addslashes( $value);*/                
                /*echo $qv_value[$key].'<br>';*/            
                
            }            
            $params["$qs_key"] = $qv_value;        
            
        }  
        else 
        {            
            /*$params["$qs_key"] = mysql_real_escape_string( utf8_decode($qv_value) );*/            
            $params["$qs_key"] = addslashes(utf8_decode($qv_value ));            
            /*$params["$qs_key"] = addslashes($ $qv_value );*/                    
            
        }       
        
    }        
    return $params;
    
}    

?>