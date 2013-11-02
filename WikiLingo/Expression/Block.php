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
    public $modifier;
    public $parser;
    public $open = true;
	public $isFirst = false;

	public static $blocksTypes = array(
		'!' => 'header',

		'*' => 'unorderedListItem',
		'#' => 'orderedListItem',
		';' => 'descriptionList',
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
        $this->parser =& $parsed->parser;

		$syntax = Type::Parsed($parsed->arguments[0])->text;
		$modifierSyntax = substr($syntax, -1);
		if (isset(self::$blockModifiers[$modifierSyntax]) && !isset(self::$blockModifiers[$syntax])) {
			$this->modifier = self::$blockModifiers[$modifierSyntax];
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
				$result = new Header($this, strlen($syntax));
				break;

            case 'descriptionList':
	            if ($previousBlock =& $this->getPreviousBlockIfCompatible()) {
                    $previousBlock->endingLineNo = $this->parsed->lineNo;
                    $descriptionList =& Type::DescriptionList($previousBlock->expression);
                    $descriptionList->add($this);
                    return false;
	            }
				$result = new DescriptionList($this);
				break;
			case 'unorderedListItem':
            $collectionElementName = 'ul';
			case 'orderedListItem':
                $this->collectionElementName = $collectionElementName;
                $this->elementName = 'li';

                if ($previousBlock =& $this->getPreviousBlockIfCompatible()) {
                    $previousBlock->endingLineNo = $this->parsed->lineNo;
                    //We do not set $result here deliberately, so that the item is added to the already existing list
                    $flat =& Type::Flat($previousBlock->expression);
                    $item = new Tensor\Hierarchical($this);
                    $flat->add($item);
                    $flat->block->parsed->addCousin($parsed);
                    return false;
				}
				$this->isFirst = true;
				$result = new Tensor\Flat($this);
				break;
		}

		$parser->blocks[] =& $this;
		$parser->blocksLength++;
		$this->beginningLineNo = $parsed->lineNo;
		$this->endingLineNo = $parsed->lineNo;

		$this->expression =& $result;
		return true;
	}

    public function getPreviousBlockIfCompatible()
    {
        if ($this->parser->blocksLength > 0) {
            $previousBlock =& Type::Block($this->parser->blocks[$this->parser->blocksLength - 1]);
            if ($previousBlock->blockType == $this->blockType && $previousBlock->open) {
                return $previousBlock;
            }
        }
        return null;
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
        $element = Type::Element($this->parsed->parser->element(__CLASS__, $this->collectionElementName));
	    $element->detailedAttributes["data-parent"] = "true";
        return $element;
    }

    public function element()
    {
        $element = Type::Element($this->parsed->parser->element(__CLASS__, $this->elementName));

        $element->detailedAttributes["data-block-type"] = $this->blockType;

	    if ($this->isFirst && $this->parsed->text === "\n") {
		    $element->detailedAttributes["data-has-line-before"] = "true";
	    }
        if ($this->blank) {
            $element->classes[] = 'empty';
	        $element->detailedAttributes["data-block-type"] = 'empty';
        }

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