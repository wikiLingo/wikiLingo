<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Underscore extends Base
{
    public function generate()
    {
        return '===' . $this->expression->renderedChildren . '===';
    }
}