<?php

namespace WikiLingo\Expression;
use WikiLingo;
use Types\Type;

class Tag extends Base
{
    public $name;
    public $close = false;
    public $allowed = true;

	public static $notAllowed = array(
		'script' => true
	);

	public static $ignoresNextLine = array(
		'hr' => true,
		'br' => true,
        'div' => true
	);

	function __construct(WikiLingo\Parsed &$parsed)
	{
        $this->parsed =& $parsed;
        $parts = preg_split("/[ >]/", substr($parsed->text, 1)); //<tag> || <tag name="">
        $name = $parts[0];
        if ($name{0} == '/') {
            $this->name = substr($name, 1);
            $this->close = true;
        } else {
            $this->name = $name;
        }

        if (isset(self::$notAllowed[$this->name]) && self::$notAllowed[$this->name]) {
            $this->allowed = false;
        }

        Type::Events($parsed->parser->events)->triggerExpressionTagAllowed($this);

		parent::__construct($parsed);
	}

	function render(&$parser)
	{
        if ($this->allowed) {
		    return $this->parsed->text;
        } else {
            if (isset($parser->wysiwyg)) {
                $element = $parser->element(__CLASS__, "code");
                $element->staticChildren[] = htmlspecialchars($this->parsed->text);
                return $element->render();
            }

            return htmlspecialchars($this->parsed->text);
        }
	}
}