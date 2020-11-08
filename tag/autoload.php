<?php

const ROOT = 'ItStep\PHP';


spl_autoload_register(function ($name){
    $namespace = trim(ROOT, '\\');
    $dir = __DIR__ .'/classes';
    $file = str_replace($namespace, $dir, $name);
    $file = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $file);
    $file .= ".php";

    if (file_exists($file))
        require_once $file;
});
