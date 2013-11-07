<?php
namespace WikiLingo\Plugin;

use WikiLingo;

abstract class HtmlBase extends Base
{
	public $htmlTagType = 'span';
	public $hasHtmlBody = true;
	public $attributes = array('id'=>'', 'class'=>'', 'style'=>'');
	public $button;

	static $style = array(
		'@keyframes' => array('filter' => 'text', 'default' => ''),
		'animation' => array('filter' => 'text', 'default' => ''),
		'animation-name' => array('filter' => 'text', 'default' => ''),
		'animation-duration' => array('filter' => 'text', 'default' => ''),
		'animation-timing-function' => array('filter' => 'text', 'default' => ''),
		'animation-delay' => array('filter' => 'text', 'default' => ''),
		'animation-iteration-count' => array('filter' => 'text', 'default' => ''),
		'animation-direction' => array('filter' => 'text', 'default' => ''),
		'animation-play-state' => array('filter' => 'text', 'default' => ''),
		//'background' => array('filter' => 'text', 'default' => ''),
		//'background-attachment' => array('filter' => 'text', 'default' => ''),
		'background-color' => array('filter' => 'text', 'default' => ''),
		//'background-image' => array('filter' => 'text', 'default' => ''),
		//'background-position' => array('filter' => 'text', 'default' => ''),
		'background-repeat' => array('filter' => 'text', 'default' => ''),
		'background-clip' => array('filter' => 'text', 'default' => ''),
		'background-origin' => array('filter' => 'text', 'default' => ''),
		'background-size' => array('filter' => 'text', 'default' => ''),
		'border' => array('filter' => 'text', 'default' => ''),
		'border-bottom' => array('filter' => 'text', 'default' => ''),
		'border-bottom-color' => array('filter' => 'text', 'default' => ''),
		'border-bottom-style' => array('filter' => 'text', 'default' => ''),
		'border-bottom-width' => array('filter' => 'text', 'default' => ''),
		'border-color' => array('filter' => 'text', 'default' => ''),
		'border-left' => array('filter' => 'text', 'default' => ''),
		'border-left-color' => array('filter' => 'text', 'default' => ''),
		'border-left-style' => array('filter' => 'text', 'default' => ''),
		'border-left-width' => array('filter' => 'text', 'default' => ''),
		'border-right' => array('filter' => 'text', 'default' => ''),
		'border-right-color' => array('filter' => 'text', 'default' => ''),
		'border-right-style' => array('filter' => 'text', 'default' => ''),
		'border-right-width' => array('filter' => 'text', 'default' => ''),
		'border-style' => array('filter' => 'text', 'default' => ''),
		'border-top' => array('filter' => 'text', 'default' => ''),
		'border-top-color' => array('filter' => 'text', 'default' => ''),
		'border-top-style' => array('filter' => 'text', 'default' => ''),
		'border-top-width' => array('filter' => 'text', 'default' => ''),
		'border-width' => array('filter' => 'text', 'default' => ''),
		'outline' => array('filter' => 'text', 'default' => ''),
		'outline-color' => array('filter' => 'text', 'default' => ''),
		'outline-style' => array('filter' => 'text', 'default' => ''),
		'outline-width' => array('filter' => 'text', 'default' => ''),
		'border-bottom-left-radius' => array('filter' => 'text', 'default' => ''),
		'border-bottom-right-radius' => array('filter' => 'text', 'default' => ''),
		'border-image' => array('filter' => 'text', 'default' => ''),
		'border-image-outset' => array('filter' => 'text', 'default' => ''),
		'border-image-repeat' => array('filter' => 'text', 'default' => ''),
		'border-image-slice' => array('filter' => 'text', 'default' => ''),
		'border-image-source' => array('filter' => 'text', 'default' => ''),
		'border-image-width' => array('filter' => 'text', 'default' => ''),
		'border-radius' => array('filter' => 'text', 'default' => ''),
		'border-top-left-radius' => array('filter' => 'text', 'default' => ''),
		'border-top-right-radius' => array('filter' => 'text', 'default' => ''),
		'box-decoration-break' => array('filter' => 'text', 'default' => ''),
		'box-shadow' => array('filter' => 'text', 'default' => ''),
		'overflow-x' => array('filter' => 'text', 'default' => ''),
		'overflow-y' => array('filter' => 'text', 'default' => ''),
		'overflow-style' => array('filter' => 'text', 'default' => ''),
		'rotation' => array('filter' => 'text', 'default' => ''),
		'rotation-point' => array('filter' => 'text', 'default' => ''),
		'color-profile' => array('filter' => 'text', 'default' => ''),
		'opacity' => array('filter' => 'text', 'default' => ''),
		'rendering-intent' => array('filter' => 'text', 'default' => ''),
		'bookmark-label' => array('filter' => 'text', 'default' => ''),
		'bookmark-level' => array('filter' => 'text', 'default' => ''),
		'bookmark-target' => array('filter' => 'text', 'default' => ''),
		'float-offset' => array('filter' => 'text', 'default' => ''),
		'hyphenate-after' => array('filter' => 'text', 'default' => ''),
		'hyphenate-before' => array('filter' => 'text', 'default' => ''),
		'hyphenate-character' => array('filter' => 'text', 'default' => ''),
		'hyphenate-lines' => array('filter' => 'text', 'default' => ''),
		'hyphenate-resource' => array('filter' => 'text', 'default' => ''),
		'hyphens' => array('filter' => 'text', 'default' => ''),
		'image-resolution' => array('filter' => 'text', 'default' => ''),
		'marks' => array('filter' => 'text', 'default' => ''),
		'string-set' => array('filter' => 'text', 'default' => ''),
		'height' => array('filter' => 'text', 'default' => ''),
		'max-height' => array('filter' => 'text', 'default' => ''),
		'max-width' => array('filter' => 'text', 'default' => ''),
		'min-height' => array('filter' => 'text', 'default' => ''),
		'min-width' => array('filter' => 'text', 'default' => ''),
		'width' => array('filter' => 'text', 'default' => ''),
		'box-align' => array('filter' => 'text', 'default' => ''),
		'box-direction' => array('filter' => 'text', 'default' => ''),
		'box-flex' => array('filter' => 'text', 'default' => ''),
		'box-flex-group' => array('filter' => 'text', 'default' => ''),
		'box-lines' => array('filter' => 'text', 'default' => ''),
		'box-ordinal-group' => array('filter' => 'text', 'default' => ''),
		'box-orient' => array('filter' => 'text', 'default' => ''),
		'box-pack' => array('filter' => 'text', 'default' => ''),
		'font' => array('filter' => 'text', 'default' => ''),
		'font-family' => array('filter' => 'text', 'default' => ''),
		'font-size' => array('filter' => 'text', 'default' => ''),
		'font-style' => array('filter' => 'text', 'default' => ''),
		'font-variant' => array('filter' => 'text', 'default' => ''),
		'font-weight' => array('filter' => 'text', 'default' => ''),
		'@font-face' => array('filter' => 'text', 'default' => ''),
		'font-size-adjust' => array('filter' => 'text', 'default' => ''),
		'font-stretch' => array('filter' => 'text', 'default' => ''),
		'content' => array('filter' => 'text', 'default' => ''),
		'counter-increment' => array('filter' => 'text', 'default' => ''),
		'counter-reset' => array('filter' => 'text', 'default' => ''),
		'quotes' => array('filter' => 'text', 'default' => ''),
		'crop' => array('filter' => 'text', 'default' => ''),
		'move-to' => array('filter' => 'text', 'default' => ''),
		'page-policy' => array('filter' => 'text', 'default' => ''),
		'grid-columns' => array('filter' => 'text', 'default' => ''),
		'grid-rows' => array('filter' => 'text', 'default' => ''),
		'target' => array('filter' => 'text', 'default' => ''),
		'target-name' => array('filter' => 'text', 'default' => ''),
		'target-new' => array('filter' => 'text', 'default' => ''),
		'target-position' => array('filter' => 'text', 'default' => ''),
		'alignment-adjust' => array('filter' => 'text', 'default' => ''),
		'alignment-baseline' => array('filter' => 'text', 'default' => ''),
		'baseline-shift' => array('filter' => 'text', 'default' => ''),
		'dominant-baseline' => array('filter' => 'text', 'default' => ''),
		'drop-initial-after-adjust' => array('filter' => 'text', 'default' => ''),
		'drop-initial-after-align' => array('filter' => 'text', 'default' => ''),
		'drop-initial-before-adjust' => array('filter' => 'text', 'default' => ''),
		'drop-initial-before-align' => array('filter' => 'text', 'default' => ''),
		'drop-initial-size' => array('filter' => 'text', 'default' => ''),
		'drop-initial-value' => array('filter' => 'text', 'default' => ''),
		'inline-box-align' => array('filter' => 'text', 'default' => ''),
		'line-stacking' => array('filter' => 'text', 'default' => ''),
		'line-stacking-ruby' => array('filter' => 'text', 'default' => ''),
		'line-stacking-shift' => array('filter' => 'text', 'default' => ''),
		'line-stacking-strategy' => array('filter' => 'text', 'default' => ''),
		'text-height' => array('filter' => 'text', 'default' => ''),
		'list-style' => array('filter' => 'text', 'default' => ''),
		'list-style-image' => array('filter' => 'text', 'default' => ''),
		'list-style-position' => array('filter' => 'text', 'default' => ''),
		'list-style-type' => array('filter' => 'text', 'default' => ''),
		'margin' => array('filter' => 'text', 'default' => ''),
		'margin-bottom' => array('filter' => 'text', 'default' => ''),
		'margin-left' => array('filter' => 'text', 'default' => ''),
		'margin-right' => array('filter' => 'text', 'default' => ''),
		'margin-top' => array('filter' => 'text', 'default' => ''),
		'marquee-direction' => array('filter' => 'text', 'default' => ''),
		'marquee-play-count' => array('filter' => 'text', 'default' => ''),
		'marquee-speed' => array('filter' => 'text', 'default' => ''),
		'marquee-style' => array('filter' => 'text', 'default' => ''),
		'column-count' => array('filter' => 'text', 'default' => ''),
		'column-fill' => array('filter' => 'text', 'default' => ''),
		'column-gap' => array('filter' => 'text', 'default' => ''),
		'column-rule' => array('filter' => 'text', 'default' => ''),
		'column-rule-color' => array('filter' => 'text', 'default' => ''),
		'column-rule-style' => array('filter' => 'text', 'default' => ''),
		'column-rule-width' => array('filter' => 'text', 'default' => ''),
		'column-span' => array('filter' => 'text', 'default' => ''),
		'column-width' => array('filter' => 'text', 'default' => ''),
		'columns' => array('filter' => 'text', 'default' => ''),
		'padding' => array('filter' => 'text', 'default' => ''),
		'padding-bottom' => array('filter' => 'text', 'default' => ''),
		'padding-left' => array('filter' => 'text', 'default' => ''),
		'padding-right' => array('filter' => 'text', 'default' => ''),
		'padding-top' => array('filter' => 'text', 'default' => ''),
		'fit' => array('filter' => 'text', 'default' => ''),
		'fit-position' => array('filter' => 'text', 'default' => ''),
		'image-orientation' => array('filter' => 'text', 'default' => ''),
		'page' => array('filter' => 'text', 'default' => ''),
		'size' => array('filter' => 'text', 'default' => ''),
		'bottom' => array('filter' => 'text', 'default' => ''),
		'clear' => array('filter' => 'text', 'default' => ''),
		'clip' => array('filter' => 'text', 'default' => ''),
		'cursor' => array('filter' => 'text', 'default' => ''),
		'display' => array('filter' => 'text', 'default' => ''),
		'float' => array('filter' => 'text', 'default' => ''),
		'left' => array('filter' => 'text', 'default' => ''),
		'overflow' => array('filter' => 'text', 'default' => ''),
		'position' => array('filter' => 'text', 'default' => ''),
		'right' => array('filter' => 'text', 'default' => ''),
		'top' => array('filter' => 'text', 'default' => ''),
		'visibility' => array('filter' => 'text', 'default' => ''),
		'z-index' => array('filter' => 'text', 'default' => ''),
		'orphans' => array('filter' => 'text', 'default' => ''),
		'page-break-after' => array('filter' => 'text', 'default' => ''),
		'page-break-before' => array('filter' => 'text', 'default' => ''),
		'page-break-inside' => array('filter' => 'text', 'default' => ''),
		'widows' => array('filter' => 'text', 'default' => ''),
		'ruby-align' => array('filter' => 'text', 'default' => ''),
		'ruby-overhang' => array('filter' => 'text', 'default' => ''),
		'ruby-position' => array('filter' => 'text', 'default' => ''),
		'ruby-span' => array('filter' => 'text', 'default' => ''),
		'mark' => array('filter' => 'text', 'default' => ''),
		'mark-after' => array('filter' => 'text', 'default' => ''),
		'mark-before' => array('filter' => 'text', 'default' => ''),
		'phonemes' => array('filter' => 'text', 'default' => ''),
		'rest' => array('filter' => 'text', 'default' => ''),
		'rest-after' => array('filter' => 'text', 'default' => ''),
		'rest-before' => array('filter' => 'text', 'default' => ''),
		'voice-balance' => array('filter' => 'text', 'default' => ''),
		'voice-duration' => array('filter' => 'text', 'default' => ''),
		'voice-pitch' => array('filter' => 'text', 'default' => ''),
		'voice-pitch-range' => array('filter' => 'text', 'default' => ''),
		'voice-rate' => array('filter' => 'text', 'default' => ''),
		'voice-stress' => array('filter' => 'text', 'default' => ''),
		'voice-volume' => array('filter' => 'text', 'default' => ''),
		'border-collapse' => array('filter' => 'text', 'default' => ''),
		'border-spacing' => array('filter' => 'text', 'default' => ''),
		'caption-side' => array('filter' => 'text', 'default' => ''),
		'empty-cells' => array('filter' => 'text', 'default' => ''),
		'table-layout' => array('filter' => 'text', 'default' => ''),
		'color' => array('filter' => 'text', 'default' => ''),
		'direction' => array('filter' => 'text', 'default' => ''),
		'letter-spacing' => array('filter' => 'text', 'default' => ''),
		'line-height' => array('filter' => 'text', 'default' => ''),
		'text-align' => array('filter' => 'text', 'default' => ''),
		'text-decoration' => array('filter' => 'text', 'default' => ''),
		'text-indent' => array('filter' => 'text', 'default' => ''),
		'text-transform' => array('filter' => 'text', 'default' => ''),
		'unicode-bidi' => array('filter' => 'text', 'default' => ''),
		'vertical-align' => array('filter' => 'text', 'default' => ''),
		'white-space' => array('filter' => 'text', 'default' => ''),
		'word-spacing' => array('filter' => 'text', 'default' => ''),
		'hanging-punctuation' => array('filter' => 'text', 'default' => ''),
		'punctuation-trim' => array('filter' => 'text', 'default' => ''),
		'text-align-last' => array('filter' => 'text', 'default' => ''),
		'text-justify' => array('filter' => 'text', 'default' => ''),
		'text-outline' => array('filter' => 'text', 'default' => ''),
		'text-overflow' => array('filter' => 'text', 'default' => ''),
		'text-shadow' => array('filter' => 'text', 'default' => ''),
		'text-wrap' => array('filter' => 'text', 'default' => ''),
		'word-break' => array('filter' => 'text', 'default' => ''),
		'word-wrap' => array('filter' => 'text', 'default' => ''),
		'transform' => array('filter' => 'text', 'default' => ''),
		'transform-origin' => array('filter' => 'text', 'default' => ''),
		'transform-style' => array('filter' => 'text', 'default' => ''),
		'perspective' => array('filter' => 'text', 'default' => ''),
		'perspective-origin' => array('filter' => 'text', 'default' => ''),
		'backface-visibility' => array('filter' => 'text', 'default' => ''),
		'transition' => array('filter' => 'text', 'default' => ''),
		'transition-property' => array('filter' => 'text', 'default' => ''),
		'transition-duration' => array('filter' => 'text', 'default' => ''),
		'transition-timing-function' => array('filter' => 'text', 'default' => ''),
		'transition-delay' => array('filter' => 'text', 'default' => ''),
		'appearance' => array('filter' => 'text', 'default' => ''),
		'box-sizing' => array('filter' => 'text', 'default' => ''),
		'icon' => array('filter' => 'text', 'default' => ''),
		'nav-down' => array('filter' => 'text', 'default' => ''),
		'nav-index' => array('filter' => 'text', 'default' => ''),
		'nav-left' => array('filter' => 'text', 'default' => ''),
		'nav-right' => array('filter' => 'text', 'default' => ''),
		'nav-up' => array('filter' => 'text', 'default' => ''),
		'outline-offset' => array('filter' => 'text', 'default' => ''),
		'resize' => array('filter' => 'text', 'default' => ''),
	);

