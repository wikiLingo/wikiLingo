<?php
namespace WikiLingo\Expression;
use WikiLingo;

/**
 * Class Content
 * @package WikiLingo\Expression
 */
class Content extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
	{
		return $this->parsed->text;
	}
}