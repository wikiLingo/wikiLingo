<?
namespace WikiLingo\Expression;

class EmptyListItem extends ListItem
{
    function __construct($lineNo)
    {
        $this->lineNo = $lineNo;
    }

    public function render(&$parser)
    {
        $helper = $parser->helper('li');
        $helper->classes[] = 'empty';

        foreach($this->children as &$child)
        {
            $helper->staticChildren[] = $child->render($parser);
        }

        return $helper->render();
    }
}