<?php    
    ini_set('session.gc_maxlifetime', 36000);    
    session_start();    /*echo 'break0<br>';*/
    require_once ('request_functions.php');   /* echo 'break1<br>';   */
    require_once('./controller/controller.php');    
   /* echo 'break2<br>';    echo 'Action: '.$_GET['action'].'<br>';*/
    $params = import_request_data();   //recupera $params()      
    /*echo 'request data:<br>';    var_dump($params);    echo '<br>';*/
    if(!isset($params['action']))
    {        
       $params['action']='login'; 
    }
    else
    {        
        if($params['action']!='access')
        {        
            if(!isset($_SESSION['user_id']))
            {
                $params['action']='login';                 
            }
        }                 
    }

    
    /*echo 'Action: '.$params['action'].'<br>';*/
    $controller = new controller();        
    /*$controller->proccess_test();*/
    /*var_dump($controller);*/
    /*echo 'brake06<br>';*/
    $controller->action_performed($params);       
    /* echo 'brake07<br>'; */
        
?>