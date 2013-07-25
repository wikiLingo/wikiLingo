<?php

namespace WikiLingo\Plugin;
use WikiLingo;

class toc extends WikiLingo\Plugin\HtmlBase
{
	public $type = 'toc';
    public static $ordered = true;

	function __construct()
	{
		$this->params = array(
			'type' => '',
			'maxdepth' => '',
			'title' => '',
			'showhide' => '',
			'nolinks' => '',
			'nums' => '',
			'levels' => ''
		);
	}

    public function render(&$plugin, &$parser)
    {
        if (!isset($parser->types['header'])) {
            return '';
        }

        $headers = $parser->types['header'];
        $result = '';
        $lastI = -1;
        $tagType = (self::$ordered ? 'ol' : 'ul');

        foreach ($headers as $key => $header) {
            if ($lastI > -1) {
                if ($lastI < $header->count) {
                    $difference = $header->count - $lastI;

                    $opening = "<" . $tagType . ">";
                    $result .= $opening;

                    if ($difference > 1) {
                        $result .= str_repeat('<li class="empty">' . $opening, $difference - 1);
                    }
                }

                if ($lastI > $header->count) {
                    $difference = $lastI - $header->count;

                    $closing = "</" . $tagType . ">";

                    $result .= $closing;

                    if ($difference > 1) {
                        $result .= str_repeat('</li>' . $closing, $difference - 1);
                    }
                }
            }
            $result .= '<li>' . $header->render($parser);
            if ($key > 0) {
                $result .= '</li>';
            }
            $lastI = $header->count;
        }

        $child = new WikiLingo\Expression\Tag('<' . $tagType . '>', '</' . $tagType . '>', $result);
        $plugin->body = $child;
        $result = parent::render($plugin, $parser);
        return $result;
    }
}
