<?php
namespace WikiLingo\Utilities;

class Scripts
{
    public static $cssLocations = array();
	public static $css = array();

    public static $scriptLocations = array();
    public static $scripts = array();

    public static $existingScriptsAndLocations = array();

	public function addCss( $css, $i = -1 )
	{
		if (isset(self::$existingScriptsAndLocations[$css])) {
			return $this;
		}

		if ($i > -1) {
			self::$css[$i] = $css;
		} else {
			self::$css[] = $css;
		}

		self::$existingScriptsAndLocations[$css] = true;

		return $this;
	}

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

        return $css . (empty(self::$css) ? "" : "<style>" . implode(self::$css) . "</style>");
    }

    public function renderScript()
    {
        $scriptLocations = '';

        foreach (self::$scriptLocations as $location) {
            $scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
        }

        return $scriptLocations . (empty(self::$scripts) ? "" : "<script type='text/javascript'>" . implode(self::$scripts) . "</script>");
    }
}