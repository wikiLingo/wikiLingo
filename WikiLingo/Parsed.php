<?php
/**
 * @namespace
 */
namespace WikiLingo;

use WikiLingo;
use Exception;

/**
 * Class Parsed
 * @package WikiLingo
 */
class Parsed extends ParserValue
{
    /**
     * @var string
     */
    public $type;
    public $render;

    /**
     * @var Parsed[]
     */
    public $arguments = array();

    /**
     * @var array
     */
    public $options = array();

    /**
     * @var Parsed
     */
    public $parent;

    /**
     * @var Parsed[]
     */
    public $children = array();
    public $childrenLength = 0;

    /**
     * @var Parsed[]
     */
    public $siblings = array();
    public $siblingsLength = 0;

    /**
     * @var Parsed
     */
    public $firstSibling;
    public $siblingIndex = 0;
    public $lineIndex = 0;
    public $lineLength = 0;

    /**
     * @var WikiLingo\Parsed[]
     */
    public $cousins = array();
    public $cousinsCount = 0;

    /**
     * @var Parsed[]
     */
    public $lines = array();

    /**
     * @var WikiLingo\Expression\Base
     */
    public $expression;
    public $expressionType;
    public $expressionPermissible = true;

    /**
     * @var WikiLingo\Parser
     */
    public $parser;
    public $stateEnd;
	public $depth = 0;
	public static $throwExceptions = true;

    /**
     * @param Parsed $line
     */
    public function addLine(Parsed &$line)
	{
        $this->lineLength++;
        $line->lineIndex = $this->lineLength;

        $line->parent =& $this;
		$this->lines[$this->lineLength] =& $line;
	}

    /**
     * @return null|Parsed
     */
    public function previousLine()
    {
        $lineIndex = $this->lineIndex - 1;
        if ($lineIndex == 0) {
            return null;
        }
        $line = $this->parent->lines[$lineIndex];
        return $line;
    }

    /**
     * @return null|Parsed
     */
    public function nextLine()
    {
        $lineIndex = $this->lineIndex + 1;
        if ($lineIndex > $this->parent->lineLength) {
            return null;
        }
        $line = $this->parent->lines[$lineIndex];
        return $line;
    }

    /**
     * @param Parsed $sibling
     */
    public function addContent(Parsed &$sibling)
	{
        $this->siblingsLength++;
        $sibling->siblingIndex = $this->siblingsLength;

        $this->siblings[] =& $sibling;
		$sibling->firstSibling =& $this;
	}

    /**
     * @return null|Parsed
     */
    public function previousSibling()
    {
        $siblingIndex = $this->siblingIndex - 1;
        if ($siblingIndex < 0) {
            return null;
        }

	    if (isset($this->parent->children[$siblingIndex])) {
		    return $this->parent->children[$siblingIndex];
	    }

	    if ($siblingIndex == 0) {
		    return $this->firstSibling;
	    }

	    if (isset($this->firstSibling->siblings[$siblingIndex - 1])) {
            return $this->firstSibling->siblings[$siblingIndex - 1];
	    }

	    return null;
    }

    /**
     * @return null|Parsed
     */
    public function nextSibling()
    {
        $siblingIndex = $this->siblingIndex + 1;
        if ($siblingIndex > $this->parent->siblingsLength) {
            return null;
        }
        return $this->siblings[$siblingIndex];
    }

    /**
     * @param Parsed $argument
     */
    public function addArgument(Parsed &$argument)
	{
		$this->arguments[] =& $argument;
	}

    /**
     * @param String $type
     * @param $parser
     */
    public function setType($type, &$parser)
	{
		$this->type = $type;
        $this->parser =& $parser;
        $this->setExpression();
	}

    /**
     * @param $key
     * @param $value
     */
    public function setOption($key, $value)
	{
		$this->options[$key] = $value;
	}


    /**
     * @param Parsed $parent
     */
    public function setParent(Parsed &$parent)
	{
		$parent->addChild($this);

        foreach($this->siblings as &$sibling) {
            //just to be sure
            if ($sibling != null) {
                $sibling->setParent($parent);
            }
	        array_shift($this->siblings);
        }
	}

    /**
     * @param Parsed $child
     */
    public function addChild(Parsed &$child)
	{
		$child->parent =& $this;
		$this->children[] =& $child;
		$this->childrenLength++;
	}

    /**
     *
     */
    public function removeChildren()
    {
        $this->children = array();
	    $this->childrenLength = 0;
    }

    /**
     *
     */
    public function setExpression()
    {
        $this->parser->expressionInstantiator->set($this);
    }



    /**
     * @param Parsed $cousin
     */
    public function addCousin(Parsed &$cousin)
	{
		$this->cousins[] =& $cousin;
		$this->cousinsCount++;
	}
}