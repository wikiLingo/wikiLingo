<?php
namespace WikiLingo\Expression;
use WikiLingo;

class Content
{
	public $content;
	function __construct(WikiLingo\Parsed &$content)
	{
		$this->content = $content;
	}

	function render()
	{
		return $this->content->text;
	}
}