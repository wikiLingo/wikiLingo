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
        $this->expected = "";

    }
} 