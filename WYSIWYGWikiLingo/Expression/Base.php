<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use Types\Type;

/**
 * Class Base
 * @package WYSIWYGWikiLingo\Expression
 */
abstract class Base extends WikiLingo\Expression\Content
{
    public $parameters = array();
    public $isHelper = false;
    public $isElement = false;
    public $isStatic = false;
	public $children = array();

    /**
     * @param $renderer
     * @param $parser
     * @return mixed|string
     * @throws \Exception
     */
    public function render(&$renderer, &$parser)
    {

        if ($this->isElement) {
            $longTypeName = $this->parameter('data-type');
            if (!empty($longTypeName)) {
                $typeName = Type::classNameSimple($longTypeName);
                $typeClass = 'WYSIWYGWikiLingo\SyntaxGenerator\\' . $typeName;
                if (class_exists($typeClass))
                {
                    $type = new $typeClass($parser, $this);
                    $generated = $type->generate();
                    return $generated;
                } else {
                    throw new \Exception("Type '" . $typeClass . "' not found");
                }
            }
        }

        if ($this->isHelper) {
            return '';
        }

        return $this->parsed->text;
    }

    /**
     * @param $parameter
     * @return string
     */
    public function parameter($parameter)
	{
		if(isset($this->parameters[$parameter])) {
			return $this->parameters[$parameter];
		}

		return '';
	}
}