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
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
	{
		return $this->parsed->text;
	}
}