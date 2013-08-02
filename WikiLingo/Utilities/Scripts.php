<?php
namespace WikiLingo\Utilities;

class Scripts
{
    public static $cssLocations = array();
    public static $scriptLocations = array();
    public static $scripts = array();
    public static $existingScriptsAndLocations = array();

    public function addCssLocation( $href, $i = -1 )
    {
        if (isset(self::$existingScriptsAndLocations[$href])) {
            return $this;
        }

        if ($i > -1) {
            self::$cssLocations[$i] = $href;
        } else {
            self::$cssLocations[] = $href;
        }

        self::$existingScriptsAndLocations[$href] = true;

        return $this;
    }

    public function addScriptLocation( $src, $i = -1 )
    {
        if (isset(self::$existingScriptsAndLocations[$src])) {
            return $this;
        }

        if ($i > -1) {
            self::$scriptLocations[$i] = $src;
        } else {
            self::$scriptLocations[] = $src;
        }

        self::$existingScriptsAndLocations[$src] = true;

        return $this;
    }

    public function addScript( $script, $i = -1 )
    {
        if (isset(self::$existingScriptsAndLocations[$script])) {
            return $this;
        }

        if ($i > -1) {
            self::$scripts[$i] = $script;
        } else {
            self::$scripts[] = $script;
        }

        self::$existingScriptsAndLocations[$script] = true;

        return $this;
    }

    public function renderCss()
    {
        $css = '';
        foreach (self::$cssLocations as $location) {
            $css .= "<link rel='stylesheet' type='text/css' href='" . $location . "' />";
        }
        return $css;
    }

    public function renderScript()
    {
        $scriptLocations = '';

        foreach (self::$scriptLocations as $location) {
            $scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
        }

        $scripts = "";
        foreach (self::$scripts as $script) {
            $scripts .=  $script;
        }


        return $scriptLocations . "<script type='text/javascript'>" . $scripts . "</script>";
    }
}