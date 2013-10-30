<?
/**
 * @namespace
 */
namespace WikiLingo\Expression;

use Types\Type;
use WikiLingo;
use WikiLingo\Utilities;

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
		';' => 'descriptionList',

		'{r2l}' => 'r2l',
		'{l2r}' => 'l2r'
	);

	public static $blockModifiers = array(
		'+' => 'toggle',
		'-' => 'hidden'
	);

	public function __construct(WikiLingo\Parsed &$parsed = null)
	{
        if ($parsed == null)
        {
            return false;
        }

		$this->parsed =& $parsed;
		$syntax = Type::Parsed($parsed->arguments[0])->text;
		$modifierSyntax = substr($syntax, -1);
		$modifier = null;
		if (isset(self::$blockModifiers[$modifierSyntax])) {
			$modifier = self::$blockModifiers[$modifierSyntax];
			$syntax = substr($syntax, 0, -1);
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
        $collectionElementName = 'ol';

		switch ($this->blockType) {
			case 'header':
				$result = new Header($this, strlen($syntax), $modifier);
				break;

            case 'descriptionList':
	            if ($parser->blocksLength > 0) {
		            $previousBlock =& Type::Block($parser->blocks[$parser->blocksLength - 1]);
		            if (
			            $previousBlock->endingLineNo == $this->parsed->lineNo - 1
			            && $previousBlock->blockType == $this->blockType
		            ) {
			            $previousBlock->endingLineNo++;
			            $descriptionList =& Type::DescriptionList($previousBlock->expression);
			            $descriptionList->add($this);
			            return false;
		            }
	            }
				$result = new DescriptionList($this);
				break;
			case 'listBreak':
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
						$flat->block->parsed->addCousin($parsed, $modifier);
						return false;
					}
				}

				$result = new Tensor\Flat($this, $modifier);
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
	    Type::Element($element)->classes[] = "wl-parent";
        return $element;
    }

    public function element()
    {
        $element = $this->parsed->parser->element(__CLASS__, $this->elementName);

        if ($this->blank) {
            $element->classes[] = 'empty';
        }

	    $element->classes[] = $this->blockType;

        return $element;
    }

    public function newBlank()
    {
	    Utilities\Scripts::addCss(
"li.empty {
	list-style-type: none ! important;
}");
        $block = new Block();
        $block->collectionElementName = $this->collectionElementName;
        $block->elementName = $this->elementName;
        $block->parsed = $this->parsed;
        $block->blank = true;
        return $block;
    }
}