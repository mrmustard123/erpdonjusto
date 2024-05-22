<?php   /* echo 'estoy en model.php<br>';
*/
    require_once('persistence.php');
       /* echo 'model: persistence cargado...<br>';*/

    require_once ('class.account.php');
        /* echo 'model: class.account.php cargado... <br>';
*/
    require_once ('class.entry.php');
        /*echo 'model: class.entry.php cargado... <br>';
*/
        require_once ('class.movement.php');
        /*echo 'model: class.movement.php cargado... <br>';
    */
        require_once ('class.product.php');
        /*echo 'model: class.product.php cargado... <br>';
*/
         require_once ('class.product_product.php');
        /*echo 'model: class.product_product.php cargado... <br>';
*/
        require_once ('class.supply.php');
        /*echo 'model: class.supply.php cargado... <br>';
*/
        require_once ('class.product_supply.php');
        /*echo 'model: class.product_supply.php cargado... <br>';
*/
        require_once ('class.mov_supply.php');
        /*echo 'model: class.mov_supply.php cargado... <br>';
   */
        require_once ('class.client.php');
        /*echo 'model: class.client.php cargado... <br>';
*/
       require_once ('class.product_price.php');
    /*echo 'model: class.product_price.php cargado... <br>';
*/
   require_once ('class.supply_price.php');
   /*echo 'model: class.supply_price.php cargado... <br>';
  */
             require_once ('class.consig_prod.php');
  /* echo 'model: class.consig_prod.php cargado... <br>';
   */
         require_once ('class.bitacora.php');
   /* echo 'model: class.bitacora.php cargado... <br>';
   */
         require_once ('class.position.php');
   /* echo 'model: class.position.php cargado... <br>';
  */
           require_once ('class.pos_history.php');
   /* echo 'model: class.pos_history.php cargado... <br>';
  */
         require_once ('class.pend_empresa.php');
  /*  echo 'model: class.pend_empresa.php cargado... <br>';
 */
          require_once ('class.pendiente.php');
  /*  echo 'model: class.pendiente.php cargado... <br>';
 */
               require_once ('class.balance_checksum.php');
  /*  echo 'model: class.balance_checksum.php cargado... <br>';
 */
                  require_once ('class.configuration.php');
  /* echo 'model: class.configuration.php cargado... <br>';
   */
          require_once ('class.posic_descrip_hist.php');
  /* echo 'model: class.posic_descrip_hist.php cargado... <br>';
   */
         require_once ('class.posic_salud_hist.php');
  /* echo 'model: class.posic_salud_hist.php cargado... <br>';
   */
         
include "realpath.php";
?>
    <link type="text/css" href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />	                 
<?php


class model {
    private $persistence;
    private $accounts;
    private $products;
    private $supplies;
    private $clients;

    public function model() {
                /*echo 'Persistence?<br>';*/
               $this->persistence = new PersistenceErpLeo();
                /*echo 'Persistence ok <br>';*/

     }

     public function process_access($params){
            return $this->persistence->process_access($params);

     }

     public function getUserFunctionalities($user_id){
            return $this->persistence->getUserFunctionalities($user_id);

     }

     public function getHintAccount($keyword){
                $v_account = $this->persistence->getHintAccount($keyword);
                if($v_account){
                    foreach($v_account as $account){
                        $new_account = new Account();
                        $new_account->setAccount_id($account[0]);
                        $new_account->setAccount_code($account[1]);
                        $new_account->setName($account[2]);
                        $this->accounts[] = $new_account;

                    }
                    return $this->accounts;

                }
                else{
                    return '';

                }

     }

     public function saveEntry($params){
        $entry = new Entry();
        $entry->setAccount_id($params['hf_id_account']);
        $fecha = new DateTime($params['edt_date']);
        $entry->setEntry_date($fecha);
        $entry->setDetails(utf8_encode($params['ta_description']));
        $entry->setBalance($params['edt_balance']);
        $entry->setCbte_cont_tipo($params['edt_cbte_tipo']);
        $entry->setCbte_cont_nro($params['edt_cbte_nro']);
        $entry->setUser_id($_SESSION['user_id']);
        $this->persistence->saveEntry($entry);
        /*TO DO: Si es cuenta de caja sumar al saldo*/
        /*TO DO: Verificar que es cuenta de caja*/
        $account = $this->persistence->getAccount($params['hf_id_account']);
        $config_value = $this->persistence->getConfigurationByName('Codigo cuenta general');
        $codigo_caja = $config_value;
        $codigo_account = $account->getAccount_code();
        $largo_cadena = strlen($codigo_caja);
        $es_caja = substr_compare($codigo_account,$codigo_caja, 0, $largo_cadena);
        /*Es cuenta de caja?*/

        if($es_caja==0){
                $balance_checksum = new balance_checksum();
                $last_checksum = $this->persistence->getLastBalance_checksum();
                $budget = $this->persistence->getBudget();
                $checksum =  $last_checksum + $params['edt_balance'];
                $balance = $params['edt_balance'];
                $cbte_cont_nro = $params['edt_cbte_nro'];
                $balance_checksum->setChecksum($checksum);
                $balance_checksum->setBudget($budget);
                $balance_checksum->setChecksum_date($fecha);
                $balance_checksum->setCbte_cont_nro($cbte_cont_nro);
                $balance_checksum->setBalance($balance);
                $this->persistence->saveBalance_checksum($balance_checksum);
        }

     }


