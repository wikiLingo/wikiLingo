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
    public $expressionType;
    public $expression;
    public $blockType;
	public $beginningLineNo;
	public $endingLineNo;

	public static $blocksTypes = array(
		'!' => 'header',

		'*' => 'unorderedList',
		'#' => 'orderedList',
		'+' => 'listBreak',
		';' => 'definitionList',

		'{r2l}' => 'r2l',
		'{l2r}' => 'l2r'
	);

	public function __construct(WikiLingo\Parsed &$parsed)
	{
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

		switch ($this->blockType) {
			case 'header':
				$result = new Header($this);
				break;
			case 'unorderedList':
			case 'orderedList':
			case 'listBreak':
			case 'definitionList':

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
						$item = new Tensor\Hierarchical("ul", "li", $this);
						$flat->add($item);
						$flat->block->parsed->addLine($parsed);
						return false;
					}
				}

				$result = new Tensor\Flat("ul", "li", $this);
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
			return $this->expression->render($parser);
		}
		return '';
	}
}