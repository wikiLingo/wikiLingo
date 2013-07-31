<?php
namespace WikiLingo;

class Element
{
    public $type;
    public $state = "standard";
    public $attributes = array();
	public $classes = array('wl-element');

    public $children = array();
	public $staticChildren = array();

    function __construct($type)
    {
        $this->type = $type;
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
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $params array what params to add to the tag, array, key = param, value = value
     * @param   $inline bool the content to be ignored and for tag to close, ie <tag />
     * @return  string  $tag desired output from syntax
     */
    public function render()
    {
        $open = "<" . $this->type;

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
                $close = "</" . $this->type . ">";
                return $open . $this->renderChildren() . $close;
            case "open": $open .= ">";
                return $open;
            case "close":
                $close = '</' . $this->type . '>';
                return $close;
        }
    }

    public function renderChildren()
    {
        $children = '';

	    if (empty($this->staticChildren)) {
		    foreach($this->children as &$child) {
			    $children .= $child->render();
		    }
	    } else {
		    $children .= implode($this->staticChildren, '');
	    }

        return $children;
    }
}