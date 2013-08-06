<?
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Strike extends Base
{
    public function generate()
    {
        return '--' . $this->expression->renderedChildren . '--';
    }
}
