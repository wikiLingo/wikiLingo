<?php
/**
 * Created by JetBrains PhpStorm.
 * User: GavinC
 * Date: 8/6/13
 * Time: 11:15 AM
 */
namespace WikiLingo\Plugin;

use WikiLingo;

class accordions extends HtmlBase
{
    public $type = 'accordions';
    public $public = 'accordions';
    public $htmlTagType = 'div';


    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
        $this->parameterDefaults($plugin->parameters);
        $id = $this->id($plugin->index);
        self::$scripts->addScript(<<<JS
$(function() {
	 $( '#$id' ).accordion();
});
JS

        );
        $accordions = parent::render($plugin, $body, $parser);

        return $accordions;
    }
}