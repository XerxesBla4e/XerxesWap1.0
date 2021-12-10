<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $ext = ".class.php";
    $fullpath = $path.strtolower($className).$ext;

    if(!file_exists($fullpath)){
        return false;
    }
    include_once $fullpath;
}

?>