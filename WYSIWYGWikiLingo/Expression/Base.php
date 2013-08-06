<?
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

abstract class Base extends WikiLingo\Expression\Content
{
    public $parameters = array();
    public $isHelper = false;
    public $isElement = false;
    public $isStatic = false;

    public function render(&$parser)
    {
        if (!empty($this->parameters['data-type']) && $this->isElement) {

            $longTypeName = $this->parameters['data-type'];
            if (isset($longTypeName)) {
                $typeName = WikiLingo\Utilities\Type::normalize($longTypeName);
                $typeClass = 'WYSIWYGWikiLingo\SyntaxGenerator\\' . $typeName;
                if (class_exists($typeClass))
                {
                    $type = new $typeClass($this, $this);
                    $generated = $type->generate();
                    return $generated;
                }
            }
        }

        if ($this->isHelper) {
            return '';
        }

        return $this->parsed->text;
    }
}