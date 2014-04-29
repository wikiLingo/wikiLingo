<?
/**
 * @namespace
 */
namespace WikiLingo\Expression;

use WikiLingo;
use WikiLingo\Utilities;

/**
 * Class Block
 * @package WikiLingo\Expression
 */
class Block extends Base
{
    public $type = 'Block';
    public $blank = false;
    public $expression;
    public $blockType;
	public $beginningLineNo;
	public $endingLineNo;
    public $modifier = null;

    /**
     * @var WikiLingo\Parser
     */
    public $parser;
    public $open = true;
	public $isFirst = false;
	public $allowLineAfter = false;
    public $canOverride = false;

    /**
     * @var array
     */
    public static $blocksTypes = array(
		'!' => 'header',

		'*' => 'unorderedListItem',
		'#' => 'orderedListItem',
		';' => 'descriptionList',
	);

    /**
     * @var array
     */
    public static $blockModifiers = array(
		'+' => 'toggle',
		'-' => 'hidden'
	);

    /**
     * @param WikiLingo\Parsed $parsed
     */
    public function __construct(WikiLingo\Parsed &$parsed = null)
	{
        if ($parsed == null)
        {
            return false;
        }

		$this->parsed =& $parsed;
        $this->parser =& $parsed->parser;

		$syntax = $parsed->arguments[0]->text;
		$modifierSyntax = substr($syntax, -1);
		if (isset(self::$blockModifiers[$modifierSyntax]) && !isset(self::$blockModifiers[$syntax])) {
			$this->modifier = self::$blockModifiers[$modifierSyntax];
            $parsed->arguments[0]->text = $syntax = substr($syntax, 0, -1);
		}
		$this->blockType = (
			isset(self::$blocksTypes[$syntax{0}])
				?
					self::$blocksTypes[$syntax{0}]
				:
					self::$blocksTypes[$syntax]
		);

		$parser =& $parsed->parser;
		$result = null;
        $ordered = true;

		switch ($this->blockType) {
			case 'header':
				$result = new BlockType\Header($this, strlen($syntax));
				break;

            case 'descriptionList':
	            if ($previousBlock = $this->getPreviousBlockIfCompatible()) {
                    $previousBlock->endingLineNo = $this->parsed->lineNo;
                    /**
                     * @var BlockType\DescriptionList
                     */
                    $descriptionList = $previousBlock->expression;
                    $descriptionList->add($this);
                    return false;
	            }
				$result = new BlockType\DescriptionList($this);
				break;
			case 'unorderedListItem':
                $ordered = false;
			case 'orderedListItem':
                if ($previousBlock = $this->getPreviousBlockIfCompatible()) {
                    $previousBlock->endingLineNo = $this->parsed->lineNo;
                    //We do not set $result here deliberately, so that the item is added to the already existing list
                    /**
                     * @var BlockType\ListContainer
                     */
                    $container = $previousBlock->expression;
                    $item = new BlockType\ListItem($container, $this);
                    $container->add($item);
                    $container->block->parsed->addCousin($parsed);
                    return false;
				}
				$this->isFirst = true;
				$result = new BlockType\ListContainer($this, $ordered);
				break;
		}

		$parser->blocks[] =& $this;
		$parser->blocksLength++;
		$this->beginningLineNo = $parsed->lineNo;
		$this->endingLineNo = $parsed->lineNo;

		$this->expression =& $result;
		return true;
	}

    /**
     * @return null|Block
     */
    public function getPreviousBlockIfCompatible()
    {
        if ($this->parser->blocksLength > 0) {
            $previousBlock = $this->parser->blocks[$this->parser->blocksLength - 1];
            if ($previousBlock->blockType == $this->blockType && $previousBlock->open) {
                return $previousBlock;
            }
        }
        return null;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
	{
        if (isset($this->expression)) {
			return $this->expression->render($renderer, $parser);
		}
		return '';
	}
}