     public function get_hint($params){
                $accounts = $this->getHintAccount($params['keyword']);
                /*echo $sql;*/
                if($accounts){
                    foreach($accounts as $account){
                        /* put in bold the written text */
                        $name = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', $account->getAccount_code()." ".utf8_encode($account->getName()));
                        /* add new option */
                        echo '<li onclick="set_item(\''.str_replace("'", "\'", $account->getAccount_code()." ".utf8_encode($account->getName())).'\','.$account->getAccount_id().')">'.$name.'</li>';

                    }

            }else{
                  echo '<li onclick="set_item(\'Cuenta inexistente\',0)">Cuenta inexistente</li>';
            }

     }

     public function getTodayEntryCollection(){
                $v_entries = $this->persistence->getTodayEntryCollection();
                return $v_entries;

     }

     public function saveAccount($params){
                $account = new Account();
                $account->setAccount_code($params['edAccount']);
                $account->setName($params['edAccountName']);
                $account->setAccount_type($params['slct_tipo']);
                $account->setDescription($params['edDescription']);
                $this->persistence->saveAccount($account);

     }

     public function getBalanceActivos($fecha_ini, $fecha_fin){
                $v_activos = $this->persistence->getBalanceActivos($fecha_ini, $fecha_fin);
                return $v_activos;

     }

     public function getBalancePasivos($fecha_ini, $fecha_fin){
                $v_pasivos = $this->persistence->getBalancePasivos($fecha_ini, $fecha_fin);
                return $v_pasivos;

     }

     public function getBalanceCapitales($fecha_ini, $fecha_fin){
                $v_capitales = $this->persistence->getBalanceCapitales($fecha_ini, $fecha_fin);
                return $v_capitales;

     }

     public function getResultadosIngresos($fecha_ini, $fecha_fin){
                $v_ingresos = $this->persistence->getResultadosIngresos($fecha_ini, $fecha_fin);
                return $v_ingresos;

     }

     public function getResultadosEgresos($fecha_ini, $fecha_fin){
                $v_egresos = $this->persistence->getResultadosEgresos($fecha_ini, $fecha_fin);
                return $v_egresos;



     }

     public function entryDelete($entryid){
               $this->persistence->entryDelete($entryid);

     }

     public function getLibroDiario($fecha_ini, $fecha_fin){
                $v_entries = $this->persistence->getLibroDiario($fecha_ini,$fecha_fin);
                return $v_entries;

     }

     public function getConsigProdHistory($fecha_ini, $fecha_fin,$consig_id, $product_id){
                $v_entries = $this->persistence->getConsigProdHistory($fecha_ini,$fecha_fin,$consig_id,$product_id);
                return $v_entries;

     }

     public function getLastPosHistories(){
                $v_pos_histories = $this->persistence->getLastPosHistories();
                return $v_pos_histories;

     }

