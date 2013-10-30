<?php
namespace WikiLingo\Plugin;

class div extends HtmlBase
{
	public $type = 'div';
    public $htmlTagType = 'div';
	public $documentation = 'PluginDIV';
	public $validate = 'all';
	public $filter = 'rawhtml_unsafe';
	public $icon = 'img/icons/mime/html.png';
	public $tags = array( 'basic' );
}
