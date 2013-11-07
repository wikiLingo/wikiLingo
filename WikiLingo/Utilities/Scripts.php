<?php
namespace WikiLingo\Utilities;

class Scripts
{
    public $cssLocations = array();
	public $css = array();

    public $scriptLocations = array();
    public $scripts = array();

    public $existingScriptsAndLocations = array();

	public function addCss( $css, $i = -1 )
	{
		if (isset($this->existingScriptsAndLocations[$css])) {
			return $this;
		}

		if ($i > -1) {
            $this->css[$i] = $css;
		} else {
            $this->css[] = $css;
		}

        $this->existingScriptsAndLocations[$css] = true;

		return $this;
	}

    public function addCssLocation( $href, $i = -1 )
    {
        if (isset($this->existingScriptsAndLocations[$href])) {
            return $this;
        }

        if ($i > -1) {
            $this->cssLocations[$i] = $href;
        } else {
            $this->cssLocations[] = $href;
        }

        $this->existingScriptsAndLocations[$href] = true;

        return $this;
    }

    public function addScriptLocation( $src, $i = -1 )
    {
        if (isset($this->existingScriptsAndLocations[$src])) {
            return $this;
        }

        if ($i > -1) {
            $this->scriptLocations[$i] = $src;
        } else {
            $this->scriptLocations[] = $src;
        }

        $this->existingScriptsAndLocations[$src] = true;

        return $this;
    }

    public function addScript( $script, $i = -1 )
    {
        if (isset($this->existingScriptsAndLocations[$script])) {
            return $this;
        }

        if ($i > -1) {
            $this->scripts[$i] = $script;
        } else {
            $this->scripts[] = $script;
        }

        $this->existingScriptsAndLocations[$script] = true;

        return $this;
    }

    public function renderCss()
    {
        $css = '';

        foreach ($this->cssLocations as $location) {
            $css .= "<link rel='stylesheet' type='text/css' href='" . $location . "' />";
        }

        return $css . (empty($this->css) ? "" : "<style>" . implode($this->css) . "</style>");
    }

    public function renderScript()
    {
        $scriptLocations = '';

        foreach ($this->scriptLocations as $location) {
            $scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
        }

        return $scriptLocations . (empty($this->scripts) ? "" : "<script type='text/javascript'>" . implode($this->scripts) . "</script>");
    }
}