     public function process_save_pos_history($params){
                                        $count = $params['text_count'];
                            /*Actualizamos la posicion*/
                $position = new Position();
                $position->setPosition_id($params['text_position_id'.$count]);
                $position-> setPos_name($params['text_pos_name'.$count]);
                $position->setDescripcion(utf8_encode($params['text_pos_descripcion'.$count]));
                $position->setSalud($params['slct_salud'.$count]);
                $this->persistence->updatePosition($position);
                $hd_change_descript = $params['hd_change_descript'.$count];
                /*Si ha cambiado la descripción, hacemos el registro del cambio*/
                if($hd_change_descript!=$params['text_pos_descripcion'.$count]){
                                    $PosicDescripHist = new PosicDescripHist();
                                    $PosicDescripHist->setDescripcion(utf8_encode($params['text_pos_descripcion'.$count]));
                                    $fecha = new DateTime($params['text_pos_date'.$count]);
                                    $PosicDescripHist->setPosic_descrip_hsit_date($fecha);
                                    $PosicDescripHist->setPosition_id($params['text_position_id'.$count]);
                                    $this->persistence->savePosicDescripHist($PosicDescripHist);

                }
                                    $hd_change_salud = $params['hd_change_salud'.$count];
                                    /*Si ha cambiado la salud, hacemos el registro de la salud*/
                if($hd_change_salud!=$params['slct_salud'.$count]){
                                    $PosicSaludHist = new PosicSaludHist();
                                    $PosicSaludHist->setSalud($params['slct_salud'.$count]);
                                    $fecha = new DateTime($params['text_pos_date'.$count]);
                                    $PosicSaludHist->setPosic_salud_hist_date($fecha);
                                    $PosicSaludHist->setPosition_id($params['text_position_id'.$count]);
                                    $this->persistence->savePosicSaludHist($PosicSaludHist);

                }
                /*Creamos una nueva entrada en el historico de posiciones*/
                $pos_history =  new PosHistory();
                $fecha = new DateTime($params['text_pos_date'.$count]);
                $pos_history->setPos_hist_date($fecha);
                $pos_history->setPos_hist_body($params['text_pos_body'.$count]);
                $pos_history->setPosition_id($params['text_position_id'.$count]);
                $this->persistence->savePosHistory($pos_history);

    }

    public function getPosHistory($pos){
                $v_pos_history = $this->persistence->getPosHistory($pos);
                return $v_pos_history;

    }

    public function getPosDescripHistory($pos){
                $v_pos_history = $this->persistence->getPosDescripHistory($pos);
                return $v_pos_history;
    }

     public function getPosSaludHistory($pos){
                $v_pos_history = $this->persistence->getPosSaludHistory($pos);
                return $v_pos_history;
     }

     public function getAccountsPlan(){
                $v_accounts = $this->persistence->getAccountsPlan();
                return $v_accounts;

     }

     public function getLedger($fecha_ini, $fecha_fin, $code){
                $v_entries = $this->persistence->getLedger($fecha_ini, $fecha_fin, $code);
                return $v_entries;
     }

     public function updateClient($params){
                $client = new Client();
                $client->setClient_id($params["client_id"]);
                $client->setClient_name($params["edName"]);
                $client->setComments($params["edComments"]);
                $client->setCompany($arams["slct_company"]);
                $client->setCoordinates($params["edCoordinates"]);
                $client->setEmail($params["edEmail"]);
                $client->setGender($params["slct_gender"]);
                $client->setHow_knew($params["edHowKnew"]);
                $client->setMobile($params["edMobile"]);
                $client->setPay_method($params["slct_pay_method"]);
                $client->setPhone($params["edPhone"]);
                $client->setPrefered_time($params["edHour"]);
                $client->setAddress($params["edAddress"]);
                $client->setNeighborhood($params['edNeighborhood']);
                $this->persistence->updateClient($client);
     }

     public function saveClient($params){
                $client = new Client();
                $client->setClient_name($params["edName"]);
                $client->setComments($params["edComments"]);
                $client->setCompany($params["slct_company"]);
                $client->setCoordinates($params["edCoordinates"]);
                $client->setEmail($params["edEmail"]);
                $client->setGender($params["slct_gender"]);
                $client->setHow_knew($params["edHowKnew"]);
                $client->setMobile($params["edMobile"]);
                $client->setPay_method($params["slct_pay_method"]);
                $client->setPhone($params["edPhone"]);
                $client->setPrefered_time($params["edHour"]);
                $client->setAddress($params["edAddress"]);
                $client->setNeighborhood($params['edNeighborhood']);
                $this->persistence->saveClient($client);
     }

     public function saveBitacora($params){
                $bitacora = new Bitacora();
                $fecha = new DateTime($params['edt_fecha']);
                $bitacora->setFecha($fecha);
                $bitacora->setCuerpo($params["edt_cuerpo"]);
                $this->persistence->saveBitacora($bitacora);

     }

    public function get_hintclient($params){
                $clients = $this->getHintClient($params['keyword']);
                if($clients){
                    foreach($clients as $client)                {
                        /* put in bold the written text */
                        $name = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', utf8_encode($client->getClient_name()));
                        /* add new option */
                        echo '<li onclick="set_item(\''.str_replace("'", "\'", utf8_encode($client->getClient_name())).'\','.$client->getClient_id().')">'.$name.'</li>';

                    }

                }else{
                  echo '<li onclick="set_item(\'Cliente inexistente\',0)">Cliente inexistente</li>';

                }

    }

