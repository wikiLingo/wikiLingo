<?
/**
 * @namespace
 */
namespace WikiLingo\Expression;

use Types\Type;
use WikiLingo;

/**
 * @constructor
 */
class Block extends Base
{
    public $type = 'Block';
    public $blank = false;
    public $expressionType;
    public $expression;
    public $blockType;
	public $beginningLineNo;
	public $endingLineNo;
    public $element;
    public $collectionElementName;
    public $elementName;

	public static $blocksTypes = array(
		'!' => 'header',

		'*' => 'unorderedList',
		'#' => 'orderedList',
		'+' => 'listBreak',
		';' => 'definitionList',

		'{r2l}' => 'r2l',
		'{l2r}' => 'l2r'
	);

	public function __construct(WikiLingo\Parsed &$parsed = null)
	{
        if ($parsed == null)
        {
            return false;
        }

		$this->parsed =& $parsed;
		$syntaxState = $parsed->arguments[0];
		$this->blockType = (
			isset(self::$blocksTypes[$syntaxState->text{0}])
				?
					self::$blocksTypes[$syntaxState->text{0}]
				:
					self::$blocksTypes[$syntaxState->text]
		);

		$parser =& $parsed->parser;
		$result = null;
        $collectionElementName = 'ol';

		switch ($this->blockType) {
			case 'header':
				$result = new Header($this);
				break;
            case 'listBreak':
            case 'definitionList':

			case 'unorderedList':
            $collectionElementName = 'ul';
			case 'orderedList':
                $this->collectionElementName = $collectionElementName;
                $this->elementName = 'li';

				if ($parser->blocksLength > 0) {
					//last block
					$previousBlock =& Type::Block($parser->blocks[$parser->blocksLength - 1]);
					if (
						$previousBlock->endingLineNo == $this->parsed->lineNo - 1
						&& $previousBlock->blockType == $this->blockType
					) {
						$previousBlock->endingLineNo++;
						//We do not set $result here deliberately, so that the item is added to the already existing list
						$flat =& Type::Flat($previousBlock->expression);
						$item = new Tensor\Hierarchical($this);
						$flat->add($item);
						$flat->block->parsed->addLine($parsed);
						return false;
					}
				}

				$result = new Tensor\Flat($this);
				break;
			case 'r2l':
				$result = new R2L($this);
				break;
			case 'l2r':
				$result = new L2R($this);
				break;
		}

		$parser->blocks[] =& $this;
		$parser->blocksLength++;
		$this->beginningLineNo = $parsed->lineNo;
		$this->endingLineNo = $parsed->lineNo;

		$this->expression =& $result;
		return true;
	}

	public function render(&$parser)
	{
		if (isset($this->expression)) {
			return $this->expression->render();
		}
		return '';
	}

    public function collectionElement()
    {
        $element = $this->parsed->parser->element(__CLASS__, $this->collectionElementName);

        if ($this->blank) {
            $element->classes[] = 'empty';
        }

        return $element;
    }

    public function element()
    {
        $element = $this->parsed->parser->element(__CLASS__, $this->elementName);

        if ($this->blank) {
            $element->classes[] = 'empty';
        }

        return $element;
    }

    public function newBlank()
    {
        $block = new Block();
        $block->collectionElementName = $this->collectionElementName;
        $block->elementName = $this->elementName;
        $block->parsed = $this->parsed;
        $block->blank = true;
        return $block;
    }
}