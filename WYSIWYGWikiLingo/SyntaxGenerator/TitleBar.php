<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class TitleBar extends Base
{
    public function generate()
    {
        return '-=' . $this->expression->renderedChildren . '=-';
    }
}