    public function getHintClient($keyword){
                $v_clients = $this->persistence->getHintClient($keyword);
                if($v_clients){
                    foreach($v_clients as $client){
                        $new_client = new Client();
                        $new_client->setClient_id($client[0]);
                        /*$new_client->setStock($client[1]);
     */
                        $new_client->setClient_name($client[2]);
                        $this->clients[] = $new_client;

                    }
                    return $this->clients;

                }else{
                    return '';

                }

    }

    public function  get_hintconsigprod($params){
                $v_consig_prod = $this->persistence->getConsigProd($params['keyword']);
                echo $v_consig_prod['balance'].' '.$v_consig_prod['owes'];

     }

     public function getPendEmpresa(){
                $v_entries = $this->persistence->getPendEmpresa();
                return $v_entries;

     }

     public  function process_save_pend_empresa($params){
                $pend_empresa = new PendEmpresa();
                $pend_empresa->setCuerpo($params['txt_pendiente']);
                $fecha = new DateTime($params['edt_fecha_ini']);
                $pend_empresa->setFecha($fecha);
                $pend_empresa->setRealizado('N');
                $pend_empresa->setResponsable($params['txt_asignacion']);
                $this->persistence->save_pend_empresa($pend_empresa);

     }

    public function process_modif_pend_empresa($params){
                $pend_empresa = new PendEmpresa();
                $id_pend_empr = $params['id_pend_empr'];
                $pend_empresa->setPend_empresa_id($id_pend_empr);
                $fecha = new DateTime($params['edt_fecha_ini'.$id_pend_empr]);
                $pend_empresa->setFecha($fecha);
                $pend_empresa->setCuerpo($params['txt_pendiente'.$id_pend_empr]);
                $pend_empresa->setResponsable($params['txt_asignacion'.$id_pend_empr]);
                if(isset($params['chk_realizado'.$id_pend_empr])){
                 $pend_empresa->setRealizado('S');
                }else{
                     $pend_empresa->setRealizado('N');
                }
                     $this->persistence->modif_pend_empresa($pend_empresa);

    }

     public function getPendientes(){
                $v_entries = $this->persistence->getPendientes();
                return $v_entries;
     }

     public  function process_save_pendiente($params){
                $pendiente = new Pendiente();
                $pendiente->setCuerpo($params['txt_pendiente']);
                $fecha = new DateTime($params['edt_fecha_ini']);
                $pendiente->setFecha($fecha);
                $pendiente->setRealizado('N');
                $this->persistence->save_pendiente($pendiente);

     }

     public function process_modif_pendiente($params){
                $pendiente = new Pendiente();
                $id_pendiente = $params['id_pendiente'];
                $pendiente->setPendientes_id($id_pendiente);
                $fecha = new DateTime($params['edt_fecha_ini'.$id_pendiente]);
                $pendiente->setFecha($fecha);
                $pendiente->setCuerpo($params['txt_pendiente'.$id_pendiente]);
                if(isset($params['chk_realizado'.$id_pendiente])){
                     $pendiente->setRealizado('S');

                }else{
                    $pendiente->setRealizado('N');
                }
                $this->persistence->modif_pendiente($pendiente);

    }
    
    public function get_list_pos_hist(){
        $v_pos_histories = $this->persistence->getListPosHistory();
        return $v_pos_histories;
    }
            

    /****************FUNCIONES PARA INVENTÁRIO *************************/

     public function getMovementsCollection(){
                $v_movements = $this->persistence->getMovementsCollection();
                return $v_movements;

     }

     public function getHintProduct($keyword){
                $v_products = $this->persistence->getHintProduct($keyword);
                if($v_products){
                    foreach($v_products as $product){
                        $new_product = new Product();
                        $new_product->setProduct_id($product[0]);
                        $new_product->setStock($product[1]);
                        $new_product->setProduct_name($product[2]);
                        $new_product->setStock_min($product[3]);
                        $this->products[] = $new_product;

                    }
                    return $this->products;

                }else{
                    return '';

                }

    }

    public function get_hintprod($params){
                $products = $this->getHintProduct($params['keyword']);
                /*echo $sql;*/
                if($products){
                    foreach($products as $product)                {
                        /* put in bold the written text */
                        $name = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', utf8_encode($product->getProduct_name()));
                        $stock = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', utf8_encode($product->getStock()));
                        $stock_min = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', utf8_encode($product->getStock_min()));
                        /* add new option */
                        echo '<li onclick="set_item(\''.str_replace("'", "\'", utf8_encode($product->getProduct_name())).'\','.$product->getProduct_id().')">'.$name;
                        if ($stock<$stock_min){
                            echo '&nbsp;<span class="alert">'.$stock.'</span></li>';
                        }else{
                            echo '</li>';
                        }                        

                    }

                }else{
                  echo '<li onclick="set_item(\'Producto inexistente\',0)">Producto inexistente</li>';
                }
    }
    
