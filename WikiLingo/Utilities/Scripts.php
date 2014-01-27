<?php
namespace WikiLingo\Utilities;

/**
 * Class Scripts
 * @package WikiLingo\Utilities
 */
class Scripts
{
    public $cssLocations = array();
	public $css = array();

    public $scriptLocations = array();
    public $scripts = array();

    public $existingScriptsAndLocations = array();
    public $relativeLocation = '';

    public function __construct($relativeLocation = '')
    {
        $this->relativeLocation = $relativeLocation;
    }

    /**
     * @param String $css
     * @param Number [$i]
     * @return $this
     */
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

    /**
     * @param String $href
     * @param Number [$i]
     * @return $this
     */
    public function addCssLocation( $href, $i = -1 )
    {
        if (isset($this->existingScriptsAndLocations[$href])) {
            return $this;
        }

        if ($href{0} === '~' && $href{1} === '/') {
            $href = $this->relativeLocation . substr($href, 2);
        }

        if ($i > -1) {
            $this->cssLocations[$i] = $href;
        } else {
            $this->cssLocations[] = $href;
        }

        $this->existingScriptsAndLocations[$href] = true;

        return $this;
    }

    /**
     * @param String $src
     * @param Number [$i]
     * @return $this
     */
    public function addScriptLocation( $src, $i = -1 )
    {
        if (isset($this->existingScriptsAndLocations[$src])) {
            return $this;
        }

        if ($src{0} === '~' && $src{1} === '/') {
            $src = $this->relativeLocation . substr($src, 2);
        }

        if ($i > -1) {
            $this->scriptLocations[$i] = $src;
        } else {
            $this->scriptLocations[] = $src;
        }

        $this->existingScriptsAndLocations[$src] = true;

        return $this;
    }

    /**
     * @param String $script
     * @param Number [$i]
     * @return $this
     */
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

    /**
     * @return string
     */
    public function renderCss()
    {
        $css = '';

        foreach ($this->cssLocations as $location) {
            $css .= "<link rel='stylesheet' type='text/css' href='" . $location . "' />";
        }

        return $css . (empty($this->css) ? "" : "<style>" . implode($this->css) . "</style>");
    }

    /**
     * @return string
     */
    public function renderScript()
    {
        $scriptLocations = '';

        foreach ($this->scriptLocations as $location) {
            $scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
        }

        return $scriptLocations . (empty($this->scripts) ? "" : "<script type='text/javascript'>" . implode($this->scripts) . "</script>");
    }
}