<?php
namespace WikiLingo\Model;

/**
 * Class Helper
 * @package WikiLingo\Model
 */
class Helper extends Element
{
	public $detailedAttributesClass = 'wl-helper';

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