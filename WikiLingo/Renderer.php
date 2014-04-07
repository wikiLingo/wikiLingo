<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/28/14
 * Time: 8:12 PM
 */

namespace WikiLingo;

use WikiLingo;

/**
 * Class Renderer
 * @package WikiLingo
 */
class Renderer
{
    public $parser;

    /**
     * @var function[]
     */
    public $expressionManipulator = array();

    /**
     * @param WikiLingo\Parser $parser
     */
    public function __construct(&$parser)
    {
        $this->parser =& $parser;
    }
    /**
     * @param WikiLingo\Parsed $parsed
     * @return string
     */
    public function render($parsed)
    {
        if (isset($this->parser->events))
        {
            $this->parser->events
                ->triggerParsedRenderPermission($parsed);
        }

        if (!$parsed->expressionPermissible) {
            if (isset($this->stateEnd)) {
                $syntax = $this->parser->syntax($parsed->loc, $this->stateEnd->loc);
            } else {
                $syntax = $this->parser->syntax($parsed->loc);
            }
            $this->parser->events
                ->triggerParsedRenderBlocked($parsed, $syntax);
            return $syntax;
        }

        if (isset($this->expressionManipulator[$parsed->expressionType])) {
            $this->expressionManipulator[$parsed->expressionType]($parsed->expression);
        }

        if ($parsed->expression === null)
        {
            return '';
        }

        $expression = $parsed->expression;


        if (!$this->parser->allowsMutation && method_exists($expression, 'preRender')) {
            $expression->preRender($this);
        }

        if ($expression->isVariableContext) {
            $this->parser->variableContextStack[] = $expression->variables();
        }

        //iterations are allowed, but not in edit mode
        $iterations = (!isset($this->parser->wysiwyg) || $this->parser->wysiwyg == true ? 0 : $expression->iterations);
        $result = '';
        $variableContext = (isset($this->parser->variableContextStack) ? end($this->parser->variableContextStack) : false);
        if ($variableContext) {
            $expression->setVariableContext($variableContext);
        }


        //children are directly part of the family as a visible child
        $renderedChildren = '';
        if ($parsed->childrenLength > 0) {
            //Expressions can repeat if they are needed
            for($i = 0; $i <= $iterations; $i++)
            {
                //detect if it is a syntax parent
                $addedDepth = 0;
                if (
                    isset($expression->isParent)
                    && ($isParent = $expression->isParent) == true) {
                    $addedDepth = 1;
                }

                foreach ($parsed->children as &$child) {
                    $child->depth += $parsed->depth + $addedDepth;
                    $renderedChildren .= $this->render($child);
                }
            }
        }

        $renderedCousins = '';
        foreach ($parsed->cousins as &$cousin) {
            $renderedCousins .= $this->render($cousin);
        }

        $expression->renderedChildren =& $renderedChildren;
        if (isset($expression) && method_exists($expression, 'render')) {
            $rendered = $expression->render($this, $this->parser);
        } else {
            $rendered = '';
        }

        //siblings are directly part of the family as a visible sibling
        $renderedSiblings = '';
        foreach ($parsed->siblings as &$sibling) {
            $renderedSiblings .= $this->render($sibling);
            if ($parsed->parent != null) {
                $parsed->parent->children[] =& $sibling;
            }
        }

        $renderedLines = '';
        foreach ($parsed->lines as &$line) {
            $renderedLines .= $this->render($line);
        }

        $result .= $rendered . $renderedSiblings . $renderedLines . $renderedCousins;

        if ($expression->isVariableContext) {
            array_pop($this->parser->variableContextStack);
        }

        if ($this->parser->allowsMutation && method_exists($expression, 'postRender')) {
            $expression->postRender($this);
        }

        return $result;
    }

    function element($type, $name)
    {
        return new Renderer\Element($type, $name);
    }

    function helper($name)
    {
        return new Renderer\Helper($name);
    }
} 