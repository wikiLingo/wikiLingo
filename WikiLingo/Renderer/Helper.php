<?php
namespace WikiLingo\Renderer;

/**
 * Class Helper
 * @package WikiLingo\Renderer
 */
class Helper extends Element
{
	public $detailedAttributesClass = 'helper';

    /**
     * @param String $name
     */
    function __construct($name)
    {
        $this->name = $name;

	    $this->detailedAttributes['data-helper'] = 'true';
	    $this->detailedAttributes['contenteditable'] = 'false';
	    $this->detailedAttributes['ondragstart'] = 'return false;';
    }
}