    public function mail_stock_min($producto){

        
        
        $para  = 'elianatellezsaucedo@gmail.com' . ', '; // atención a la coma
        $para .= 'leonardo616@gmail.com';

        // título
        $título = 'Alerta de Stock M&iacute;nimo';

        // mensaje
        $mensaje = '
        <html>
        <head>
          <title>Alerta de Stock m&iacute;nimo</title>
        </head>
        <body>
          <p>¡Hola chicos!</p>
          
          Les cuento que se nos est&aacute; acabando: <br/>'.
          $producto.'<br/>
          Les aconcejo que repongan el stock ¡lo m&aacute;s pronto posible! <br/>
          ¡Besos!<br/>
          <br/>
          Atte.<br/>
          Brunilda (La robot)<br/>                                             
        </body>
        </html>
        ';

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        $cabeceras .= 'To: Eli <elianatellezsaucedo@gmail.com>, Leo <leonardo616@gmail.com>' . "\r\n";
        $cabeceras .= 'From: Brunilda <brunilda@apicoladonjusto.com>' . "\r\n";

        // Enviarlo
        mail($para, $título, $mensaje, $cabeceras);        


        /*echo 'Se envia email:  Falta producto '.$producto.'<br/>';*/
        
        
    }

     public function saveMovement($params){
                /*1.- Salvar el movimiento */
                $movement = new Movement();
                $fecha = new DateTime($params['edt_mov_date']);
                $movement->setMov_date($fecha);
                $movement->setMov_type($params['slct_mov_type']);
                $movement->setMov_cant($params['edt_cant']);
                $movement->setProduct_id($params['hf_product_id']);
                $movement->setMov_lot($params['edt_lot']);
                $movement->setComments(utf8_encode($params['ta_comments']));
                $movement->setUser_id($_SESSION['user_id']);
                $movement->setReason($params['slct_mov_reason']);
                $this->persistence->saveMovement($movement);
                /* 2.- Disminuir po de movimiento el stock de ingredientes de la receta del producto */
                $product = $this->persistence->getProduct($movement->getProduct_id());
                $mov_type = $movement->getMov_type();
                if($mov_type == 'ENTRADA'){
                    /*2a. Aumentar el stock del producto */
                    $product->setStock($product->getStock()+$movement->getMov_cant());
                    $reason = $movement->getReason();                    
                    if($reason=="PRODUCCION"){
                        /*CREAR EL ASIENTO EN EL LIBRO DIÁRIO */
                         /*3. Obtener todos los ingredientes del producto */
                        $v_product_products = $this->persistence->getProductProducts($product->getProduct_id());
                        /*5. Disminuir del stock de cada producto(ingrediente) la cantidad especificada en la lista de product_products */
                        if($v_product_products){
                        
                                 $costo_total = 0;
                                foreach($v_product_products as $product_product){
                                        $ingredient = $this->persistence->getIngredient($product_product['ingredient_id']);
                                       /* $ingredient->setStock($ingredient->getStock() - ($product_product['cant']*$movement->getMov_cant()) );
                                        $this->persistence->updateIngredient($ingredient);
                                         voy a desactivar ests 2 lineas por que se hace en SALIDA */

                                        $fecha_movment = $params['edt_mov_date'];
                                        $params2['edt_mov_date'] = $fecha_movment;
                                        $params2['slct_mov_type'] = 'SALIDA';
                                        $params2['edt_cant'] = $product_product['cant']*$movement->getMov_cant();
                                        $params2['hf_product_id'] = $product_product['ingredient_id'];
                                        $params2['edt_lot']=$params['edt_lot'];
                                        $params2['ta_comments']=$params['ta_comments'];
                                        $params2['slct_mov_reason']=$params['slct_mov_reason'];
                                        $this->saveMovement($params2);
                                        
                                        /*
                                        $stock = $ingredient->getStock();
                                        $stock_min = $ingredient->getStock_min();
                                        
                                        if($stock<$stock_min){
                                            $this->mail_stock_min($ingredient->getProduct_name());
                                        }*/
                                        
                                        
                                        $price = $ingredient->getProduction_cost();
                                        /*Asientos*/
                                        $costo=0;
                                        $entry = new Entry();
                                        $entry->setAccount_id($ingredient->getAccount_id());
                                        date_default_timezone_set('America/La_Paz');
                                        /*$fecha_actual = date('Y-m-d H:i:s');
                                         $fecha = new DateTime($fecha_actual);*/
                                        $entry->setEntry_date($fecha);
                                        $entry->setDetails(utf8_encode($params['ta_comments']));
                                        $mov_cant=$movement->getMov_cant();
                                        $product_product_cant = $product_product['cant'];
                                        $costo = $mov_cant*$product_product_cant*$price*-1;
                                        $entry->setBalance($costo);
                                        $costo_total += $costo;
                                        $entry->setUser_id($_SESSION['user_id']);
                                        if($costo!=0)
                                        {
                                            $this->persistence->saveEntry($entry);
                                        }
                                        

                                }
                                /*end foreach  */
                                /*Colocar el precio del producto */
                                /*5. Obtener los insumos o materiales indirectos */
                                $v_product_supply = $this->persistence->getProductSupply_by_product_id($product->getProduct_id());
                                /*6. Disminuir el stock de insumos del producto terminado */
                                if($v_product_supply){
                                     foreach($v_product_supply as $product_supply){
                                        $supply = $this->persistence->getSupply($product_supply['supply_id']);
                                        /*$fecha_actual = date('Y-m-d H:i:s');
                                        $fecha = new DateTime($fecha_actual);*/
                                        $fecha_mov_supply = $params['edt_mov_date'];
                                        $params1['edt_mov_date'] = $fecha_mov_supply;
                                        $params1['slct_mov_type'] = 'SALIDA';
                                        $params1['edt_cant'] = $params['edt_cant'];
                                        $params1['hf_supply_id']=$product_supply['supply_id'];
                                        $params1['edt_lot']=$params['edt_lot'];
                                        $params1['ta_comments']=$params['ta_comments'];
                                                                                                                                                                                   
                                        $this->saveMovSupply($params1);
                                        

                                         
                                                                                                                                                                                                                          
                                        $price = $supply->getPrice();
                                        /*Asientos */
                                        $costo=0;
                                        $entry = new Entry();
                                        $entry->setAccount_id($supply->getAccount_id());
                                        date_default_timezone_set('America/La_Paz');
                                       /* $fecha_actual = date('Y-m-d H:i:s');
                                          $fecha = new DateTime($fecha_actual);*/
                                        $entry->setEntry_date($fecha);
                                        $entry->setDetails(utf8_encode($params['ta_comments']));
                                        $mov_cant=$movement->getMov_cant();
                                        $product_supply_cant = $product_supply['cant'];
                                        $costo = $mov_cant*$product_supply_cant*$price*-1;
                                        $entry->setBalance($costo);
                                        $costo_total += $costo;
                                        $entry->setUser_id($_SESSION['user_id']);
                                        if($costo!=0)
                                        {
                                             $this->persistence->saveEntry($entry);
                                        }
                                       

                                    }

                                }
                                /***************************COSTOS DE PRODUCCION********************************/
                                $v_prod_cost_prod = $this->persistence->getProdCostProdbyProductId($product->getProduct_id());
                                $costo=0;
                                if($v_prod_cost_prod){
                                    foreach($v_prod_cost_prod as $prod_cost_prod){
                                       /*1.- AQUI PASAMOS LO QUE ES PARA PAGO DE MANO DE OBRA */
                                        if($prod_cost_prod['saving_type']=='MANO DE OBRA' && $prod_cost_prod['cost_type']!='ESPECIAL'   ){
                     /*cost_type!=ESPECIAL significa que no se ponen los costos de mano de obra 
                      * para productos especiales como los c/cajitapor que los costos de producción ya 
                      * estan en el producto basico del cual deriva */
                                            $mov_cant=$movement->getMov_cant();
                                            $costo=$mov_cant * $prod_cost_prod['cost_value']*-1;
                                            $account_id=$prod_cost_prod['account_id'];
                                            /*ASIENTO DEL COSTO DE MANO DE OBRA */
                                            $entry = new Entry();
                                            $entry->setAccount_id($account_id);
                                            date_default_timezone_set('America/La_Paz');
                                           /* $fecha_actual = date('Y-m-d H:i:s');
                                             $fecha = new DateTime($fecha_actual);*/
                                            $entry->setEntry_date($fecha);
                                            $entry->setDetails(utf8_encode($params['ta_comments']));
                                                 $entry->setBalance($costo);
                                            $costo_total += $costo;
                                            $entry->setUser_id($_SESSION['user_id']);
                                            if($costo!=0)
                                            {
                                                $this->persistence->saveEntry($entry);
                                            }
                                            

                                        }
                                        /*end if */
                                        /*2.- AQUI PASAMOS LO QUE ES PARA COSTOS DE PRODUCCION */
                                        if($prod_cost_prod['saving_type']=='PRODUCCION' && $prod_cost_prod['cost_type']!='ESPECIAL'){
                /*cost_type!=ESPECIAL significa que no se ponen los costos de producción 
                 * para productos especiales como los c/cajitapor que los costos de producción ya 
                 * estan en el producto basico del cual deriva */
                                            $costo=$mov_cant * $prod_cost_prod['cost_value']*-1;
                                            $account_id=$prod_cost_prod['account_id'];
                                            $entry = new Entry();
                                            $entry->setAccount_id($account_id);
                                            date_default_timezone_set('America/La_Paz');
                                           /* $fecha_actual = date('Y-m-d H:i:s');
                                              $fecha = new DateTime($fecha_actual);*/
                                            $entry->setEntry_date($fecha);
                                            $entry->setDetails(utf8_encode($params['ta_comments']));
                                            $entry->setBalance($costo);
                                            $costo_total += $costo;
                                            $entry->setUser_id($_SESSION['user_id']);
                                            if($costo!=0)
                                            {
                                                $this->persistence->saveEntry($entry);
                                            }
                                            

                                        }
                                        /*end if */

                                    }
                                    /*end foreach */
                                }
                                /*end if */
             /***************************FIN COSTOS DE PRODUCCION********************************/                                                                                                                                                                             $entry = new Entry();
                                $entry->setAccount_id($product->getAccount_id());
                                date_default_timezone_set('America/La_Paz');
                                /*$fecha_actual = date('Y-m-d H:i:s');
                                  $fecha = new DateTime($fecha_actual);*/
                                $entry->setEntry_date($fecha);
                                $entry->setDetails(utf8_encode($params['ta_comments']));
                                $entry->setBalance($costo_total*-1);
                                $entry->setUser_id($_SESSION['user_id']);
                                $this->persistence->saveEntry($entry);

                            

                        }/*end if */
                        

                    }/*end if  */
                    
                    
                    if($reason=="COSECHA"){
                               /*TO DO:  
                                 * 1.- Poner en el DEBE la materia prima (producto)
                                 * 2.- Buscar el costo de la materia prima (PROD-COST-PROD)
                                 * 3.- Poner en el HABER el costo de la materia prima
                                */
                                
                                /*Asientos*/
                                /*1.- Poner en el DEBE la materia prima (producto)*/
                                $costo=0;
                                $entry = new Entry();
                                $entry->setAccount_id($product->getAccount_id());
                                date_default_timezone_set('America/La_Paz');
                                $fecha_actual = date('Y-m-d H:i:s');
                                $fecha = new DateTime($fecha_actual);
                                $entry->setEntry_date($fecha);
                                $entry->setDetails(utf8_encode($params['ta_comments']));
                                $mov_cant=$movement->getMov_cant();
                                $costo = $mov_cant*$product->getProduction_cost();
                                $entry->setBalance($costo);
                                $entry->setUser_id($_SESSION['user_id']);
                                if($costo!=0)
                                {
                                    $this->persistence->saveEntry($entry);
                                }
                                
                                /* 2.- Buscar el costo de la materia prima (PROD-COST-PROD) */
                                $v_prod_cost_prod = $this->persistence->getProdCostProdbyProductId($product->getProduct_id());                               
                                $prod_cost_prod = $v_prod_cost_prod[0];
                                
                                
                                /*3.- Poner en el HABER el costo de la materia prima*/
                                $costo=0;
                                $entry = new Entry();
                                $entry->setAccount_id($prod_cost_prod['account_id']);
                                date_default_timezone_set('America/La_Paz');
                                $fecha_actual = date('Y-m-d H:i:s');
                                $fecha = new DateTime($fecha_actual);
                                $entry->setEntry_date($fecha);
                                $entry->setDetails(utf8_encode($params['ta_comments']));
                                $mov_cant=$movement->getMov_cant();
                                $costo = $mov_cant*$product->getProduction_cost()*(-1);
                                $entry->setBalance($costo);
                                $entry->setUser_id($_SESSION['user_id']);
                                if($costo!=0)
                                {
                                    $this->persistence->saveEntry($entry);                         
                                }
                        
                    }
                    
                }
                elseif ($mov_type == 'SALIDA'){
                                    /*2b. Disminuir el stock del producto */
                    $product->setStock($product->getStock() - $movement->getMov_cant());
                                                         $reason = $movement->getReason();
                                                         
                                        
                    $stock = $product->getStock();
                    $stock_min = $product->getStock_min();

                    if($stock<$stock_min){
                        $this->mail_stock_min($product->getProduct_name());
                    }
                    
                    
                    switch ($reason){
                        case 'PRODUCCION':                                                
                            break;
                        case 'VENTA':                                               
                            break;
                        case 'CONSIGNACION':                        
                            break;
                        case 'DEVOLUCION':                        
                            break;
                        case 'ALMACENAJE':                                                         
                            break;

                    }

                }
                    $this->persistence->updateProduct($product);
                    /*3.- Disminuir o aumentar segun el tipo de movimiento el stock de insumos del producto */

    }

