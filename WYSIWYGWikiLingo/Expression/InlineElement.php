<?
namespace WYSIWYGWikiLingo\Expression;

use WYSIWYGWikiLingo;
use WikiLingo;

class InlineElement extends WikiLingo\Expression\Content
{
    public static $parameterParser;
    public $parameters = array();

    public $isHelper = false;
    public $isElement = false;
    public $isStatic = false;

    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos !== false) {
            $parametersString = trim(substr($parsed->text, $pos, -2));
            $this->parameters = InlineElement::$parameterParser->parse($parametersString);

            if (isset($this->parameters['class'])) {
                if (strpos($this->parameters['class'], 'wl-element') !== false) {
                    $this->isElement = true;
                } else if (strpos($this->parameters['class'], 'wl-helper') !== false) {
                    $this->isHelper = true;
                } else {
                    $this->isStatic = true;
                }
            }
        }
    }
}


InlineElement::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();