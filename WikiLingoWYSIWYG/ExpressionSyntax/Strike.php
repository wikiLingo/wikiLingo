<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Strike extends Base
{
    public $label = 'Strike';
    public $icon = '';
    public $iconClass = 'icon-strikethrough';
    public $group = 'font';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '--expression--';
    }
}