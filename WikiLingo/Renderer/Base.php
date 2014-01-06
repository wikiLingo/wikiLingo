<?php
namespace WikiLingo\Renderer;

/**
 * Class Base
 * @package WikiLingo\Renderer
 */
class Base
{
    public $children = array();
    public $staticChildren = array();

    /**
     * @return string
     */
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