<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Utilities\Html;

class HorizontalBar extends Base
{
	public function __construct()
	{

		$this->source = " --- ";

		$this->expected =
			"<span class='whitespace'> </span><hr/><span class='whitespace'> </span>";
	}
}
