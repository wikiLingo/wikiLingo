<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/7/14
 * Time: 4:23 PM
 */

namespace WikiLingo\Utilities;


class AutoLoader
{
    public static $Directories = array();

    public static function load($class)
    {
        if (!class_exists($class)) {
            $root = dirname(dirname(dirname(__FILE__)));
            $fileName = str_replace('\\', '/', $class) . '.php';
            $file = $root . "/" . $fileName;
            if (file_exists($file)) {
                include $file;
                return true;
            }

            foreach (self::$Directories as $directory) {
                $file = $directory . "/" . $fileName;
                if (file_exists($file)) {
                    include $file;
                    return true;
                }
            }

            return false;
        }

        return true;
    }
}

$dir = dirname(dirname(__FILE__)) . "/Expression/PastLink/";
AutoLoader::$Directories[] = $dir . "FLP";
AutoLoader::$Directories[] = $dir . "Phraser";