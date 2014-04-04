<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/24/14
 * Time: 2:33 PM
 */

namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;

class TemplateAndNullVariables extends Base
{
    public function __construct(&$parser)
    {
	    $this->expected = (new WikiLingoTestPlugin\TemplateAndNullVariables($parser))->source;
	    $this->source = $parser->parse($this->expected);

    }
} 