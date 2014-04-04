<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/24/14
 * Time: 2:33 PM
 */

namespace WikiLingo\Test\Plugin;

use WikiLingo;
use WikiLingo\Test\Base;

class TemplateAndNullVariables extends Base
{
    public function __construct(&$parser)
    {
	    $parser->clearTypes();

        $this->source = <<<WL
{TEMPLATE()}
!!%event_name%
%description%
This event costs %cost%.
The dress code is %dresscode%.
You should be ready to be picked up at %pickup_area% at %pickup_time%.
Your bus number is %bus_number%.
You should be ready to get back on the bus at %pickup_return%.
{TEMPLATE}
WL;
        $this->expected = "<div class='Template' id='Template1'>" .
    "<h2 id='event_name'><span>event_name</span></h2>" .
    "<span>description</span><br/>" .
    "This event costs <span>cost</span>.<br/>" .
    "The dress code is <span>dresscode</span>.<br/>" .
    "You should be ready to be picked up at <span>pickup_area</span><span class='whitespace'> </span>at <span>pickup_time</span>.<br/>" .
    "Your bus number is <span>bus_number</span>.<br/>" .
    "You should be ready to get back on the bus at <span>pickup_return</span>.<br/>" .
"</div>";

    }
} 