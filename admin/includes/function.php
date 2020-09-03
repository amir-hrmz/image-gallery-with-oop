<?php

function __autoload($class){
    $class = strtolower($class);
    $path = INCLUDE_PATH.$class.".php";

    if (file_exists($path))
    {
        require_once $path;
    }else
    {
        echo "there is no $class class";
    }
}
