<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 5/10/14
 * Time: 2:36 PM
 */

namespace WikiLingo\Utilities;


class VariableContext
{
	public $variables;
	public $i = 0;

	public function __construct($variables)
	{
		$this->variables = $variables;
	}

	public function increment()
	{
		$this->i++;
	}

	public function reset()
	{
		$this->i = 0;
	}
} 