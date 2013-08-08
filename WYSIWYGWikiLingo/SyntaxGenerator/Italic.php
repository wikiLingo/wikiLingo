<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Italic extends Base
{
    public function generate()
    {
        return "''" . $this->expression->renderedChildren . "''";
    }
}