<?php

/**
 * File: realpath
 * Author: Leonardo G. Tellez Saucedo <leonardo616@gmail.com>
 * Date: 1 feb. de 2024 23:56:08
 * User: user
 */

    $path = dirname(dirname(__FILE__));


    $dirname = str_replace('\\', '/', dirname(dirname(__FILE__)));

    $v_dirname = explode('/',$dirname);

    $v_script_name = explode('/',$_SERVER['SCRIPT_FILENAME']);

    $i = 0;



    $seguir = TRUE;

    while(  $seguir ){



        if($i>(count($v_dirname)-1)){

            $seguir = FALSE;

        }else{

            if($i>(count($v_script_name)-1)){

                $seguir = FALSE;

            }else{

                if($v_dirname[$i]!=$v_script_name[$i]){

                    $seguir = FALSE;

                }

            }

        }



        $i++;

    }

    $count_script=count($v_script_name);

    $relative_path='';

    for($j=$i;$j<$count_script-1;$j++){

       $relative_path .= '../';

    }

    $path_html ='';

    for($i;$i<count($v_dirname);$i++){

        $path_html .= $v_dirname[$i].'/';

    }




