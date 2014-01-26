<?php
namespace WikiLingo\Expression;

use Types\Type;
use WikiLingo;

/**
 * Class Code
 * @package WikiLingo\Expression
 */
class Code extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $id = $this->id();
        $element = $parser->element(__CLASS__, 'textarea');
        $element->attributes['id'] = $id;
        $element->attributes['disabled'] = 'true';
	    $element->detailedAttributes['contenteditable'] = 'false';
        $code = $this->parsed->text;
        $mode = '';

        if ($code{0} !== ' ') {
            $pattern = '/^(?P<mode>[a-zA-Z]+)/';
            preg_match($pattern, $code, $matches);
            if (!empty($matches['mode'])) {
                switch ($matches['mode']) {
                    case 'wikiLingo':
                        $element->detailedAttributes['mode'] = $mode = $matches['mode'];
                        break;
                }

                if (!empty($mode)) {
                    $code = substr($code, strlen($mode));
                }
            }
        }

        $element->staticChildren[] = $code;

        $scripts = Type::Scripts($parser->scripts)
            ->addScriptLocation("~/bower_components/CodeMirror/lib/codemirror.js")
            ->addCssLocation("wikiLingo/bower_components/CodeMirror/lib/codemirror.css")
            ->addScript(<<<JS
var editor = CodeMirror.fromTextArea(document.getElementById('{$id}'), {
    mode: '{$mode}',
    lineNumbers: false,
    readOnly: true
});
JS
            );

        if ($mode !== '') {
            $scripts->addScriptLocation("~/bower_components/wikiLingoCodeMirror/{$mode}.js");
        }

        return $element->render();
    }
}