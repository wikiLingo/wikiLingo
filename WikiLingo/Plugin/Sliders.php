<?php

namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

/**
 * Class Sliders
 * @package WikiLingo\Plugin
 */
class Sliders extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Slider';
        $this->htmlTagType = 'div';
        $this->parameters['seconds'] = new WikiLingo\Utilities\Parameter('Frame Seconds', 4);
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
		$id = $plugin->id();
        $seconds = $plugin->parameter('seconds');

        $slideAnimation = '';
        $i = 0;
        if (!$parser->wysiwyg) {
            $children = $plugin->children('Plugin');
            $childrenCount = count($children);

            foreach($children as $child) {
                switch ($child->type) {
                    case 'Slider':
                        $sliderId = $child->id();
                        $thisSlideSeconds = $seconds * ($childrenCount - $i - 1);
                        $i++;
                        $slideAnimation .= <<<CSS


CSS
;
                        break;
                }
            }

            $totalSlideSeconds = $i * $seconds;


            $parser->scripts
                ->addCss(<<<CSS



CSS
			);
        }

		$sliders = parent::render($plugin, $body, $renderer, $parser);
		return $sliders;
	}
} 