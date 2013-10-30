<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Header extends Base
{
	public static $modifiers = array(
		'hidden' => '-',
		'toggle' => '+'
	);
    public function generate()
    {
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