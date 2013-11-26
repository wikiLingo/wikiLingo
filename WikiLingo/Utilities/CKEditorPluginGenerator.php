<?php
namespace WikiLingo\Utilities;

use Types\Type;

class CKEditorPluginGenerator
{
    public function __construct()
    {

    }

    public static function generate(&$pluginName, $pluginPermissibleChildren, &$parser)
    {
        Type::Scripts($parser->scripts)->addScript(<<<JS
CKEDITOR.plugins.add('$pluginName', {
    requires: 'widget',
    icons: '$pluginName',
    init: function(editor) {
        editor.widgets.add('$pluginName', {

        });
    }
});
JS
);
    }
} 