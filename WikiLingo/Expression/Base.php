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
     * @var int
     */
    public $index = -1;

    /**
     * @var string
     */
    public $type = '';

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
        $parsed->parser->addType($this);
    }

    function id()
    {
        return $this->type . $this->index;
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