<?php    
/*echo 'Soy request_functions.php<br>';*/    

/*
 * REQUEST-AJAX 
 * Retorna un array de parametros de una solicitud, 
 * ya sea por metodo GET o POST
 * 
 * ACTUALIZADO PARA PHP 8.2+
 * - Removido utf8_decode() (obsoleto)
 * - Los datos ya vienen en UTF-8 desde el navegador
 * - Solo se aplica addslashes() para seguridad básica
 */        
function import_request_data()
{    
    $params = array();        
    // Procesar datos GET
    foreach ($_GET as $qs_key => $qv_value) 
    {        
        if(is_array($qv_value))
        {            
            foreach ($qv_value as $key => $value)
            {    
                /*$qv_value[$key]= mysql_real_escape_string( utf8_decode($value) );*/                
                //$qv_value[$key]= addslashes( utf8_decode($value) ); 
                /*Why we will replace this line? in order to update to PHP 8.2.2
                */                
                // ACTUALIZADO: Removido utf8_decode() - los datos ya están en UTF-8
                $qv_value[$key] = addslashes($value);
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
            // ACTUALIZADO: Removido utf8_decode() - los datos ya están en UTF-8
            $params["$qs_key"] = addslashes($qv_value);
            /* $params["$qs_key"] = addslashes( $qv_value); */               
            
        }    
        
    }        
    
    // Procesar datos POST
    foreach ($_POST as $qs_key => $qv_value) 
    {        
        if(is_array($qv_value))
        {            
            foreach ($qv_value as $key => $value)
            {  
                /*$qv_value[$key]= mysql_real_escape_string( utf8_decode($value) ); */           
                // ACTUALIZADO: Removido utf8_decode() - los datos ya están en UTF-8
                $qv_value[$key] = addslashes($value);
                /*$qv_value[$key]= addslashes( $value);*/                
                /*echo $qv_value[$key].'<br>';*/                   
                
            }            
            $params["$qs_key"] = $qv_value;        
            
        }  
        else 
        {  
            /*$params["$qs_key"] = mysql_real_escape_string( utf8_decode($qv_value) );*/            
            // ACTUALIZADO: Removido utf8_decode() - los datos ya están en UTF-8
            $params["$qs_key"] = addslashes($qv_value);
            /*$params["$qs_key"] = addslashes($ $qv_value );*/             
            
        }       
        
    }        
    return $params;
    
}    

?>