<?php
namespace WikiLingo\Expression;

class DescriptionListItem
{
	public $term;
	public $description;

	public function __construct(&$term, &$description)
	{
		$this->term =& $term;
		$this->description =& $description;
	}

	public function render(&$parser)
	{
		$elementTerm = $parser->element(__CLASS__, 'dt');
		$elementTerm->staticChildren[] = $this->term;

		$elementDescription = $parser->element(__CLASS__, 'dd');
		$elementDescription->staticChildren[] = $this->description;

		return $elementTerm->render() . $elementDescription->render();
	}
}