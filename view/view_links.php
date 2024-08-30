<?php 
/*
Author: Leonardo G. Tellez Saucedo
24 ago. de 2024
23:08:59
 * 
 */    


        $path='';
        $path_view='';
        
        if($_SESSION['view']=='radphp'){
            $path='../';
        }else{
            $path_view='view/';
        }



?>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?php echo $path_view; ?>js/jquery-3.3.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo $path_view; ?>js/bootstrap.min.js" ></script>

	
	<link   type="text/css"       href="<?php echo $path_view; ?>css/bootstrap.min.css" rel="stylesheet" />
        <link   type="text/css"       href="<?php echo $path_view; ?>css/erpdonjusto.css" rel="stylesheet" />        
        <link   type="text/css"       href="<?php echo $path_view; ?>css/styles.css" rel="stylesheet" />        
	<link   type="text/css"       href="<?php echo $path_view; ?>js/jquery-ui-1.11.4.css" rel="stylesheet" />
        <!--/*ES IMPORTANTE EL ORDEN DE LOS SCRIPTS JS PARA LA COMPATIBILIDAD
        POR EJEMPLO DEL DATAPICKER Y EL SIDEBAR COLLAPSE*/ -->
        <script src="<?php echo $path_view; ?>js/jquery-1.6.4.min.js" type="text/javascript"></script>
	<script src="<?php echo $path_view; ?>js/jquery-ui-1.11.4.js" type="text/javascript"></script>
        
        

   