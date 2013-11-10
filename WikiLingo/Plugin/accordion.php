<?php
/**
 * Created by JetBrains PhpStorm.
 * User: GavinC
 * Date: 8/6/13
 * Time: 11:15 AM
 */
namespace WikiLingo\Plugin;

use WikiLingo;

class accordion extends HtmlBase
{
    public $htmlTagType = 'div';

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $header = $parser->helper('h3');
        $header->staticChildren[] = $plugin->parameters['title'];

        $accordion = parent::render($plugin, $body, $parser);

        return $header->render() . $accordion;
    }
}