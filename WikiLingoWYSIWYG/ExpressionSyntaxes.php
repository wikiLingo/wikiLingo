<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/27/13
 * Time: 10:12 AM
 */

namespace WikiLingoWYSIWYG;

use WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo\Utilities\Scripts;

class ExpressionSyntaxes
{
    public $parsedExpressionSyntaxes = array();
	public $parser;

    public function __construct(Scripts &$scripts)
    {
        $this->parser = new Parser($scripts);
    }

	public function registerExpressionTypes()
	{
		$files = scandir(__DIR__ . '/ExpressionSyntax');
		foreach ($files as $file) {
			if ($file === '.' || $file === '..' || $file == 'Base.php') {
				continue;
			}

			$classNameShort = substr($file, 0, -4);
			$className = 'WikiLingoWYSIWYG\ExpressionSyntax\\' . $classNameShort;
			$class = new $className();
			$this->parsedExpressionSyntaxes[$classNameShort] = $expressionType = new ExpressionType(
				$classNameShort,
				$this->parser->parse($class->example($this->parser)),
				$class->types,
				$class->icon,
				$class->iconClass,
				$class->group
			);

			$this->parser->events->triggerExpressionSyntaxRegistered($expressionType);
		}
	}
} 