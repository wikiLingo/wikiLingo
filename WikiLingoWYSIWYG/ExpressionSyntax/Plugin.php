<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use Types\Type;
Use Exception;
Use WikiLingoWYSIWYG;

class Plugin extends Base
{
    public $group = 'plugins';
    public $icon = '';
    public $iconClass = 'icon-power-cord';

    public function __construct()
    {
        $dir = dirname(dirname(__DIR__)) . '/WikiLingo/Plugin';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || $file == 'Base.php') {
                continue;
            }

            if (strpos($file, '.php') > -1) {
                $name = substr($file, 0, -4);

                $this->types[] = new WikiLingoWYSIWYG\ExpressionPluginType($name);
            }
        }
    }

    public function example()
    {
        return '';
    }
}