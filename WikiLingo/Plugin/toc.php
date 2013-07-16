<?php

class WikiLingo_Plugin_toc extends WikiLingo_Plugin_HtmlBase
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
                    $result .= str_repeat("<" . $tagType . ">", $header->count - $lastI);
                }

                if ($lastI > $header->count) {
                    $result .= str_repeat("</" . $tagType . ">", $lastI - $header->count);
                }
            }
            $result .= '<li>' . $header->render($parser);
            if ($key > 0) {
                $result .= '</li>';
            }
            $lastI = $header->count;
        }

        $child = new WikiLingo_Expression_Tag('<' . $tagType . '>', '</' . $tagType . '>', $result);
        $plugin->body = $child;
        $result = parent::render($plugin, $parser);
        return $result;
    }
}
