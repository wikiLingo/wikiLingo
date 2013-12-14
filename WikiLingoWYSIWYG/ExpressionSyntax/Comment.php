<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Comment extends Base
{
    public $label = 'Comment';
    public $icon = ' ';
    public $iconClass = 'icon-bubble';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '~tc~expression~/tc~';
    }
}