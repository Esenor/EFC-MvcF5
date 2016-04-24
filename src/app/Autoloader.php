<?php


/**
 * @author David Dieu <daviddieu80@gmail.com>
 */
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        $parts = explode('\\', $class);

        // extract (and remove) the last entry in array
        $class_name = array_pop($parts);

        // Build path with the good directory separator
        $path = implode(DIRECTORY_SEPARATOR, $parts);

        $file = $class_name . '.php';

        $filepath = ROOT . strtolower($path) . DIRECTORY_SEPARATOR . $file;

        require_once $filepath;
    }
}
