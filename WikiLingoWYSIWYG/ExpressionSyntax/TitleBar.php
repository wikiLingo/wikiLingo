<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class TitleBar extends Base
{
    public $label = 'Title Bar';
    public $icon = '';
    public $iconClass = 'icon-menu';
    public $group = 'misc';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '-=expression=-';
    }
}