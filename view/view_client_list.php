<?php

/**
 * Project:  ErpDonJusto 
 * File: view_client_list.php
 * Created on: Apr 4, 2017
 * Author: Leonardo Gabriel Tellez Saucedo <mr_mustard123@hotmail.com>
 */

require_once "realpath.php";
$paths = realpath::get_realpath();
$relative_path = $paths["relative_path"];
$path_html = $paths["path_html"];
/*
echo 'Relative path: '.$relative_path.'<br/>';
echo 'Path html: '.$path_html.'<br/>';
*/

?>



<html>
    <head>
        <title>CLIENTES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">  
        
        <link   type="text/css"       href="<?php echo $relative_path.$path_html; ?>view/css/erpdonjusto.css" rel="stylesheet" />	                
        
    </head>
    
    



<html>

    <head>

        <title>ERPDONJUSTO</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />       

        <meta name="HandheldFriendly" content="true">

        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">

        <meta name="viewport" content="width=device-width">        

    </head>



        <script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>            
          
        

        

    <body>       
        
        
<script  type="text/javascript">


          /* set_item : this function will be executed when we select an item */

         /*alert('hola');*/

          function set_item(item, id_client)

          {

            // change input value 

            $('#edNombre').val(item);

            /* hide proposition list */

            $('#client_list_id').hide();

            $('#hf_id_client').val(id_client);

          }


          

          function get_hint_client(){

                          

              var min_length = 4; /* min caracters to display the autocomplete */

              var keyword = $('#edNombre').val();
              
               /*alert(keyword); */

              if (keyword.length >= min_length)

              {

                $.ajax

                ({

                  url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethintclient',

                  type: 'POST',

                  data: {keyword:keyword},

                  success:function(data){

                    $('#client_list_id').show();

                    $('#client_list_id').html(data);

                  }

                 });

              }

              else

              {

                $('#client_list_id').hide();

              }



          }
                                               
        
        
    </script>      
    <body>
        <div>
            
<a href="index.php?action=home">Inicio</a>            

        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php"> 

            <input type="hidden" name="action" id="action" value="client" />

            <label>Nombre</label><br/>

            <input type="text" id="edNombre" name="edNombre"  onkeyup="get_hint_client()" autocomplete="off" /><br/>

            <ul id="client_list_id"></ul>

            <br/>

            <input type="hidden" id="hf_id_client" name="hf_id_client" value="0" />
           

            <br/>
            <br/>            
           

            <input type="submit" id="btn_account"  value="Aceptar" />

        </form>         
        
        
        
        </div>
    </body>
</html>


