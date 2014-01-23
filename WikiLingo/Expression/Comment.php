<?php
namespace WikiLingo\Expression;

/**
 * Class Comment
 * @package WikiLingo\Expression
 */
class Comment extends Base
{
    /**
     * @var bool
     */
    public $allowLineAfter = false;

    /**
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		if ($parser->wysiwyg) {
			$element = $parser->element(__CLASS__, 'span');
			$element->staticChildren[] = $this->parsed->text;
			$element->classes[] = 'comment';
			return $element->render();
		}
		return '';
	}
}