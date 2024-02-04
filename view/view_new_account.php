<?php 

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
        <title>CUENTA NUEVA</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=uf8" />        
        <meta name="HandheldFriendly" content="true">        
        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">        
        <meta name="viewport" content="width=device-width">            
    </head>        
    <script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type='text/javascript'>          
        /* set_item : this function will be executed when we select an item */          
        function set_item(item, id_account)          
        {            /* change input value */            
            $('#edAccount').val(item);            
            /* hide proposition list */            
            $('#account_list_id').hide();            
            $('#hf_id_account').val(id_account);          
        }                                        
        
        function get_hint(){              
            /*alert('hola!'); */                            
            var min_length = 4; /* min caracters to display the autocomplete */              
            var keyword = $('#edAccount').val();              
            if (keyword.length >= min_length)              
            {                
                $.ajax                
                ({                  
                    url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethint',
                    type: 'POST',                  data: {keyword:keyword},
                    success:function(data){                    
                        $('#account_list_id').show();                    
                        $('#account_list_id').html(data);                  
                    }                 
                });              
                }              
                else              
                {                
                    $('#account_list_id').hide();              
                }
        }
        
        function get_hint1(){              
            /*alert('hola!');*/                            
            var min_length = 4; /* min caracters to display the autocomplete*/              
            var keyword = $('#edAccountName').val();              
            if (keyword.length >= min_length)              
            {                
                $.ajax                
                ({                  
                    url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethint',
                    type: 'POST',                  data: {keyword:keyword},
                    success:function(data)
                    {                    
                        $('#account_list_id1').show();
                        $('#account_list_id1').html(data);
                    }                 
                });
            }
            else
            {
                $('#account_list_id1').hide();
            }
        }
        
        </script>
        <body>
            <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php">
                <input type="hidden" name="action" id="action" value="save_account" />
                <label>C&oacute;digo</label><br/>
                <input type="text" id="edAccount" name="edAccount"  onkeyup="get_hint()" autocomplete="off" /><br/>            
                <ul id="account_list_id"></ul>            
                <br/>            
                <input type="hidden" id="hf_id_account" name="hf_id_account" value="0" /> 
                <label>Tipo</label><br/>
                <select id="slct_tipo" name="slct_tipo">
                    <option>Apropiacion</option>
                    <option>Aplicacion</option>
                    <option>General</option>
                    <option>Grupo</option>
                    <option>Subgrupo</option>
                </select>
                <br/>
                <p></p>
                <label>Cuenta</label><br/>
                <input type="text" id="edAccountName" onkeyup="get_hint1()" name="edAccountName" autocomplete="off" /><br/>
                <ul id="account_list_id1"></ul>
                <br/>
                <label>Descripci&oacute;n</label><br/>
                <textarea rows="4" cols="30" id="edDescription" name="edDescription"> </textarea> <br/> <br/>
                <input type="submit" id="btn_account"  value="Aceptar" />
            </form>
            <br/>
            <a href="index.php?action=formentry">Volver</a><br/>
            <a href="index.php?action=home">Inicio</a>
        </body>
</html>

