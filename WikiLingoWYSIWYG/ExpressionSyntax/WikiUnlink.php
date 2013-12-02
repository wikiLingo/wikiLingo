<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class WikiUnlink extends Base
{
    public $icon = '';
    public $iconClass = 'icon-blocked';
    public $group = 'link';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '))expression((';
    }
}