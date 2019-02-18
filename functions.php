<?php

spl_autoload_register(function ($name_class_all) {
    $name_class_mas = explode('\\',  $name_class_all);
    $name_class = end($name_class_mas);

    $path_class = realpath(get_template_directory() . "/class/" . $name_class . ".php");

    if (file_exists($path_class)) {
        require_once $path_class;
    }
});


$mobile = new MobileCategory\Mobile();