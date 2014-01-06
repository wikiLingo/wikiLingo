<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Header
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Header extends Base
{
    /**
     * @var array
     */
    public static $modifiers = array(
		'hidden' => '-',
		'toggle' => '+'
	);

    /**
     * @return string
     */
    public function generate()
    {
	    $this->parsed->isBlock = true;
	    $headerNumber = $this->expression->parsed->text{2} * 1;
	    $modifier = '';
	    if (isset($this->expression->parameters['data-modifier'])) {
		    if (isset(self::$modifiers[$this->expression->parameters['data-modifier']])) {
			    $modifier = self::$modifiers[$this->expression->parameters['data-modifier']];
		    }
	    }
	    return "\n" . str_repeat('!',$headerNumber) . $modifier . $this->expression->renderedChildren;
    }
}