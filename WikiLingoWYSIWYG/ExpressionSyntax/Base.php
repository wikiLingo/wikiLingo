<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;


abstract class Base
{
    public $group = 'main';

    public $types = array();

    public $icon = '?';

    public $iconClass = '';

    abstract public function example();
} 