<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

abstract class Base extends WikiLingo\Expression\Content
{
    public $parameters = array();
    public $isHelper = false;
    public $isElement = false;
    public $isStatic = false;
	public $children = array();

    public function render(&$parser)
    {

        if ($this->isElement) {
            $longTypeName = $this->parameter('data-type');
            if (isset($longTypeName)) {
                $typeName = WikiLingo\Utilities\Type::normalize($longTypeName);
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

	public function parameter($parameter)
	{
		if(isset($this->parameters[$parameter])) {
			return $this->parameters[$parameter];
		}

		return '';
	}
}