<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Variable
 * @package WikiLingo\Expression
 */
class Variable extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
	{
		$element = $renderer->element(__CLASS__, 'span');
		$key = $element->detailedAttributes["key"] = substr($this->parsed->text, 1, -1);
        $set = false;

		if (empty($this->variableContext)) {
            $parser->events->triggerExpressionVariableLookup($key, $element, $this);
            $set = true;
        }

        else {
	        $i = $parser->variableContextStack->last()->i;
            if (isset($this->variableContext[$i]) && isset($this->variableContext[$i][$key])) {
                $element->staticChildren[] = $this->variableContext[$i][$key];
                $set = true;
            }
        }

        if ($set === false) {
            $element->staticChildren[] = $key;
        }

		return $element->render();
	}
}