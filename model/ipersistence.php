<?php    /*echo 'Estoy en iPersistence<br>';
*/        
interface iPersistence{

    public function PersistenceErpLeo();

    public function process_access($params);

    public function getUserFunctionalities($user_id);

    public function getHintAccount($params);

    public function getNegativeBalance($account_id);

    public function getAccount($account_id);

    public function getConfigurationByName($keyword);

    public function saveBalance_checksum($balance_checksum);

    public function getLastBalance_checksum();
    
    public function getBudget();

    public function saveEntry($params);

    public function getTodayEntryCollection();

    public function saveAccount($params);

    public function getBalanceActivos($fecha_ini,$fecha_fin);

    public function getBalancePasivos($fecha_ini,$fecha_fin);

    public function getBalanceCapitales($fecha_ini,$fecha_fin);

    public function getResultadosIngresos($fecha_ini,$fecha_fin);

    public function getResultadosEgresos($fecha_ini,$fecha_fin);

    public function entryDelete($entryid);

    public function getLibroDiario($fecha_ini, $fecha_fin);

    public function getAccountsPlan();

    public function getLedger($fecha_ini, $fecha_fin, $code);

    public function updateClient($client);

    public function getHintClient($keyword);

    public function getClient($client_id);

    public function getPrice($price_id);

    public function getConsigProd($consig_prod_id);

    public function getProductCostCollection();

    public function saveBitacora($bitacora);
    
    public function getPositionCollection();

    public function getLastPosHistories();

    public function getPendEmpresa();

    public  function save_pend_empresa($params);

    public function modif_pend_empresa($params);

    public function getPendientes();

    public  function save_pendiente($pendiente);

    public function getPosHistory($pos);

    public function getPosDescripHistory($pos);

    public function getPosSaludHistory($pos);

    public function savePosicDescripHist($PosicDescripHist);

    public function savePosicSaludHist($PosicSaludHist);

    public function updatePosition($position);

    public function savePosHistory($pos_history);

    public function getConsigProdHistory($fecha_ini, $fecha_fin, $consig_id, $product_id);
    
    public function modif_pendiente($pendiente);
    
    public function getListPosHistory();
                   
    /********SUBSISTEMA DE INVENTÁRIO*******/        
    public function getMovementsByDateCollection($fecha_ini, $fecha_fin);

    public function getSupplyMovementsByDateCollection($fecha_ini, $fecha_fin);

    public function getIngredientCollection();

    public function saveIngredient($ingredient);

    public function ingredientDel($ingredient_id);

    public function getMovementsCollection();

    public function getHintProduct($keyword);

    public function saveMovement($movement);

    public function updateProduct($product);

    public function getProduct($productid);

    public function saveProduct($product);

    public function getProductProducts($product_id);

    public function getProductSupply_by_product_id($product_id);

    public function getIngredient($ingredient_id);

    public function updateIngredient($ingredient);

    public function getSupply($supply_id);

    public function updateSupply($supply);

    public function getProductCost($product_cost_id);

    public function getProdCostProdbyProductId($product_id);

    public function getStockProducts();

    public function getStockActiveProducts();

    public function getStockSupplies();

    public function getHintSupply($keyword);

    public function getSupplyMovementsCollection();

    public function saveMovSupply($movement);
        /****************************************/                             
}
/*fin interface*/    ?>