<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;
use WikiLingo\Expression\Tensor;

class toc extends HtmlBase
{
	public $type = 'toc';
	public $htmlTagType = 'div';
    public static $ordered = true;
	public $inlineOnly = true;

    public function render(WikiLingo\Expression\Plugin &$plugin, $body, &$parser)
    {
	    $result = '';
        if (!isset($parser->types['WikiLingo\Expression\Header'])) {
	        $rendered = parent::render($plugin, $result, $parser);
	        return $rendered;
        }

        $headers =& $parser->types['WikiLingo\Expression\Header'];
        $tagType = ($plugin->parameter('ordered') != "false" ? 'ol' : 'ul');

	    $tensor = null;

	    foreach($headers as &$header)
	    {
		    $header->pointer = true;
		    $block =& Type::WikiLingoExpressionHeader($header)->block;
		    $block->collectionElementName = $tagType;
		    $block->elementName = "li";

		    if ($tensor == null) {
			    $tensor = new Tensor\Flat($block);
		    } else {
			    $tensor->add(new Tensor\Hierarchical($block));
		    }
	    }
	    $result = $tensor->render();
	    foreach($headers as &$header)
	    {
		    $header->pointer = false;
	    }

        $rendered = parent::render($plugin, $result, $parser);
        return $rendered;
    }
}