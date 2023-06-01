<?php


function myAutoLoaderMain($class_name)
{
    $path = "./classes/";
    $extension = ".class.php";
    $full_path = $path . $class_name . $extension;
    if (!file_exists($full_path)) {
        return false;
    }
    include_once $full_path;
}

function myAutoLoader($class_name)
{
    $path = "../classes/";
    $extension = ".class.php";
    $full_path = $path . $class_name . $extension;
    if (!file_exists($full_path)) {
        return false;
    }
    include_once $full_path;
}
