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
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, 'span');
		$key = $element->detailedAttributes["key"] = substr($this->parsed->text, 1, -1);
        $set = false;

		if (empty($this->variableContext)) {
            $parser->events->triggerExpressionVariableLookup($key, $element, $this);
            $set = true;
        }

        else {
            if (isset($this->variableContext[$this->i]) && isset($this->variableContext[$this->i][$key])) {
                $element->staticChildren[] = $this->variableContext[$this->i][$key];
                $set = true;
            }
            $this->i++;
        }

        if ($set === false) {
            $element->staticChildren[] = $key;
        }

		return $element->render();
	}
}