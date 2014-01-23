<?php
namespace WikiLingo\Expression;

/**
 * Class NoParse
 * @package WikiLingo\Expression
 */
class NoParse extends Base
{
    /**
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		if ($parser->wysiwyg) {
			$element = $parser->element(__CLASS__, 'span');
			$element->staticChildren[] = $this->parsed->text;
			return $element->render();
		}
		return $this->parsed->text;
	}
}