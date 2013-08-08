<?
namespace WikiLingo\Expression;

use WikiLingo;

class Block extends Base
{
    public $type = 'Block';
    public $actualExpression;

    public static $blocks = array(
        '!' => 'header',

        '*' => 'unorderedList',
        '#' => 'orderedList',
        '+' => 'listBreak',
        ';' => 'definitionList',

        '{r2l}' => 'r2l',
        '{l2r}' => 'l2r'
    );

    public static $listTypes = array(
        '*' => 'li',
        '#' => 'li',
        '+' => 'div',
        ';' => 'df'
    );

    function isBlockStartSyntax($char)
    {
        if (isset(sel::$blocks[$char])) {
            return true;
        }
        return false;
    }

    /**
     * syntax handler: block, \n$content\n
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function block()
    {
        $result = null;

        if (isset(self::$blocks[$blockStart->text{0}])) {
            $blockType = self::$blocks[$blockStart->text{0}];

            switch ($blockType) {
                case 'header':
                    $count = min(strlen($blockStart->text), 7);

                    $result = new HtmlElement('header', 'h' . $count, $content);
                    $type = new Header($count, $content);
                    $this->addType($type);
                    return $result;
                    break;
                case 'unorderedList':
                case 'orderedList':
                case 'listBreak':
                case 'definitionList':
                    $result = null;
                    if (!isset($this->listLast) || ($this->listLast->type != $blockType || $this->listLastLineNo != $blockStart->lineNo - 1)) {
                        $result = $this->listLast = new ListBuilder($blockType);
                    }
                    $list = $this->listLast;

                    $item = new ListBuilderItem($blockStart, $content);
                    $list->addItem($item);

                    return $result;
                    break;
            }
        } else if (isset(self::$blocks[$blockStart->text])) {
            $blockType = self::$blocks[$blockStart->text];
            switch ($blockType) {
                //case 'l2r': return new WikiLingo_Expression_Header($content);
                //case 'r2l': return new WikiLingo_Expression_Header($content);
            }
        }
    }

    function __construct(WikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);
        $this->parsed =& $parsed;
    }

    public function render(&$parser)
    {
        $prev = $this->parsed->previousLine();
        $test = '';
        return $test;
    }
}