    public function getStockProducts(){
                $v_products = $this->persistence->getStockProducts();
                return $v_products;

    }

    public function getStockActiveProducts(){
                $v_products = $this->persistence->getStockActiveProducts();
                return $v_products;
    }

    public function getStockSupplies(){
                $v_supplies = $this->persistence->getStockSupplies();
                return $v_supplies;

    }

    public function getHintSupply($keyword){
                $v_supplies = $this->persistence->getHintSupply($keyword);
                if($v_supplies){
                    foreach($v_supplies as $supply){
                        $new_supply = new Supply();
                        $new_supply->setSupply_id($supply[0]);
                        $new_supply->setStock($supply[1]);
                        $new_supply->setSupply_name($supply[2]);
                        $this->supplies[] = $new_supply;
                }
                    return $this->supplies;
                }else{
                    return '';
                }

    }

     public function get_hint_supplies($params){
                $supplies = $this->getHintSupply($params['keyword']);
                /*echo $sql;*/
                if($supplies){
                    foreach($supplies as $supply)                {
                        /* put in bold the written text */
                        $name = str_ireplace($params['keyword'], '<b>'.$params['keyword'].'</b>', utf8_encode($supply->getSupply_name()));
                        /* add new option */
                        echo '<li onclick="set_item(\''.str_replace("'", "\'", utf8_encode($supply->getSupply_name())).'\','.$supply->getSupply_id().')">'.$name.'</li>';
                    }
                }
                else{
                  echo '<li onclick="set_item(\'Insumo inexistente\',0)">Insumo inexistente</li>';
                }

    }

