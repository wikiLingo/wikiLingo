<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use Types\Type;
Use Exception;
use WikiLingoWYSIWYG;

class Plugin extends Base
{
    public $label = 'Plugin';
    public $group = 'plugins';
    public $icon = '';
    public $iconClass = 'icon-power-cord';

    public function __construct($parser)
    {
        $dir = dirname(dirname(__DIR__)) . '/WikiLingo/Plugin';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || $file == 'Base.php' || $file == 'Parameter.php') {
                continue;
            }

            if (strpos($file, '.php') > -1) {
                $name = substr($file, 0, -4);

                $this->types[] = new WikiLingoWYSIWYG\ExpressionPluginType($name, $parser);
            }
        }
    }

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '';
    }
}