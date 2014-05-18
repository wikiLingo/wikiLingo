<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 5/14/14
 * Time: 3:21 PM
 */

namespace WikiLingoWYSIWYG;

use WikiLingo;

class ExpressionAttribute extends WikiLingo\Utilities\Parameter
{
	public $key;
	public $replace;

	public function __construct($label, $defaultValue, $key = null, $replace = 'attribute')
	{
		$this->key = $key;
		$this->replace = $replace;

		parent::__construct($label, $defaultValue);
	}
} 