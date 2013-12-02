<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Strike extends Base
{
    public $icon = '';
    public $iconClass = 'icon-strikethrough';
    public $group = 'common';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '--expression--';
    }
}