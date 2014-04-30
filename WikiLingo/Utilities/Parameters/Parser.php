<?php
namespace WikiLingo\Utilities\Parameters;

/**
 * Class Parser
 * @package WikiLingo\Utilities\Parameters
 */
class Parser extends Definition
{

    public $verbose = false;
    public $lexerErrors = array();
    public $parserErrors = array();

    public function lexerError($str = "", LexerError $hash = null)
    {
        $this->lexerErrors[] = $str;
        if ($this->verbose) {
            parent::lexerError($str, $hash);
        }
    }

    public function parseError($str = "", ParserError $hash = null)
    {
        $this->parserErrors[] = $str;
        if ($this->verbose) {
            parent::parseError($str, $hash);
        }
    }
}