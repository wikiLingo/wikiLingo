<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

/**
 * Class Content
 * @package WYSIWYGWikiLingo\Expression
 */
class Content extends Base
{
    public $isStatic = true;

    /**
     * @param $renderer
     * @param $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
	{
		if ($this->isHelper) {
			return '';
		} else if ($this->isStatic) {
			return $this->parsed->text . $this->renderedChildren . (isset($this->closing->text) ? $this->closing->text : '');
		}

		return parent::render($renderer, $parser);
	}
}