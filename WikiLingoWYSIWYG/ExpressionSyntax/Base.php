<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

abstract class Base
{
    public $group = 'main';

    public $types = array();

    public $icon = '';

    public $iconClass = '';

    public $label = '';

    public $labelTranslated = '';

    public function __construct( $parser )
    {
        $this->labelTranslated = $parser->events->triggerTranslate($this->label, 'expression');
    }

    abstract public function example(WikiLingoWYSIWYG\Parser &$parser);
} 