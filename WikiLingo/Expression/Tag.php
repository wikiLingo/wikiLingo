<?php

namespace WikiLingo\Expression;
use WikiLingo;

class Tag extends Base
{
    public $name;
    public $close = false;

	public static $notAllowed = array(
		'script' => true
	);

	public static $ignoresNextLine = array(
		'hr' => true,
		'br' => true,
        'div' => true
	);

	public static $allowedBlock = array(
		'h1' => true,
		'h2' => true,
		'h3' => true,
		'h4' => true,
		'h5' => true,
		'h6' => true,
		'pre' => true,
		'ul' => true,
		'li' => true,
		'dl' => true,
		'div' => true,
		'table' => true,
		'p' => true
	);

	function __construct(WikiLingo\Parsed &$parsed)
	{
        $parts = preg_split("/[ >]/", substr($parsed->text, 1)); //<tag> || <tag name="">
        $name = $parts[0];
        if ($name{0} == '/') {
            $this->name = substr($name, 1);
            $this->close = true;
        } else {
            $this->name = $name;
        }

		parent::__construct($parsed);
	}

	function render(&$parser)
	{
        if (isset(self::$allowedBlock[$this->name]) && self::$allowedBlock[$this->name]) {
		    return $this->parsed->text;
        } else {
            return '';
        }
	}
}