<?
namespace WikiLingo\Expression;

class EmptyListItems extends ListItems
{
    function __construct() {}

    public function render(&$parser)
    {
        $helper = $parser->helper('ul');
        $helper->classes[] = 'empty';

        foreach($this->items as &$item)
        {
            $helper->staticChildren[] = $item->render($parser);
        }

        return $helper->render();
    }
}