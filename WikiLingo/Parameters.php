<?php

class WikiLingo_Parameters extends WikiLingo_Parameters_Definition
{
    static $activePluginId;
    static $parameters = array();

    public static function add($name, $value)
    {
        if (!isset(self::$parameters[self::$activePluginId]))
        {
            self::$parameters[self::$activePluginId] = array();
        }
        self::$parameters[self::$activePluginId][$name] = $value;
    }

    public static function get()
    {
        return self::$parameters[self::$activePluginId];
    }

    public static function setActivePluginId($activePluginId)
    {
        self::$activePluginId = $activePluginId;
    }
}