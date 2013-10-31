<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BoldItalicUnderlineStrike extends Base
{
	public function __construct()
	{

		$this->source = "__Bold Only ''& Italic ===With Underline --Striken--===''__";

		$this->expected = "<strong>Bold Only <i>& Italic <u>With Underline <strike>Striken</strike></u></i></strong>";

	}
}
