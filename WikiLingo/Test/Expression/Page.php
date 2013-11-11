<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class Page extends Base
{
	public function __construct()
	{
		$this->source = "! WYSIWYG Sample Page
Start off by clicking \"edit\" then switching the editor to use the wysiwyg editor using the {html src=`pics/icons/pencil_go.png`} button on the toolbar.
!! Text formatting
__bold__
''italic''
===underlined===
::centred text::

!! Lists and table
*An unordered list item
**A subitem
And some text
*Another item
. . . and more text . . .
*Item 3
. . . and some more text, to illustrate the line spacing.

A table:
||Row One,  Column One|Row One,  Column Two
Row Two,  Column One|Row Two,  Column Two||

^A box^

A [http://tiki.org|link|nocache]

__And these are produced by wiki plugins:__

!! Plugins
!!! Quote plugin:
{HTML()}
Just what do you think you're doing, Dave?

__HAL, in 2001:__ A Space Odyssey (1968)
{HTML}

!!! Code plugin:
{HTML(caption=`Hello World in Pascal`)}
program HelloWorld(output);
begin
  WriteLn('Hello World!');
end.
{HTML}";

		$this->expected =
			"<h1 id='+WYSIWYG+Sample+Page'><span class='whitespace'> </span>WYSIWYG Sample Page</h1>" .
			"Start off by clicking \"edit\"<span class='whitespace'> </span>then switching the editor to use the wysiwyg editor using the " .
			"<span id='html1'></span><span class='whitespace'> </span>button on the toolbar." .
			"<h2 id='+Text+formatting'><span class='whitespace'> </span>Text formatting</h2>" .
			'<strong>bold</strong><br/>' .
			"<i>italic</i><br/>" .
			'<u>underlined</u><br/>' .
			"<div class='center'>centred text</div>" .
			'<br/>' .
			"<h2 id='+Lists+and+table'><span class='whitespace'> </span>Lists and table</h2>" .
			'<ul>' .
				'<li>' .
					"An unordered list item" .
						'<ul>' .
							'<li>A subitem</li>' .
						'</ul>' .
				'</li>' .
            "</ul>" .
            "And some text" .
            '<ul>' .
				"<li>Another item</li>" .
            '</ul>' .
            '. . . and more text . . .' .
            '<ul>' .
				"<li>Item 3</li>" .
			'</ul>' .
			". . . and some more text, to illustrate the line spacing." .
			"<br/>" .
			"<br/>" .
			"A table:" .
			"<br/>" .
			"<table>" .
				"<tr>" .
					"<td>Row One, <span class='whitespace'> </span>Column One</td>" .
					"<td>Row One, <span class='whitespace'> </span>Column Two</td>" .
				"</tr>" .
				"<tr>" .
					"<td>Row Two, <span class='whitespace'> </span>Column One</td>" .
					"<td>Row Two, <span class='whitespace'> </span>Column Two</td>" .
				"</tr>" .
			"</table>" .
			"<br/>" .
			"<div class='box'>A box</div>" .
			"<br/>" .
			"<br/>" .
			"A <a href='http://tiki.org'>link|nocache</a>" .
			"<br/>" .
			"<br/>" .
			"<strong>And these are produced by wiki plugins:</strong>" .
			"<br/>" .
			"<h2 id='+Plugins'><span class='whitespace'> </span>Plugins</h2>" .
			"<h3 id='+Quote+plugin%3A'><span class='whitespace'> </span>Quote plugin:</h3>" .
			"<span id='html2'>" .
				"<br class='hidden'/>" .
				"Just what do you think you're doing, Dave?" .
				"<br class='hidden'/>" .
				"<br class='hidden'/>" .
				"<strong>HAL, in 2001:</strong>" .
				"<span class='whitespace'> </span>A Space Odyssey (1968)" .
				"<br class='hidden'/>" .
			"</span><br/>" .
			"<h3 id='+Code+plugin%3A'><span class='whitespace'> </span>Code plugin:</h3>" .
			"<span id='html3'>" .
				"<br class='hidden'/>" .
				'program HelloWorld(output);' .
				"<br class='hidden'/>" .
				"begin<br class='hidden'/>" .
				"<span class='whitespace'>  </span>WriteLn('Hello World!');" .
				"<br class='hidden'/>" .
				'end.' .
				"<br class='hidden'/>" .
			'</span>';
	}
}
