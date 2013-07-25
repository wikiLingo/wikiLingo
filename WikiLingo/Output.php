<?php

namespace WikiLingo;
use WikiLingo;

class Output
{

    public $disposable = false;

    /**
     * tag helper creation, noise items that will be disposed
     *
     * @access  public
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $attributes array what params to add to the tag, array, key = param, value = value
     * @param   $type default is "standard", of types : standard, inline, open, close
     * @return  string  $tag desired output from syntax
     */
    public function renderWikiHelper(HtmlElement &$element)
    {
        $tagOpen = "<" . $element->tagType;

        if (!empty($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $tagOpen .= " " . $attribute . "='" . $value . "'";
            }
        }

        switch ($element->type) {
            case "inline": $tagOpen .= "/>";
                return $tagOpen;
            case "standard":
                $tagOpen .= ">";
                $tagClosed = "</" . $element->tagType . ">";
                return $tagOpen . $element->renderContent() . $tagClosed;
            case "open": $tagOpen .= ">";
                return $tagOpen;
            case "close":
                $tagClosed = '</' .$element->tagType . '>';
                return $tagClosed;
        }
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
    public function renderWikiTag(HtmlElement &$element)
    {
        $this->isRepairing($element->syntaxType, true);

        $tagOpen = "<" . $element->tagType;

        if (!empty($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $tagOpen .= " " . $attribute . "='" . trim($value) . "'";
            }
        }

        switch ($element->type) {
            case "inline": $tagOpen .= "/>";
                return $tagOpen;
            case "standard":
                $tagOpen .= ">";
                $tagClose = "</" . $element->tagType . ">";
                return $tagOpen . $this->renderContent($element) . $tagClose;
            case "open": $tagOpen .= ">";
                return $tagOpen;
            case "close":
                $tagClose = '</' .$element->tagType . '>';
                return $tagClose;
        }
    }

    public function renderContent($content)
    {
        return $content->render() . $this->renderSiblings();
    }

    public function makeDisposable()
    {
        $this->disposable = true;
        return $this;
    }
}