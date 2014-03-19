<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

/**
 * Class Template
 * @package WikiLingo\Plugin
 */
class Template extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Template';
        $this->htmlTagType = 'div';
        $this->parameters['type'] = new Parameter('Type', '');
        $this->parameters['context'] = new Parameter('Context', '');
        $this->isVariableContext = true;
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        return parent::render($plugin, $body, $parser);
    }

    public function variables( &$plugin )
    {
        $result = $plugin->parsed->parser->events->triggerVariableContext($plugin);
        $plugin->iterations = max(0, count($result) - 1);
        return (empty($result) ? array(array()) : $result);
    }
}