	public function style()
	{
		return self::$style;
	}

	public function setButton($button)
	{
		$this->button = $button;
		return $this;
	}

	protected function stylize(&$cssStyles)
	{
		$style = '';
		foreach ($cssStyles as $cssStyle => $setting) {
			if (!empty($cssStyle) && isset(self::$style[$cssStyle])) {
				$style .= $cssStyle . ':' . trim($setting, "'") . ';';
			}
		}
		return $style;
	}

	public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
	{
        $elementName = (
            isset($parser->wysiwyg)
            && $this->wysiwygTagType

            ?
                $this->wysiwygTagType
            :
                $this->htmlTagType
        );

        $element = $parser->element('WikiLingo\\Expression\\Plugin', $elementName);

        $this->parameterDefaults($plugin->parameters);
		$style = $this->stylize($plugin->parameters);
		$this->attributeDefaults($plugin->attributes);

        $element->attributes['id'] = $this->id($plugin->index);
        $element->attributes['class'] = (empty($plugin->attributes['class']) ? '' : ' ' ) . 'wl-plugin-' . $this->type;
        if (!empty($style)) {
            $element->attributes['style'] = $style;
        }

        if (empty($this->type)) {
            throw new \Exception("Plugin attribute 'type' not set");
        }
        $element->detailedAttributes['data-plugintype'] = $this->type;
        $element->detailedAttributes['data-pluginparameters'] = urlencode(json_encode($plugin->parameters));
        $element->detailedAttributes['data-isinline'] = $plugin->isInline;

		if (empty($body)) {
            $element->setInline();
        } else {
            $element->staticChildren[] = $body;
        }

		return $element->render();
	}
}
