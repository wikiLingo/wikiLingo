<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

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
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$renderer, &$parser)
    {
	    if ($parser->wysiwyg) {
            return parent::render($plugin, $body, $renderer, $parser);
	    }
	    return $body;
    }

    public function variables( &$plugin )
    {
        $result = $plugin->parsed->parser->events->triggerVariableContext($plugin);
        $plugin->iterations = max(0, count($result) - 1);
        return (empty($result) ? array(array()) : $result);
    }
}