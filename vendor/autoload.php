<?php

function __autoload($class) {

    $filepath = ROOT .'\\'. $class . '.php';

    if(!file_exists( $filepath )) {
        trigger_error("Не удалось загрузить класс файл не найден: $filepath", E_USER_WARNING);
    }

    require_once $filepath;

    if(!class_exists($class)) {
        if(trait_exists( $class )) {
            return;
        } else {
            trigger_error("Не удалось загрузить класс: $class", E_USER_WARNING);
        }
    }
}
spl_autoload_register('__autoload');