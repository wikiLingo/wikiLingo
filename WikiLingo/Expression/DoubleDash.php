<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class DoubleDash
 * @package WikiLingo\Expression
 */
class DoubleDash extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
	{
		return $this->parsed->text;
	}
}