<?php    $path = dirname(dirname(__FILE__));    $dirname = str_replace('\\', '/', dirname(dirname(__FILE__)));    $v_dirname = explode('/',$dirname);    $v_script_name = explode('/',$_SERVER['SCRIPT_FILENAME']);    $i = 0;    $seguir = TRUE;    while(  $seguir ){        if($i>(count($v_dirname)-1)){            $seguir = FALSE;        }else{            if($i>(count($v_script_name)-1)){                $seguir = FALSE;            }else{                  if($v_dirname[$i]!=$v_script_name[$i]){                    $seguir = FALSE;                }            }        }        $i++;    }    $count_script=count($v_script_name);    $relative_path='';        for($j=$i;$j<$count_script-1;$j++){       $relative_path .= '../';     }    $path_html ='';    for($i;$i<count($v_dirname);$i++){        $path_html .= $v_dirname[$i].'/';            }?><html>    <head>        <title>ASIENTO</title>        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />               <meta name="HandheldFriendly" content="true">        <meta name="viewport" content="width=device-width, initial-scale=0.666667, maximum-scale=0.666667, user-scalable=0">        <meta name="viewport" content="width=device-width">            </head>                                      <body>       <script src="<?php echo $relative_path.$path_html; ?>view/js/jquery-1.6.4.min.js" type="text/javascript"></script>                            <script  type="text/javascript">          /* set_item : this function will be executed when we select an item */         /*alert('hola');*/          function set_item(item, id_account)          {            /* change input value  */            $('#edAccount').val(item);            /* hide proposition list */            $('#account_list_id').hide();            $('#hf_id_account').val(id_account);          }                    function get_hint(){                                        var min_length = 4; /* min caracters to display the autocomplete */              var keyword = $('#edAccount').val();                            /* alert(keyword); */              if (keyword.length >= min_length)              {                $.ajax                ({                  url: '<?php echo $relative_path.$path_html; ?>index.php?action=gethint',                  type: 'POST',                  data: {keyword:keyword},                  success:function(data){                    $('#account_list_id').show();                    $('#account_list_id').html(data);                  }                 });              }              else              {                $('#account_list_id').hide();              }          }                                           jQuery(document).ready    (function(){          $("#hf_button_clicked").val(0);                $("#btn_entry").one( "click",        function(){                                    var cuenta = $("#edAccount").val().trim();            var saldo = $("#edt_balance").val().trim();                        if (cuenta !== ''){                if(saldo !== ''){                    $("#hf_button_clicked").val(1);                    var button_clicked =$("#hf_button_clicked").val();                    jQuery('#form_entry').submit();                }            }                                                        });                 $('#href_delete').click(function(event){            event.preventDefault();                        var r = confirm("Desea eliminar");            if (r == true) {                window.location = this.href;            } else {                window.location = "#";            }                     });                  });                </script>              <a href="index.php?action=home">Inicio</a>        <form method="post" action="<?php echo $relative_path.$path_html; ?>index.php" id="form_entry">             <input type="hidden" name="action" id="action" value="save_entry" />            <label>Fecha (yyyy-mm-dd H:m:s)</label><br/>            <?php                date_default_timezone_set('America/La_Paz');                $fecha_actual = date('Y-m-d H:i:s.u');                        ?>            <input type="text" id="edt_date" name="edt_date" value="<?php echo $fecha_actual; ?>" /><br/>            <label>Cuenta</label>&nbsp;<a href="index.php?action=newaccount">Nueva</a><br/>            <input type="text" id="edAccount" name="edAccount" onkeyup="get_hint()"   autocomplete="off" /><br/>            <ul id="account_list_id"></ul>            <br/>            <input type="hidden" id="hf_button_clicked" name="hf_button_clicked" value="0" />            <input type="hidden" id="hf_id_account" name="hf_id_account" value="0" />            <label>Descripci&oacute;n</label><br/>            <textarea id="ta_description" name="ta_description" rows="4"></textarea><br/>                        <br/>            <label>Tipo de Comprobante:</label><br/>            <input type="text" id="edt_cbte_tipo" name="edt_cbte_tipo"/>                        <br/>            <label>Nro de Comporbante:</label><br/>            <input type="text" id="edt_cbte_nro" name="edt_cbte_nro"/>                        <br/>            <label>Saldo</label><br/>            <input type="text" id="edt_balance" name="edt_balance"/>                                    <br/>            <br/>            <input type="button" id="btn_entry"  value="Aceptar" />        </form>                <?php        require_once 'model/model.php';        $model = new model();        /*var_dump($model);*/        $v_entries = $model->getTodayEntryCollection();        /*echo '<h1>var_dump:</h1><br>';*/        /*var_dump($v_entries);*/?>                <div id="tabla_diario">            <table border="1">                <tr>                    <td>FECHA</td>                                        <td>CUENTA</td>                    <td>DEBE</td>                    <td>HABER</td>                                    </tr>                <?php        if($v_entries){                        foreach($v_entries as $entry){?>                                   <tr>                    <td><?php echo $entry['entry_date']; ?></td>                    <td> <?php                             echo utf8_encode($entry['name']);                            /*Voy a desactivar por el momento el borrado por que causa accidentes muy seguido                                  <a id="href_delete" href="index.php?action=entrydel&entryid=<?php echo $entry['entry_id']; ?>"  ><?php echo utf8_encode($entry['name']);?></a>                                */                           ?></td>                    <td><?php                             if($entry['balance']>=0){                                echo bcdiv($entry['balance'],1,2);                             }                                                        ?>                    </td>                    <td><?php                             if($entry['balance']<0){                                echo bcdiv($entry['balance'],1,2) ;                             }                                                            ?></td>                                    </tr>                                    <?php                            }                   }        ?>                       </table>        </div>    </body>   </html>