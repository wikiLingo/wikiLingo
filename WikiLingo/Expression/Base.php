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
    public $isVariableContext = false;
    public $iterations = 0;
    public $i = 0;
    public $variableContext;
    public $isParent;

    /**
     * @var int
     */
    public $index = -1;

    /**
     * @var string
     */
    public $type = '';

    /**
     * @var string
     */
    public $renderedChildren = '';

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed $parsed)
	{
		$this->parsed = $parsed;
        $parsed->parser->addType($this);
    }

    /**
     * Expression id  - {type}# (Bold7)
     * @return string
     */
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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    abstract function render($renderer, $parser);

    /**
     * @param int $iterations
     */
    public function setIterations($iterations = 0)
    {
        $this->iterations = $iterations;
    }

    /**
     *
     */
    public function variables()
    {
        return null;
    }

    public function setVariableContext($variableContext)
    {
        $this->variableContext = $variableContext;
    }


    /**
     * @param $expressionTypeShort
     * @return Base[]
     */
    public function children($expressionTypeShort = null)
    {
        $children = array();

        $expressionType = null;

        if ($expressionTypeShort != null) {
            $expressionType = "WikiLingo\\Expression\\" . $expressionTypeShort;
        }

        foreach ($this->parsed->children as $child) {
            if ($expressionType != null) {
                $childClass = get_class($child->expression);
                if ($childClass == $expressionType) {
                    $children[] = $child->expression;
                }
            } else {
                $children[] = $child->expression;
            }
        }

        return $children;
    }
}