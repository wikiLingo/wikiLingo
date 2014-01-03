<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/2/14
 * Time: 10:27 PM
 */

namespace WikiLingo\Expression;

use WikiLingo;

class FLP extends Base
{
	public $past;

	public function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;

		//@FLP(past) to past
		$this->past = substr($parsed->text, 5, -1);
	}

	public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, 'span');
		$element->staticChildren[] = $this->renderedChildren;
		return $element->render();
	}
} 