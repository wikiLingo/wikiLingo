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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $id = $this->id();
        $element = $renderer->element(__CLASS__, 'textarea');
        $element->attributes['id'] = $id;
        $element->classes[] = 'Code';
        $code = $this->parsed->text;
        $mode = '';

        if (!$parser->wysiwyg) {
            $element->attributes['disabled'] = 'true';

            if ($code{0} !== ' ') {
                $pattern = '/^(?P<mode>[a-zA-Z0-9]+)/';
                preg_match($pattern, $code, $matches);
                if (!empty($matches['mode'])) {
                    //if the mode is not set, normalize it to lower-case
                    switch (strtolower($matches['mode'])) {
                        case 'wikilingo':
                            $mode = 'wikiLingo';
                            $element->detailedAttributes['mode'] = $matches['mode'];
                            break;
                        default:
                            $mode = $matches['mode'];
                            $element->detailedAttributes['mode'] = $mode;
                    }
                }
            }

            if (!empty($mode)) {
                $code = substr($code, strlen($mode));

                $element->detailedAttributes['data-mode'] = $mode;


                $parser->scripts
                    ->addScriptLocation("~codemirror/codemirror/lib/codemirror.js")
                    ->addCssLocation("~codemirror/codemirror/lib/codemirror.css")

                    //Make codemirror auto height to the contents
                    ->addCss(<<<CSS
.CodeMirror {
    height: auto;
}
.CodeMirror-scroll {
    overflow-y: hidden;
    overflow-x: auto;
}
CSS
                    )
                    ->addScript(<<<JS
var editor = CodeMirror.fromTextArea(document.getElementById('{$id}'), {
    mode: '{$mode}',
    lineNumbers: false,
    readOnly: true
});
JS
                    );

                //TODO: needs more logic to pull out js and css for possible code
                if ($mode == 'wikiLingo') {
                    $parser->scripts
                        ->addCssLocation("~wikilingo/codemirror/wikiLingo.css")
                        ->addScriptLocation("~wikilingo/codemirror/wikiLingo.js");
                } else {
                    $parser->scripts
                        //->addCssLocation("~codemirror/codemirror/mode/{$mode}/{$mode}.css")
                        ->addScriptLocation("~codemirror/codemirror/mode/{$mode}/{$mode}.js");
                }
            }
        }

        $element->staticChildren[] = $code;

        return $element->render();
    }
}