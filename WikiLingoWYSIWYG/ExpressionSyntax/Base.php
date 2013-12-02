<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

abstract class Base
{
    public $group = 'main';

    public $types = array();

    public $icon = '';

    public $iconClass = '';

    abstract public function example(WikiLingoWYSIWYG\Parser &$parser);
} 