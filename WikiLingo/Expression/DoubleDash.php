<?php
namespace WikiLingo\Expression;

/**
 * Class DoubleDash
 * @package WikiLingo\Expression
 */
class DoubleDash extends Base
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