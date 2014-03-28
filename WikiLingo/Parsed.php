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
     * @var WikiLingo\Expression\Base[]
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
            $sibling->setParent($parent);
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
        if ($this->parser->skipExpressions == false) {
            $class = "WikiLingo\\Expression\\$this->type";
            if (class_exists($class)) {
                $expression = new $class($this);
                if ($expression) {
                    $this->expression =& $expression;
                }
            } else if (self::$throwExceptions) {
                throw new Exception("Type '" . $this->type . "' does not exist in WikiLingo\\Expression namespace.");
            }
        }
    }



    /**
     * @param Parsed $cousin
     */
    public function addCousin(Parsed &$cousin)
	{
		$this->cousins[] =& $cousin;
		$this->cousinsCount++;
	}


    /**
     * @return string
     */
    public function render()
	{
        if (isset($this->parser->events))
        {
		    $this->parser->events
			    ->triggerParsedRenderPermission($this);
        }

		if (!$this->expressionPermissible) {
			if (isset($this->stateEnd)) {
				$syntax = $this->parser->syntax($this->loc, $this->stateEnd->loc);
			} else {
				$syntax = $this->parser->syntax($this->loc);
			}
			$this->parser->events
				->triggerParsedRenderBlocked($this, $syntax);
			return $syntax;
		}

        if ($this->expression->isVariableContext) {
            $this->parser->variableContextStack[] = $this->expression->variables();
        }

        //iterations are allowed, but not in edit mode
        $iterations = (!isset($this->parser->wysiwyg) || $this->parser->wysiwyg == true ? 0 : $this->expression->iterations);
        $result = '';
        $variableContext = (isset($this->parser->variableContextStack) ? end($this->parser->variableContextStack) : false);
        if ($variableContext) {
            $this->expression->setVariableContext($variableContext);
        }


        //children are directly part of the family as a visible child
        $renderedChildren = '';
        if ($this->childrenLength > 0) {
            //Expressions can repeat if they are needed
            for($i = 0; $i <= $iterations; $i++)
            {
                //detect if it is a syntax parent
                $addedDepth = 0;
                if (
                    isset($this->expression->isParent)
                    && ($isParent = $this->expression->isParent) == true) {
                    $addedDepth = 1;
                }

                foreach ($this->children as &$child) {
                    $child->depth += $this->depth + $addedDepth;
                    $renderedChildren .= $child->render();
                }
            }
        }

        $renderedCousins = '';
        foreach ($this->cousins as &$cousin) {
            $renderedCousins .= $cousin->render($this->parser);
        }

        $this->expression->renderedChildren =& $renderedChildren;
        if (isset($this->expression) && method_exists($this->expression, 'render')) {
            $rendered = $this->expression->render($this->parser);
        } else {
            $rendered = '';
        }

        //siblings are directly part of the family as a visible sibling
        $renderedSiblings = '';
        foreach ($this->siblings as &$sibling) {
            $renderedSiblings .= $sibling->render();
            if ($this->parent != null) {
                $this->parent->children[] =& $sibling;
            }
        }

        $renderedLines = '';
        foreach ($this->lines as &$line) {
            $renderedLines .= $this->render($line);
        }

        $result .= $rendered . $renderedSiblings . $renderedLines . $renderedCousins;

        if ($this->expression->isVariableContext) {
            array_pop($this->parser->variableContextStack);
        }

        return $result;
	}
}