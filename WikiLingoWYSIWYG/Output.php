<?php

namespace WikiLingoWYSIWYG;
use WikiLingo;

class Output extends WikiLingo\Output
{
    /**
     * tag helper creation, noise items that will be disposed
     *
     * @access  public
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $params array what params to add to the tag, array, key = param, value = value
     * @param   $type default is "standard", of types : standard, inline, open, close
     * @return  string  $tag desired output from syntax
     */
    public function createWikiHelper($syntaxType, $tagType, $content = "", $attributes = array(), $type = "standard")
    {
        if (!isset($attributes['class'])) {
            $attributes['class'] = "";
        }

        $attributes['class'] .= " wlwh"; //WikiLingo WYSIWYG Helper tag

        $attributes['class'] = trim($attributes['class']);

        return parent::createWikiHelper($syntaxType, $tagType, $content, $attributes, $type);
    }

    /**
     * tag creation, should only be used with items that are directly related to wiki syntax, buttons etc, should use createWikiHelper
     *
     * @access  public
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $params array what params to add to the tag, array, key = param, value = value
     * @param   $type string the content to be ignored and for tag to close, ie <tag />
     * @return  string  $tag desired output from syntax
     */
    public function createWikiTag($syntaxType, $tagType, $content = "", $params = array(), $type = "standard")
    {
        if ($type != "close") {
            $params['data-i'] = self::incrementTypeIndex($syntaxType);
            $params['data-t'] = self::typeShorthand($syntaxType);

            if (!isset($params['class'])) {
                $params['class'] = "";
            }

            $params['class'] .= " wlw"; //WikiLingo WYSIWYG tag

            $params['class'] = trim($params['class']);
        }

        if ($this->isRepairing($syntaxType) == true) {
            $params['data-repair'] = true;
        }

        return parent::createWikiTag($syntaxType, $tagType, $content, $params, $type);
    }
}