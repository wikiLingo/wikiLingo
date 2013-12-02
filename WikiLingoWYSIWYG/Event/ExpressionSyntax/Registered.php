<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:42 PM
 */

namespace WikiLingoWYSIWYG\Event\ExpressionSyntax;

use WikiLingo\Event\Base;
use WikiLingoWYSIWYG\ExpressionType;

class Registered extends Base
{
	public function trigger(ExpressionType &$expressionType)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($expressionType);
		}
	}
} 