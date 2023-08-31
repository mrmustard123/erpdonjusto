<?php

/*echo "persistence cargado<br>  ";*/

require_once("/rpcl/rpcl.inc.php");

//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");

//Class definition
class persistence extends DataModule
{
    public $dbapicolad_erpdonjusto1 = null;
    public $tbpos_history1 = null;
    public $dspos_history1 = null;
    function persistenceShow($sender, $params)
    {
        $this->tbpos_history1->Active = true;
    }
}

global $application;

global $persistence;

//Creates the form
$persistence=new persistence($application);

//Read from resource file
$persistence->loadResource(__FILE__);

//PERSISTENCE
    /*echo 'estoy en persistence.php<br>';*/
    require_once ('class.db.php');

    //require_once("../view/database_module01.php");



    require_once ("doctrine2/autoload.php");

    /*echo 'pas? doctrine <br>';*/

    require_once('ipersistence.php');

    use Doctrine\ORM\Tools\Setup;
    use Doctrine\ORM\EntityManager;

    /*echo 'break05<br>';*/


    class PersistenceErpLeo implements iPersistence{

        public $clasificados;
        public $periodicos;
        public $entityManager;
        public $db;
        public $item_per_page;
        public $link;

        public function PersistenceErpLeo(){
            /*constructor*/
            $paths = array("./");
            $isDevMode = false;

            /* the connection configuration*/
            $dbParams = array(
                'driver'   => 'pdo_mysql',
                'user'     => 'apicolad_justo',
                'password' => 'aA1NfDBW5Wlm',
                'dbname'   => 'apicolad_erpdonjusto',


            );
            $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            $this->entityManager = EntityManager::create($dbParams, $config);


            $this->db = new db();

            $this->db->setDb_name("apicolad_erpdonjusto");
            $this->db->setUser("apicolad_justo");
            $this->db->setPassword("aA1NfDBW5Wlm");
            $this->db->setServer_name("localhost");

            $this->link = $this->db->connect();

            $this->item_per_page = 50; /*item to display per page*/

        }



        public function process_access($params) {

            $sql = "SELECT * FROM user WHERE user_name = '".$params['edUser']."' AND user_password= '".$params['edPassword']."' LIMIT 1";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                $user = mysqli_fetch_assoc($result);
                return $user;
            }else{
                return NULL;
            }

        }



        public function getUserFunctionalities($user_id){

            $sql = "SELECT f.id_functionality FROM `user` AS u INNER JOIN directive AS d ON (u.id_users_group = d.id_users_group) INNER JOIN functionality AS f ON (d.id_functionality = f.id_functionality)
                    WHERE  d.directive_rule = 'PERMITIR' AND  u.user_id = ".$user_id;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_functionalities[] = $tupla1['id_functionality'];
                }

                return $v_functionalities;
            }else{
                return NULL;
            }

        }



        public function getHintAccount($keyword){

            $sql = "SELECT * FROM account WHERE (name like '%" . $keyword . "%' or account_code like '" . $keyword . "%') AND account_type= 'Apropiacion' ORDER BY account_code ";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_account[] = array($tupla1['account_id'],$tupla1['account_code'],$tupla1['name']);
                }
                return $v_account;

            }else{
                return NULL;
            }

        }


        public function getNegativeBalance($account_id){
            $sql = " SELECT a.`name`  AS Cuenta, SUM( IF(e.balance<0,0,e.balance) ) AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_id` = ".$account_id." AND a.account_type = 'Apropiacion' ";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){}

            /*Funcion inconclusa*/

        }


        public function getAccount($account_id){


            $account = $this->entityManager->find('Account', $account_id);
            return $account;


        }


        public function getConfigurationByName($keyword){

            $sql = "SELECT config_value FROM configuration WHERE config_name = '".$keyword."'";


            $config_value = 0;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                $tupla1 = mysqli_fetch_assoc($result);

                  $config_value = $tupla1['config_value'];
            }


            return $config_value;

        }


        public function saveBalance_checksum($balance_checksum){

            $this->entityManager->persist($balance_checksum);
            $this->entityManager->flush();

        }

        public function getLastBalance_checksum(){

            $last_checksum=0;
            $sql = "SELECT b.`checksum`checksum FROM balance_checksum as b ORDER BY checksum_id DESC LIMIT 1";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                $tupla1 = mysqli_fetch_assoc($result);

                  $last_checksum = $tupla1['checksum'];
            }
            return $last_checksum;
        }

        public function getBudget(){

            $budget=0;
            $sql = "SELECT SUM(balance) as `Total` FROM `entry` WHERE account_id in (432, 413, 419, 433, 434, 435, 579,581, 582) AND entry_date BETWEEN '2019-06-28 11:48:46' AND NOW();";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                $tupla1 = mysqli_fetch_assoc($result);

                  $budget = $tupla1['Total'];
            }
            return $budget;



        }



        public function saveEntry($entry){
            $this->entityManager->persist($entry);
            $this->entityManager->flush();
        }

        public function getTodayEntryCollection(){

    /*        date_default_timezone_set('America/La_Paz');
            $fecha_actual = date('Y-m-d');                */
    /*        $sql = "SELECT e.entry_date, a.name, e.balance FROM entry e INNER JOIN account a ON (a.account_id=e.account_id) WHERE DATE(e.entry_date) = '".$fecha_actual."' ORDER BY e.entry_date DESC";        */
            $sql = "SELECT e.entry_id, e.entry_date, a.name, e.balance, e.cbte_cont_nro FROM entry e INNER JOIN account a ON (a.account_id=e.account_id) ORDER BY e.entry_id DESC LIMIT 20";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }
        }

        public function saveAccount($account) {
            $this->entityManager->persist($account);
            $this->entityManager->flush();

        }


        public function getBalanceActivos($fecha_ini,$fecha_fin){

            $sql= "SELECT a.`name`  AS Cuenta, SUM(e.balance) AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_code` LIKE '1.%' AND a.account_type = 'Apropiacion' AND (e.entry_date >= '".$fecha_ini."') AND (e.entry_date <= DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  )
                    GROUP BY e.account_id";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_activos[] = $tupla1;
                }
                return $v_activos;

            }else{
                return NULL;
            }

        }


        public function getBalancePasivos($fecha_ini,$fecha_fin){

            $sql= "SELECT a.`name`  AS Cuenta, SUM(e.balance) AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_code` LIKE '2.%' AND a.account_type = 'Apropiacion' AND (e.entry_date >= '".$fecha_ini."' AND e.entry_date <=  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  )
                    GROUP BY e.account_id";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pasivos[] = $tupla1;
                }
                return $v_pasivos;

            }else{
                return NULL;
            }
        }




        public function getBalanceCapitales($fecha_ini,$fecha_fin){

            $sql= "SELECT a.`name`  AS Cuenta,  SUM(e.balance)  AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_code` LIKE '3.%' AND a.account_type = 'Apropiacion' AND (e.entry_date >= '".$fecha_ini."' AND e.entry_date <= DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  )
                    GROUP BY e.account_id";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_capitales[] = $tupla1;
                }
                return $v_capitales;

            }else{
                return NULL;
            }
        }


        public function getResultadosIngresos($fecha_ini,$fecha_fin){

            $sql= "SELECT a.`name`  AS Cuenta, SUM( IF(e.balance<0,0,e.balance) ) AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_code` LIKE '4.%' AND a.account_type = 'Apropiacion' AND (e.entry_date >= '".$fecha_ini."' AND e.entry_date <=  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  )
                    GROUP BY e.account_id";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_ingresos[] = $tupla1;
                }
                return $v_ingresos;

            }else{
                return NULL;
            }
        }


        public function getResultadosEgresos($fecha_ini,$fecha_fin){

            $sql= "SELECT a.`name`  AS Cuenta,  SUM( IF(e.balance>0,e.balance,0)  )  AS Suma FROM entry AS e  INNER JOIN account AS a ON (e.account_id = a.account_id)
                    WHERE a.`account_code` LIKE '7.%' AND a.account_type = 'Apropiacion' AND (e.entry_date >= '".$fecha_ini."' AND e.entry_date <=  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  )
                    GROUP BY e.account_id";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_egresos[] = $tupla1;
                }
                return $v_egresos;

            }else{
                return NULL;
            }
        }


        public function entryDelete($entryid){
            if(isset($entryid)){

            $entry = $this->entityManager->find('Entry', $entryid);
            $this->entityManager->remove($entry);
            $this->entityManager->flush();

                /*

                $sql ='DELETE FROM entry WHERE entry_id ='.$entryid;
                $result=$this->db->query($sql);      */

            }
        }




        public function getAccountsPlan(){

            $sql = "SELECT * FROM account WHERE 1 ORDER BY account_code";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_accounts[] = $tupla1;
                }
                return $v_accounts;

            }else{
                return NULL;
            }

        }


        public function getLibroDiario($fecha_ini, $fecha_fin){

            $sql = "SELECT e.entry_id, e.entry_date,e.details, a.account_code, a.name, e.balance, e.cbte_cont_nro FROM entry e INNER JOIN account a ON (a.account_id=e.account_id) WHERE (e.entry_date >= '".$fecha_ini."' AND e.entry_date <= DATE('".$fecha_fin." ')  + INTERVAL 1 DAY  ) ORDER BY e.entry_date, e.entry_id LIMIT 3000";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }

        }


        public function getLedger($fecha_ini, $fecha_fin, $code){

            //$sql = "SELECT e.entry_id, e.entry_date,e.details, a.account_code, e.cbte_cont_nro, a.name, e.balance FROM entry e INNER JOIN (SELECT * FROM account AS a WHERE a.account_code like '".$code."%')   a ON (a.account_id=e.account_id) WHERE (e.entry_date >= '".$fecha_ini.' 00:00:00'."' AND e.entry_date <=   DATE('".$fecha_fin.' 23:59:59'." ')  + INTERVAL 1 DAY  ) ORDER BY e.entry_date, e.entry_id LIMIT 3000";
            $sql = "SELECT e.entry_id, e.entry_date,e.details, a.account_code, e.cbte_cont_nro, a.name, e.balance FROM entry e INNER JOIN (SELECT * FROM account AS a WHERE a.account_code like '".$code."%')   a ON (a.account_id=e.account_id) WHERE (e.entry_date >= '".$fecha_ini.' 00:00:00'."' AND e.entry_date <=   CONCAT(DATE('".$fecha_fin."') + INTERVAL 1 DAY, ' 23:59:59')  ) ORDER BY e.entry_date, e.entry_id LIMIT 3000";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }


        }



        public function updateClient($client) {
            $this->entityManager->merge($client);
            $this->entityManager->flush();
        }


        public function saveClient($client){
            $this->entityManager->persist($client);
            $this->entityManager->flush();

        }


        public function getHintClient($keyword){


            $sql = "SELECT * FROM client WHERE (client_name like '%" . $keyword . "%')  ORDER BY client_name LIMIT 100 ";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_clients [] = array($tupla1['client_id'],$tupla1['mobile'],$tupla1['client_name']);
                }
                return $v_clients;

            }else{
                return NULL;
            }



        }


        public function getClient($client_id){

            $cliente = $this->entityManager->find('Client', $client_id);
            return $cliente;

        }

        public function getConsigProd($consig_prod_id){

            $consig_prod = $this->entityManager->find('Consig_Prod', $consig_prod_id);
            return $consig_prod;

        }



        public function getPrice($price_id){
            $price = $this->entityManager->find('Price', $price_id);
            return $price;

        }




        public function getConsigProdHistory($fecha_ini, $fecha_fin, $consig_id, $product_id){

        if($product_id){
            $filtro = ' AND p.product_id = '.$product_id.' ';
        }

        $sql = "SELECT c.consig_date, c.mov_type, p.product_name, c.cant, c.balance AS 'tiene',
  c.topay AS 'topay', c.unit_price, c.total_price AS 'total', c.comments, c.cbte_cont_nro FROM
         consig_prod AS c INNER JOIN product AS p ON (p.product_id = c.product_id)
        WHERE c.consig_id = ".$consig_id." AND c.consig_date BETWEEN '".$fecha_ini."' AND  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY ".$filtro.
        "ORDER BY c.consig_date, c.consig_prod_id ASC LIMIT 3000";

            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }
        }






        public function getProductCostCollection(){

            $sql = "SELECT * FROM product_cost AS e WHERE 1 ORDER BY product_id DESC LIMIT 20";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_product_costs[] = $tupla1;
                }
                return $v_product_costs;

            }else{
                return NULL;
            }

        }

        public function saveBitacora($bitacora){

            $this->entityManager->persist($bitacora);
            $this->entityManager->flush();

        }



        public function getLastPosHistories(){

            $sql = "SELECT p.position_id, p.pos_name, p.descripcion, p.coordenadas, p.salud, m.pos_hist_id, m.pos_hist_date, m.pos_hist_body  FROM position AS p LEFT JOIN (
                    SELECT h.* FROM pos_history AS h, (SELECT MAX(pos_hist_id) AS 'pos_hist_id', MAX(pos_hist_date) AS 'pos_hist_date' FROM pos_history WHERE 1
                    GROUP BY position_id) AS l
                    WHERE h.pos_hist_id = l.pos_hist_id) AS m ON (p.position_id = m.position_id)";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pos_histories[] = $tupla1;
                }
                return $v_pos_histories;

            }else{
                return NULL;
            }


        }


        public function getPosHistory($pos){

            $sql = "select * from pos_history where position_id = ".$pos;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pos_history[] = $tupla1;
                }
                return $v_pos_history;

            }else{
                return NULL;
            }


        }

        public function getPosDescripHistory($pos){

            $sql = "select * from posic_descrip_hist where position_id = ".$pos;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pos_history[] = $tupla1;
                }
                return $v_pos_history;

            }else{
                return NULL;
            }


        }

        public function getPosSaludHistory($pos){

            $sql = "select * from posic_salud_hist where position_id = ".$pos;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pos_history[] = $tupla1;
                }
                return $v_pos_history;

            }else{
                return NULL;
            }


        }


        public function updatePosition($position){

            $this->entityManager->merge($position);
            $this->entityManager->flush();



        }

        public function savePosHistory($pos_history){

            $this->entityManager->persist($pos_history);
            $this->entityManager->flush();


        }


        public function savePosicDescripHist($PosicDescripHist){
            $this->entityManager->persist($PosicDescripHist);
            $this->entityManager->flush();


        }

        public function savePosicSaludHist($PosicSaludHist){
            $this->entityManager->persist($PosicSaludHist);
            $this->entityManager->flush();


        }


        public function getPendEmpresa(){

            $sql = "SELECT * FROM pend_empresa WHERE realizado = 'N' ORDER BY fecha DESC";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }

        }

        public  function save_pend_empresa($pend_empresa){

            $this->entityManager->persist($pend_empresa);
            $this->entityManager->flush();

        }

        public function modif_pend_empresa($pend_empresa){

            $this->entityManager->merge($pend_empresa);
            $this->entityManager->flush();

        }







        public function getPendientes(){

            $sql = "SELECT * FROM pendiente WHERE realizado = 'N' ORDER BY fecha DESC";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_entries[] = $tupla1;
                }
                return $v_entries;

            }else{
                return NULL;
            }

        }

        public  function save_pendiente($pendiente){

            $this->entityManager->persist($pendiente);
            $this->entityManager->flush();

        }

        public function modif_pendiente($pendiente){

            $this->entityManager->merge($pendiente);
            $this->entityManager->flush();

        }


    public function getListPosHistory(){


            $sql = "select * from pos_history ORDER BY position_id, pos_hist_date";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_pos_histories[] = $tupla1;
                }
                return $v_pos_histories;

            }else{
                return NULL;
            }

    }












        /**************FUNCTIONES DE INVENT?RIO****************************************/
        public function getIngredientCollection(){

            $sql = "SELECT * FROM entry AS e WHERE 1 ORDER BY e.entry_name DESC LIMIT 20";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_ingredients[] = $tupla1;
                }
                return $v_ingredients;

            }else{
                return NULL;
            }

        }

        public function saveIngredient($ingredient){
            $this->entityManager->persist($ingredient);
            $this->entityManager->flush();
        }

        public function ingredientDel($ingredient_id){
            if(isset($ingredient_id)){
                $ingredient = $this->entityManager->find('Ingredient',$ingredient_id);
                $this->entityManager->remove($ingredient);
                $this->entityManager->flush();
            }

        }



        public function getMovementsCollection(){


            $sql = "SELECT m.mov_id, m.mov_date, m.mov_type, m.mov_cant, m.comments, p.product_name FROM movement AS m INNER JOIN product AS p ON (m.product_id = p.product_id) WHERE 1 ORDER BY mov_id DESC LIMIT 20";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_movements[] = $tupla1;
                }
                return $v_movements;

            }else{
                return NULL;
            }

        }

        public function getHintProduct($keyword){

            $sql = "SELECT * FROM product WHERE (product_name like '%" . $keyword . "%')  ORDER BY product_name ";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_products [] = array($tupla1['product_id'],$tupla1['stock'],$tupla1['product_name']);
                }
                return $v_products;

            }else{
                return NULL;
            }

        }


        public function saveMovement($movement){
            $this->entityManager->persist($movement);
            $this->entityManager->flush();
        }


        public function updateProduct($product){
            $this->entityManager->merge($product);
            $this->entityManager->flush();

        }


        public function getProduct($productid){
            return $this->entityManager->find('Product',$productid);
        }


        public function saveProduct($product){
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        }



        public function getProductProducts($product_id){

            $sql = "SELECT * FROM product_product AS p WHERE p.product_id = ".$product_id;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_product_ingredients[] = $tupla1;
                }
                return $v_product_ingredients;

            }else{
                return NULL;
            }


        }

        public function getProductSupply_by_product_id($product_id){
            $sql = "SELECT * FROM product_supply AS p WHERE p.product_id=".$product_id;
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_product_supply[] = $tupla1;
                }
                return $v_product_supply;

            }else{
                return NULL;
            }


        }

        public function getIngredient($ingredient_id){
            return $this->entityManager->find('Product',$ingredient_id);
        }


        public function updateIngredient($ingredient){
            $this->entityManager->merge($ingredient);
            $this->entityManager->flush();

        }


        public function getSupply($supply_id){
            return $this->entityManager->find('Supply',$supply_id);
        }

        public function updateSupply($supply){
            $this->entityManager->merge($supply);
            $this->entityManager->flush();
        }


        public function getStockProducts(){
            $sql = "SELECT * FROM product WHERE 1 ";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_products[] = $tupla1;
                }
                return $v_products;

            }else{
                return NULL;
            }


        }

       public function getStockActiveProducts(){
            $sql = "SELECT * FROM product WHERE status = 'ACTIVO'";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_products[] = $tupla1;
                }
                return $v_products;

            }else{
                return NULL;
            }


        }



        public function getStockSupplies(){
            $sql = "SELECT * FROM supply WHERE 1";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_supplies[] = $tupla1;
                }
                return $v_supplies;

            }else{
                return NULL;
            }


        }

        public function getProductCost($prod_cost_id){
            return $this->entityManager->find('ProductCost',$prod_cost_id);
        }


        public function getProdCostProdbyProductId($product_id){

                $sql = "SELECT
                    `c`.`prod_cost_prod_id` AS `prod_cost_prod_id`,
                    `p`.`product_name` AS `product_name`,
                    `t`.`cost_name` AS `cost_name`,
                    `c`.`cost_value` AS `cost_value`,
                    `t`.`account_id` AS `account_id`,
                    `t`.`cost_type` AS `cost_type`,
                    `t`.`saving_type` AS `saving_type`,
                    `t`.`saving_id` AS `saving_id`
                    FROM
                    (
                            (
                                    `prod_cost_prod` `c`
                                    JOIN `product` `p` ON (
                                            (
                                                    `c`.`product_id` = `p`.`product_id`
                                            )
                                    )
                            )
                            JOIN `product_cost` `t` ON (
                                    (
                                            `c`.`prod_cost_id` = `t`.`prod_cost_id`
                                    )
                            )
                    )
                    WHERE
                     c.product_id = ".$product_id."
                    ORDER BY
                    `p`.`product_name`,
                    `t`.`cost_name`" ;

                    $result=$this->db->query($sql);
                    if(mysqli_num_rows($result)>0){
                        while($tupla1 = mysqli_fetch_assoc($result))
                        {
                          $v_prod_cost_prod[] = $tupla1;
                        }
                        return $v_prod_cost_prod;

                    }else{
                        return NULL;
                    }

        }



        public function getHintSupply($keyword){

            $sql = "SELECT * FROM supply WHERE (supply_name like '%" . $keyword . "%')  ORDER BY supply_name ";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_supplies [] = array($tupla1['supply_id'],$tupla1['stock'],$tupla1['supply_name']);
                }
                return $v_supplies;

            }else{
                return NULL;
            }

        }

        public function getSupplyMovementsCollection(){

            $sql = "SELECT m.mov_supply_id, m.mov_supply_date, m.mov_supply_type, m.mov_supply_cant, m.comments, s.supply_name FROM mov_supply AS m INNER JOIN supply AS s ON (m.supply_id = s.supply_id) WHERE 1 ORDER BY mov_supply_id DESC LIMIT 20";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_movements[] = $tupla1;
                }
                return $v_movements;

            }else{
                return NULL;
            }


        }


        public function saveMovSupply($mov_supply){
            $this->entityManager->persist($mov_supply);
            $this->entityManager->flush();

        }


        public function getMovementsByDateCollection($fecha_ini, $fecha_fin){


            $sql = "SELECT m.mov_id, m.mov_date, m.mov_type, m.mov_lot, m.mov_cant, m.comments, p.product_name FROM movement AS m INNER JOIN product AS p ON (m.product_id = p.product_id) WHERE mov_date >= '".$fecha_ini."'  AND mov_date <=  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY   ORDER BY mov_date, mov_id LIMIT 3000";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_movements[] = $tupla1;
                }
                return $v_movements;

            }else{
                return NULL;
            }

        }



        public function getSupplyMovementsByDateCollection($fecha_ini, $fecha_fin){

            $sql = "SELECT m.mov_supply_id, m.mov_supply_date, m.mov_supply_type, m.mov_supply_cant, m.comments, s.supply_name FROM mov_supply AS m INNER JOIN supply AS s ON (m.supply_id = s.supply_id) WHERE  mov_supply_date >= '".$fecha_ini."'  AND mov_supply_date <=  DATE('".$fecha_fin." ')  + INTERVAL 1 DAY   ORDER BY mov_supply_date, mov_supply_id LIMIT 3000";
            $result=$this->db->query($sql);
            if(mysqli_num_rows($result)>0){
                while($tupla1 = mysqli_fetch_assoc($result))
                {
                  $v_movements[] = $tupla1;
                }
                return $v_movements;

            }else{
                return NULL;
            }


        }





/******FIN FUNCIONES DE INVENT?RIO*******************************************/



    } /*end class persistence*/


    /*echo 'End Persistence<br>';*/

?>
