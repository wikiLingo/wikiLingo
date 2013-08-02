<?php
namespace WikiLingo\Renderer;

class Element extends Base
{
    public $type;
    public $name;
    public $state = "standard";
    public $attributes = array();
	public $classes = array();

    function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    function setInline()
    {
        $this->state = "inline";
    }

    function setStandard()
    {
        $this->state = "standard";
    }

    function setOpen()
    {
        $this->state = "open";
    }

    function setClose()
    {
        $this->state = "closed";
    }

    /**
     * tag creation, should only be used with items that are directly related to wiki syntax, buttons etc, should use createWikiHelper
     *
     * @access  public
     * @return  string  $tag desired output from syntax
     */
    public function render()
    {
        $open = "<" . $this->name;

        if (!empty($this->attributes)) {
            foreach ($this->attributes as $attribute => $value) {
	            if (strtolower($attribute) != 'class') {
                    $open .= " " . $attribute . "='" . addslashes(trim($value)) . "'";
	            }
            }
        }

	    if (!empty($this->classes)) {
		    $open .= ' class="' . implode($this->classes, ' ') . '"';
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
}