    public function getSupplyMovementsCollection(){
                $v_movements = $this->persistence->getSupplyMovementsCollection();
                return $v_movements;

    }

     public function saveMovSupply($params){
                            /*1.- Salvar el movimiento */
                            $mov_supply = new SupplyMovement();
                            $fecha = new DateTime($params['edt_mov_date']);
                            $mov_supply->setMov_supply_date($fecha);
                            $mov_supply->setMov_supply_type($params['slct_mov_type']);
                            $mov_supply->setMov_supply_cant($params['edt_cant']);
                            $mov_supply->setSupply_id($params['hf_supply_id']);
                            $mov_supply->setMov_supply_lot($params['edt_lot']);
                            $mov_supply->setComments(utf8_encode($params['ta_comments']));
                            $mov_supply->setUser_id($_SESSION['user_id']);
                            $this->persistence->saveMovSupply($mov_supply);
                            /*2.- Disminuir po de movimiento el stock de ingredientes de la receta del producto */
                            $supply = $this->persistence->getSupply($mov_supply->getSupply_id());
                            if($mov_supply->getMov_supply_type() == 'ENTRADA'){
                                /*2a. Aumentar el stock del producto */
                                $supply->setStock($supply->getStock()+$mov_supply->getMov_supply_cant());

                            }elseif ($mov_supply->getMov_supply_type() == 'SALIDA'){
                                /*2b. Dusminuir el stock del producto */
                                $supply->setStock($supply->getStock() - $mov_supply->getMov_supply_cant());  
                                
                    /******CHEQUEAMOS SI SE HA LLEGADO A LA CANTIDAD MINIMA****/
                                $stock = $supply->getStock();
                                $stock_min = $supply->getStock_min();

                                if($stock<$stock_min){
                                    $this->mail_stock_min($supply->getSupply_name());
                                }
                    /**********************************************************/
                                                             
                                
                                
                            }
                            $this->persistence->updateSupply($supply);
                            /*3.- Disminuir o aumentar segun el tipo de movimiento el stock de insumos del producto            */

    }

    public function getMovementsByDateCollection($fecha_ini, $fecha_fin){
                $v_movements = $this->persistence->getMovementsByDateCollection($fecha_ini, $fecha_fin);
                return $v_movements;

    }

    public function getSupplyMovementsByDateCollection($fecha_ini, $fecha_fin){
                $v_movements = $this->persistence->getSupplyMovementsByDateCollection($fecha_ini, $fecha_fin);
                return $v_movements;

    }

    public function getClient($client_id){
                $cliente = $this->persistence->getClient($client_id);
                return $cliente;
    }
            /***********************************FIN FUNCIONES INVENTÁRIO**************************************/
                                                   
}
/*end model*/
                /*echo 'End model_erpleo<br>';
*/
    ?>