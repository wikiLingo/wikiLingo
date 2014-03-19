<?php
/**
 * @namespace
 */
namespace WikiLingo;

use Exception;
use Types\Type;

/**
 * Class Parsed
 * @package WikiLingo
 */
class Parsed extends ParserValue
{
	public $type;
    public $render;
	public $firstSibling;
    public $siblingIndex = 0;
    public $siblingsLength = 0;
    public $lineIndex = 0;
    public $lineLength = 0;
    public $parser;
    public $stateEnd;
	public $depth = 0;
	public static $throwExceptions = true;




	public $lines = array();

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




	public $siblings = array();

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
		    return Type::Parsed($this->parent->children[$siblingIndex]);
	    }

	    if ($siblingIndex == 0) {
		    return Type::Parsed($this->firstSibling);
	    }

	    if (isset($this->firstSibling->siblings[$siblingIndex - 1])) {
            return Type::Parsed($this->firstSibling->siblings[$siblingIndex - 1]);
	    }

	    return null;
    }

    /**
     * @return null|Parsed
     */
    public function nextSibling()
    {
        $siblingIndex = $this->siblingIndex + 1;
        if ($siblingIndex > $this->parent->siblingLength) {
            return null;
        }
        return Type::Parsed($this->siblings[$siblingIndex]);
    }




	public $arguments = array();

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



	public $options = array();

    /**
     * @param $key
     * @param $value
     */
    public function setOption($key, $value)
	{
		$this->options[$key] = $value;
	}



	public $parent;

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


	public $children = array();
	public $childrenLength = 0;

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

    public $expression;
    public $expressionPermissible = true;

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

	public $cousins = array();
	public $cousinsCount = 0;

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
		    Type::Events($this->parser->events)
			    ->triggerParsedRenderPermission($this);
        }

		if (!$this->expressionPermissible) {
			if (isset($this->stateEnd)) {
				$syntax = $this->parser->syntax($this->loc, $this->stateEnd->loc);
			} else {
				$syntax = $this->parser->syntax($this->loc);
			}
			Type::Events($this->parser->events)
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
            $renderedCousins .= $cousin->render();
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