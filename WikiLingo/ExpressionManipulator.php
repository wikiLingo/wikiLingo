<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/30/14
 * Time: 5:58 PM
 */

namespace WikiLingo;

use WikiLingo\Expression;

abstract class ExpressionManipulator extends Expression\Base
{
    /**
     * @var Expression\Base
     */
    public $expression;

    /**
     * @param Expression\Base $expression
     */
    public function __construct(&$expression)
    {
        $this->expression =& $expression;
    }
}