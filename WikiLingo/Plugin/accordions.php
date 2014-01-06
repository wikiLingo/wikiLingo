<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class accordions
 * @package WikiLingo\Plugin
 */
class accordions extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->htmlTagType = 'div';

        $this->label = 'Accordion';
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
        $id = $plugin->id();
        $parser->scripts->addScript(<<<JS
$(function() {
	 $( '#$id' ).accordion({
	    header: 'h3'
	 });
});
JS
        );
        $accordions = parent::render($plugin, $body, $parser);

        return $accordions;
    }
}