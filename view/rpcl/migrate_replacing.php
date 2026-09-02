<?php

/*
File: migrate_replacing
Author: Leonardo G. Tellez Saucedo
Created on: 31 oct. de 2024 17:51:10
Email: leonardo616@gmail.com
*/


function replace_foreach(){

    // Define el directorio donde se encuentran los archivos PHP
    $directory = __DIR__ . '/';

    // Busca todos los archivos PHP en el directorio
    $files = glob($directory . '/*.php');

    // Patrón para encontrar 'while (list($i, $arg) = each($args))'
    $pattern = '/while\s*\(\s*list\(([^,]+),\s*([^,]+)\)\s*=\s*each\(([^)]+)\)\s*\)\s*\{/';

    foreach ($files as $file) {
        $originalContent = file_get_contents($file);
        $updatedContent = preg_replace_callback($pattern, function ($matches) {
            // Variables de la coincidencia
            $indexVar = $matches[1];
            $valueVar = $matches[2];
            $arrayVar = $matches[3];

            // Genera el código 'foreach' de reemplazo
            return "foreach ($arrayVar as $indexVar => $valueVar) {";
        }, $originalContent);

        // Crea una copia de seguridad del archivo original
        //file_put_contents($file . '.bak', $originalContent);

        // Escribe el contenido actualizado en el archivo original
        file_put_contents($file, $updatedContent);

        echo "Reemplazos realizados en: $file\n";
    }    
    
  
    
}// end replace_foreach

function replace_eregi_pregmatch(){
               
    // Define el directorio donde se encuentran los archivos PHP
    $directory = __DIR__ . '/';

    // Busca todos los archivos PHP en el directorio
    $files = glob($directory . '/*.php');

    // Patrón para encontrar 'eregi()'
    $pattern = '/eregi\s*\(\s*([\'"])(.*?)\1\s*,\s*(.*?)\s*\)/';

    foreach ($files as $file) {
        $originalContent = file_get_contents($file);
        $updatedContent = preg_replace_callback($pattern, function ($matches) {
            // $matches[2] es el patrón y $matches[3] es la cadena
            $pattern = $matches[2];
            $string = $matches[3];

            // Genera el código 'preg_match()' de reemplazo
            return "preg_match('/" . preg_quote($pattern, '/') . "/i', $string)";
        }, $originalContent);

        // Crea una copia de seguridad del archivo original
        //file_put_contents($file . '.bak', $originalContent);

        // Escribe el contenido actualizado en el archivo original
        file_put_contents($file, $updatedContent);

        echo "Reemplazos realizados en: $file\n";
    }
    
    
}

function replace_preg_replace(){

    // Define el directorio donde se encuentran los archivos PHP
    $directory = __DIR__ . '/';

    // Busca todos los archivos PHP en el directorio
    $files = glob($directory . '/*.php');

    // Patrón para encontrar 'preg_replace()' con el modificador '/e'
    $pattern = '/preg_replace\(\s*(\/.*?\/e)\s*,\s*(.*?),\s*(.*?)\s*\)/';

    foreach ($files as $file) {
        $originalContent = file_get_contents($file);
        $updatedContent = preg_replace_callback($pattern, function ($matches) {
            // Extrae el patrón, la cadena de reemplazo y el sujeto
            $pattern = $matches[1];
            $replacement = trim($matches[2], '"'); // Quitar las comillas
            $subject = $matches[3];

            // Genera el código 'preg_replace_callback()' de reemplazo
            return "preg_replace_callback($pattern, function (\$matches) { return $replacement; }, $subject)";
        }, $originalContent);

        // Crea una copia de seguridad del archivo original
        file_put_contents($file . '.bak', $originalContent);

        // Escribe el contenido actualizado en el archivo original
        file_put_contents($file, $updatedContent);

        echo "Reemplazos realizados en: $file\n";
    }
 
    
}

//replace_foreach();

//replace_eregi_pregmatch();

replace_preg_replace();

echo '   HOla mundo';


