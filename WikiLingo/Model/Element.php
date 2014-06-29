<?php
namespace WikiLingo\Model;

class Element extends Base
{
    public $type;
    public $name;
    public $state = "standard";
    public $attributes = array();
    public $detailedAttributes = array();
    public $useDetailedAttributes = false;
	public $classes = array();
	public $detailedAttributesClass = 'element';

    /**
     * @param $type
     * @param $name
     */
    function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;

	    $this->detailedAttributes['data-type'] = $type;
	    $this->detailedAttributes['data-element'] = 'true';
    }

    /**
     *
     */
    function setInline()
    {
        $this->state = "inline";
    }

    /**
     *
     */
    function setStandard()
    {
        $this->state = "standard";
    }

    /**
     *
     */
    function setOpen()
    {
        $this->state = "open";
    }

    /**
     *
     */
    function setClose()
    {
        $this->state = "closed";
    }

    /**
     * tag creation, should only be used with items that are directly related to wiki syntax, buttons etc, should use Helper
     *
     * @return  string  $tag desired output from syntax
     */
    public function render()
    {
        $open = "<" . $this->name;
	    $attributes = array();

	    if ($this->useDetailedAttributes && !empty($this->detailedAttributesClass)) {
		    $this->classes[] = $this->detailedAttributesClass;
	    }

	    if (!empty($this->classes)) {
		    $attributes[] = "class='" . implode($this->classes, ' ') . "'";
	    }

        if (!empty($this->attributes)) {
            foreach ($this->attributes as $attribute => $value) {
	            if (strtolower($attribute) != 'class') {
                    $attributes[] = $attribute . "='" . addslashes(trim($value)) . "'";
	            }
            }
        }

        if ($this->useDetailedAttributes && !empty($this->detailedAttributes)) {
            foreach ($this->detailedAttributes as $attribute => $value) {
                if (strtolower($attribute) != 'class') {
                    $attributes[] = $attribute . "='" . addslashes(trim($value)) . "'";
                }
            }
        }

	    if (isset($attributes[0])) {
	        $open .= ' ' . implode($attributes, ' ');
	    }

        switch ($this->state) {
            case "inline": $open .= "/>";
                return $open;
            case "standard":
                $open .= ">";
                $close = "</" . $this->name . ">";
                return $open . $this->renderChildren() . $close;
            case "open": $open .= ">";
                return $open;
            case "close":
                $close = '</' . $this->name . '>';
                return $close;
        }
    }

    /**
     * @param String $attr
     * @param String $value
     * @return $this
     */
    public function setAttribute($attr, $value)
	{
		$this->attributes[$attr] = $value;
		return $this;
	}
}