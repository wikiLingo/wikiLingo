<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/27/13
 * Time: 10:12 AM
 */

namespace WikiLingoWYSIWYG;

use WikiLingoWYSIWYG\ExpressionSyntax;

class ExpressionSyntaxes
{
    public $parsedExpressionSyntaxes = array();

    public function __construct()
    {
        $parser = new Parser();
        $files = scandir(__DIR__ . '/ExpressionSyntax');
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || $file == 'Base.php') {
                continue;
            }

            $classNameShort = substr($file, 0, -4);
            $className = 'WikiLingoWYSIWYG\ExpressionSyntax\\' . $classNameShort;
            $class = new $className();
            $this->parsedExpressionSyntaxes[$classNameShort] = new ExpressionType(
                $classNameShort,
                $parser->parse($class->example()),
                $class->types,
                $class->icon,
                $class->iconClass,
                $class->group
            );
        }
    }
} 