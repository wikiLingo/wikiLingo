<?php

function tra($text) { return $text; } //translation

require_once 'Zend/Loader/StandardAutoloader.php';
$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true, 'fallback_autoloader' => true));
$dir = dirname(__FILE__);
$loader
    ->registerNamespace('Jison', $dir . '/Jison')
    ->registerNamespace('WikiLingo', $dir)
    ->registerNamespace('WikiLingoWYSIWYG', $dir)
	->register();

$original = "{DIV(color='purple' width='100px')}{DIV()}test{DIV}{DIV}{DIV(color='purple' width='100px')}{DIV()}test{DIV}{DIV}";

$wikiLingo = new WikiLingo();
$output = $wikiLingo->parse($original);
$wikiLingoWYSIWYG = new WikiLingoWYSIWYG();
$outputWYSIWYG = $wikiLingoWYSIWYG->parse($original);
$dts = new WikiLingoWYSIWYG_DTS();
$dtsOutput = $dts->parse($outputWYSIWYG);
?>
<html>
<head>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        // This code is generally not necessary, but it is here to demonstrate
        // how to customize specific editor instances on the fly. This fits well
        // this demo because we have editable elements (like headers) that
        // require less features.

        // The "instanceCreated" event is fired for every editor instance created.
        CKEDITOR.on( 'instanceCreated', function( event ) {
            var editor = event.editor,
                element = editor.element;

            // Customize editors for headers and tag list.
            // These editors don't need features like smileys, templates, iframes etc.
            if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
                // Customize the editor configurations on "configLoaded" event,
                // which is fired after the configuration file loading and
                // execution. This makes it possible to change the
                // configurations before the editor initialization takes place.
                editor.on( 'configLoaded', function() {

                    // Remove unnecessary plugins to make the editor simpler.
                    editor.config.removePlugins = 'colorbutton,find,flash,font,' +
                        'forms,iframe,image,newpage,removeformat,' +
                        'smiley,specialchar,stylescombo,templates';

                    // Rearrange the layout of the toolbar.
                    editor.config.toolbarGroups = [
                        { name: 'editing',		groups: [ 'basicstyles', 'links' ] },
                        { name: 'undo' },
                        { name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
                        { name: 'about' }
                    ];
                });
            }
        });
    </script>
</head>
<body>
    <div contenteditable="false"><?php echo $output;?></div>
    <div contenteditable="true"><?php echo $outputWYSIWYG;?></div>
    <div contenteditable="false"><php echo $dtsOutput;?></div>
    <input type="button" value="To Source"/>
</body>
</html>