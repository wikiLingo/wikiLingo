<?php
namespace WikiLingoWYSIWYG;

use WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo\Utilities\Scripts;

/**
 * Class ExpressionSyntaxes
 * @package WikiLingoWYSIWYG
 */
class ExpressionSyntaxes
{
    public $parsedExpressionSyntaxes = array();
	public $parser;

    /**
     * @param Scripts $scripts
     */
    public function __construct(Scripts &$scripts)
    {
        $this->parser = new Parser($scripts);
    }

    /**
     *
     */
    public function registerExpressionTypes()
	{
		$files = scandir(__DIR__ . '/ExpressionSyntax');
		foreach ($files as $file) {
			if ($file === '.' || $file === '..' || $file == 'Base.php') {
				continue;
			}

			$classNameShort = substr($file, 0, -4);
			$className = 'WikiLingoWYSIWYG\ExpressionSyntax\\' . $classNameShort;
			$class = new $className($this->parser);
			$this->parsedExpressionSyntaxes[$classNameShort] = $expressionType = new ExpressionType(
				$classNameShort,
                $class->labelTranslated,
				$this->parser->parse($class->example($this->parser)),
				$class->types,
				$class->icon,
				$class->iconClass,
				$class->group,
				$class->attribute
			);

			$this->parser->events->triggerExpressionSyntaxRegistered($expressionType);
		}
	}
} 