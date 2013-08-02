<?php
namespace WikiLingo\Renderer;

class Base
{
    public $children = array();
    public $staticChildren = array();

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