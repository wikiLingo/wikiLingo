<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

/**
 * Class Base
 * @package WikiLingo\Expression
 */
abstract class Base
{
	public $parsed;
	public $allowLines = true;
    public $allowWhiteSpace = true;
	public $allowLineAfter = true;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
	}

    /**
     * @return null|WikiLingo\Parsed
     */
    function parent()
	{
		if (isset($this->parsed->parent)) {
			return Type::Parsed($this->parsed->parent);
		}
		return null;
	}

    /**
     * @var string
     */
    public $renderedChildren = '';

    /**
     * @param $parser
     * @return mixed
     */
    abstract function render(&$parser);

    /**
     * @param $parser
     */
    public function preRender(&$parser)
    {
    }
}