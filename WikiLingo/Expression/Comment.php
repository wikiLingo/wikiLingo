<?php
namespace WikiLingo\Expression;

use WikiLingo;
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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
	{
		if ($parser->wysiwyg) {
			$element = $renderer->element(__CLASS__, 'span');
			$element->staticChildren[] = $this->parsed->text;
			$element->classes[] = 'comment';
			return $element->render();
		}
		return '';
	}
}