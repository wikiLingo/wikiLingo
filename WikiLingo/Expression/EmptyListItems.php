<?
namespace WikiLingo\Expression;

class EmptyListItems extends ListItems
{
    function __construct() {}

    public function render(&$parser)
    {
        $helper = $parser->helper('ul');
        $helper->classes[] = 'empty';
        $helper->staticChildren[] = $this->renderedChildren;
        return $helper->render();
    }
}