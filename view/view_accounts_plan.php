<?php


/**
 * Project:  ErpDonJusto 
 * File: view_accounts_plan.php
 * Created on: Mar 15, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */



?>
<html>
    <head>
        <title>PLAN DE CUENTAS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
    </head>
    <body>
        <a href="index.php?action=home">Inicio</a>
        <div>
            <h1>PLAN DE CUENTAS</h1>
            <table border="1" width="100%">
                <tr>
                    <td>Nro</td>
                    <td>C&Oacute;DIGO</td>
                    <td>CUENTA</td>
                    <td>DESCRIPCI&Oacute;N</td>
                </tr>
                
                <?php
                
                    
                    if(isset($_SESSION['account_code'])){                        
                        unset($_SESSION['account_code']);                                                
                    }
                            
                        
                    
                    require_once 'model/model.php';
                    
                    $model = new model();
                    
                    $v_accounts = $model->getAccountsPlan();
                
                
                    if($v_accounts){
                        
                        foreach($v_accounts as $account){
                ?>
                
               <tr>
                    <td><?php echo $account['account_id'];  ?></td>
                    <td><?php echo $account['account_code'];  ?></td>
                    <td><a  href="index.php?action=ledger&code=<?php echo $account['account_code'];  ?>&name=<?php echo utf8_encode($account['name']); ?>"> <?php echo utf8_encode($account['name']); ?></a></td>
                    <td><?php echo utf8_encode($account['description']); ?></td>
                </tr>  
                
                
                <?php
                        }
                    }
                
                ?>
                
                
            </table>
        
        
        
        </div>
    </body>
</html>
