<?php

/**
 * A simple autoload class/function
 * This file should be in the same directory as all other class files
 * Use with `spl_autoload_register(array('Autoloader', 'simple_autoload'));`
 * 
 * @author Fabian Neffgen
 */
class Autoloader{
    public static function simple_autoload($class){
        $path = __DIR__ . '/' . strtolower($class) . '.php';

        if (file_exists($path)) {
          require_once $path;
        }else {
          return false; 
        }
    }
}

?>