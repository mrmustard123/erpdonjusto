<?php    
/*echo "Estoy en views.php <br>";*/    
class views
{        
    public function views()
    {
        
    }        
    
    public function display_view_login($params)
    {                        
        require_once('view_login.php');                    
        
    }        
    
    public function display_view_home($params)
    {            
        require_once ('view_home.php');        
        
    }                
    
    public function display_error_message($params)
    {                        
        require_once('view_error_message.php');                    
        
    }        
    
    public function display_view_entry( &$params ) 
    {            
        require_once ('view_entry.php');        
        
    }         
    
    public function display_view_error_account($params)
    {            
        require_once('view_error_account.php');        
        
    }                        
    
    public function display_view_new_account($params)
    {            
        require_once('view_new_account.php');        
        
    }                            
    
    public function display_view_results($params)
    {                        
        require_once ('view_results.php');        
        
    }                                
    
    public function display_view_ingredients($params)
    {                        
        require_once('view_ingredient.php');                    
        
    }                
    
    public function display_view_movement($params)
    {                        
        require_once('view_movement.php');                    
        
    }                                   
    
    public function display_view_stock($params)
    {                        
        require_once('view_stock.php');                    
        
    }                         
    
    public function display_view_diary($params)
    {                        
        require_once('view_diary.php');                    
        
    }                 
    
    public function display_view_mov_supply($params)
    {                        
        require_once('view_mov_supply.php');                    
        
    }                        
    
    public function display_view_accounts_plan($params)
    {                        
        require_once ('view_accounts_plan.php');                    
        
    }                        
    
    public function display_view_movement_list($params)
    {            
        require_once ('view_movement_list.php');        
        
    }                
    
    public function display_view_mov_supply_list($params)
    {            
        require_once('view_mov_supply_list.php');        
        
    }                        
    
    public function display_view_ledger($params)
    {                        
        require_once ('view_ledger.php');                    
        
    }                
    
    public function display_view_client($params)
    {            
        require_once('view_client.php');                
    }                
    
    public function display_view_client_list($params)
    {            
        require_once('view_client_list.php');        
        
    }                                                   
    
    public function display_view_consig_prod($params)
    {            
        require_once('view_consign_prod.php');        
        
    }                    
    
    public function display_view_consig_prod_history($params)
    {                        
        require_once('view_consig_prod_history.php');                    
        
    }                
    
    public function display_view_bitacora($params)
    {                        
        require_once('view_bitacora.php');                    
        
    }                                
    
    public function display_view_position_list($params)
    {                        
        require_once('view_position_list.php');                    
        
    }                    
    
    public function display_view_pos_history_list($params)
    {                        
        require_once ('view_hist_posiciones.php');        
        
    }                        
    
    public function display_view_hist_pos_descrip($params)
    {                        
        require_once ('view_hist_pos_descrip.php');        
        
    }                
    
    public function display_view_hist_pos_salud($params)
    {                        
        require_once ('view_hist_pos_salud.php');        
        
    }                                        
    
    public function display_view_pend_empresa($params)
    {                        
        require_once ('view_pend_empresa01.php');                    
        
    }                
    
    public function display_view_pendiente($params)
    {                        
        require_once ('view_pendientes01.php');                    
        
    }
    
    public function display_view_report_pos_hist($params)
    {                        
        require_once ('view_reporte_hist_posiciones.php');                    
        
    }      
    
 }     
    
?>