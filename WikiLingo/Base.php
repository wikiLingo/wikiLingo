<?php
namespace WikiLingo;

use Exception;
use WikiLingo\Renderer;

/**
 * Class Base
 * @package WikiLingo
 */
abstract class Base
{
    /* type tracking */
    /**
     * @var Expression\*[]
     */
    public $types = array();
    /**
     * @var array
     */
    public $typesCount = array();

    /**
     * @var bool
     */
    public $skipExpressions = false;

    /**
     * @var Events
     */
    public $events;

    /* plugin tracking */
    public $pluginStack = array();
    public $pluginStackCount = 0;
    public $pluginInstances = array();

    /**
     * @var Plugin\*[]
     */
    public $plugins = array();

    /**
     * @var string
     */
    public $originalInput = '';

    /**
     * variable context stack
     * @var array[array[]]
     */
    public $variableContextStack = array();

    /* link tracking*/
    public $linkStack = false; //There can only be 1 active link stack

    /**
     * @var Expression\Block[]
     */
    public $blocks = array();
	public $blocksLength = 0;

    public $tableStack = array();

    public $allowsMutation = true;
    public $verbose = false;
    /**
     * @param WikiLingo\Expression\* &$type
     * @return Number
     */
    public function addType(&$type)
    {
        $class = get_class($type);
        if (empty($this->types[$class])) {
            $this->types[$class] = array();
            $this->typesCount[$class] = -1;
        }
        $this->types[$class][] =& $type;
        $this->typesCount[$class]++;
        $classNameShort = explode('\\', $class);
        $type->type = array_pop($classNameShort);
        return $type->index = $this->typesCount[$class];
    }

    /**
     * Clears all expression types
     */
    public function clearTypes()
    {
        $this->types = array();
        $this->typesCount = array();
	    Expression\Plugin::$indexes = array();
    }

    /**
     * Stacks plugins for execution, since plugins can be called within each other.
     * @param String $name
     */
    public function stackPlugin($name)
    {
        $this->pluginStackCount++;
	    $this->pluginStack[] = substr($name, 1, -1);
    }

    /**
     * Detects if we are in a state that we can call the lexed grammer 'content'.  Since the execution technique from
     * the parser is inside-out, this helps us reverse the execution from outside-in in some cases.
     *
     * @access  public
     * @param   array  $skipTypes
     * @return  string  true if content is current not parse-able
     */
    public function isContent($skipTypes = array())
    {
        //These types will be found in $this.  If any of these states are active, we should NOT parse wiki syntax
        $types = array(
            'linkStack' => true
        );

        foreach ($skipTypes as $skipType) {
            if (isset($types[$skipType])) {
                unset($types[$skipType]);
            }
        }

        //second, if we are not in a plugin, check if we are in content, ie, non-parse-able wiki syntax
        foreach ($types as $type => $value) {
            if ($this->$type == $value) {
                return true;
            }
        }

        //lastly, if we are not in content, return null, which allows cases to continue lexing
        return null;
    }

    /**
     * @param ParserLocation $startLoc
     * @param ParserLocation $endLoc
     * @return string
     */
    function syntax(ParserLocation $startLoc, ParserLocation $endLoc = null)
    {
        $firstLine = $startLoc->firstLine;
        $lastLine = (isset($endLoc) ? $endLoc->lastLine : $startLoc->lastLine);
        $firstColumn = $startLoc->firstColumn;
        $lastColumn = (isset($endLoc) ? $endLoc->lastColumn : $startLoc->lastColumn);

        $input = $this->originalInput;

        if ($firstLine == $lastLine) {
            $text = $input[$firstLine - 1];
            $fromEnd = -(strlen($text) - $lastColumn);
            $syntax = substr($text, $firstColumn, $fromEnd);
            return $syntax;
        } else {
            $syntax = '';
            for ($i = $firstLine; $i <= $lastLine; $i++) {
                if ($i == $firstLine) { //first line
                    $syntax .= substr($input[$i - 1], $firstColumn);

                } else if ($i == $lastLine) {//last line
                    $syntax .= substr($input[$i - 1], 0, $lastColumn);

                } else {//lines in between
                    $syntax .= $input[$i - 1];
                }
            }

            return $syntax;
        }
    }

    /**
     * @param ParserLocation $startLoc
     * @param ParserLocation $endLoc
     * @return string
     */
    public function syntaxBetween(ParserLocation $startLoc, ParserLocation $endLoc)
    {
        $firstLine = $startLoc->lastLine;
        $lastLine = $endLoc->firstLine;
        $firstColumn = $startLoc->lastColumn;
        $lastColumn = $endLoc->firstColumn;

        $input = $this->originalInput;

        if ($firstLine == $lastLine) {
            $text = $input[$firstLine - 1];
            $fromEnd = -(strlen($text) - $lastColumn);
            $syntax = substr($text, $firstColumn, $fromEnd);
            return $syntax;
        } else {
            $syntax = '';
            for ($i = $firstLine; $i <= $lastLine; $i++) {
                if ($i == $firstLine) { //first line
                    $syntax .= substr($input[$i - 1], $firstColumn);

                } else if ($i == $lastLine) {//last line
                    $syntax .= substr($input[$i - 1], 0, $lastColumn);

                } else {//lines in between
                    $syntax .= $input[$i - 1];
                }
            }

            return $syntax;
        }
    }

    function removeEOF( &$output )
    {
        $output = str_replace("≤REAL_EOF≥", "", $output);
    }
}