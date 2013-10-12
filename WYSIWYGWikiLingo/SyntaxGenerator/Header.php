<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Header extends Base
{
    public function generate()
    {
	    $headerNumber = $this->expression->parsed->text{2} * 1;
	    return "\n" . str_repeat('!',$headerNumber) . $this->expression->renderedChildren;
    }
}