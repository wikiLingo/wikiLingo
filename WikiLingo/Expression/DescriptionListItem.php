<?php
namespace WikiLingo\Expression;

/**
 * Class DescriptionListItem
 * @package WikiLingo\Expression
 */
class DescriptionListItem
{
	public $term;
	public $description;

    /**
     * @param $term
     * @param $description
     */
    public function __construct(&$term, &$description)
	{
		$this->term =& $term;
		$this->description =& $description;
	}

    /**
     * @param $parser
     * @return string
     */
    public function render(&$parser)
	{
		$elementTerm = $parser->element(__CLASS__, 'dt');
		$elementTerm->staticChildren[] = $this->term;

		$elementDescription = $parser->element(__CLASS__, 'dd');
		$elementDescription->staticChildren[] = $this->description;

		return $elementTerm->render() . $elementDescription->render();
	}
}