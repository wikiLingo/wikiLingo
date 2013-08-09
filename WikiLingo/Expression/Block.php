<?
namespace WikiLingo\Expression;

use WikiLingo;

class Block extends Base
{
    public $type = 'Block';
    public $expressionType;
    public $actualExpression;
    public $blockType;

    public static $expressionTypes = array(
        'header' => 'Header',

        'unorderedList' => 'ListBuilder',
        'orderedList' => 'ListBuilder',
        'listBreak' => 'ListBuilder',
        'definitionList' => 'ListBuilder',

        'r2l' => 'R2L',
        'l2r' => 'L2R'
    );

    public static $blockTypes = array(
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

    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;
        $this->blockType = (
            isset(self::$blockTypes[$parsed->arguments[0]->text{0}])
                ?
                    self::$blockTypes[$parsed->arguments[0]->text{0}]
                :
                    self::$blockTypes[$parsed->arguments[0]->text]
        );

        if (isset($this->blockType)) {
            $this->expressionType = self::$expressionTypes[$this->blockType];

            $class = 'WikiLingo\Expression\\' . $this->expressionType;
            $this->actualExpression = new $class($parsed, $this);
        }
    }

    /**
     * syntax handler: block, \n$content\n
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    /*function preRender(&$parser)
    {
        $result = null;

        if (isset(self::$blockTypes[$blockStart->text{0}])) {
            $blockType = self::$blockTypes[$blockStart->text{0}];

            switch ($blockType) {
                case 'header':
                    $count = min(strlen($blockStart->text), 7);

                    $result = $parser->element(__CLASS__, 'h' . $count, $content);
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
        } else if (isset(self::$blockTypes[$blockStart->text])) {
            $blockType = self::$blockTypes[$blockStart->text];
            switch ($blockType) {
                //case 'l2r': return new WikiLingo_Expression_Header($content);
                //case 'r2l': return new WikiLingo_Expression_Header($content);
            }
        }
    }*/

    public function render(&$parser)
    {

        $test = '';
        return $test;
    }
}