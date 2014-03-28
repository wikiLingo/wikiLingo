<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Code
 * @package WikiLingo\Expression
 */
class Code extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $id = $this->id();
        $element = $parser->element(__CLASS__, 'textarea');
        $element->attributes['id'] = $id;
        $element->classes[] = 'Code';
        $code = $this->parsed->text;
        $mode = '';

        if (!$parser->wysiwyg) {
            $element->attributes['disabled'] = 'true';

            if ($code{0} !== ' ') {
                $pattern = '/^(?P<mode>[a-zA-Z]+)/';
                preg_match($pattern, $code, $matches);
                if (!empty($matches['mode'])) {
                    //if the mode is not set, normalize it to lower-case
                    switch (strtolower($matches['mode'])) {
                        case 'wikilingo':
                            $mode = 'wikiLingo';
                            $element->detailedAttributes['mode'] = $matches['mode'];
                            break;
                    }
                }
            }

            if (!empty($mode)) {
                $code = substr($code, strlen($mode));

                $element->detailedAttributes['data-mode'] = $mode;


                $parser->scripts
                    ->addScriptLocation("~/bower_components/CodeMirror/lib/codemirror.js")
                    ->addCssLocation("~/bower_components/CodeMirror/lib/codemirror.css")
                    ->addScript(<<<JS
var editor = CodeMirror.fromTextArea(document.getElementById('{$id}'), {
    mode: '{$mode}',
    lineNumbers: false,
    readOnly: true
});
JS
                    )
                    ->addScriptLocation("~/bower_components/wikiLingoCodeMirror/{$mode}.js");
            }
        }

        $element->staticChildren[] = $code;

        return $element->render();
    }
}