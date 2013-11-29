<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Strike extends Base
{
    public $icon = '';
    public $iconClass = 'icon-strikethrough';
    public $group = 'common';

    public function example()
    {
        return '--expression--';
    }
}