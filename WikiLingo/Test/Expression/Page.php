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
||Row One, Column One|Row One, Column Two
Row Two, Column One|Row Two, Column Two||

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
			"<h1 id='+WYSIWYG+Sample+Page'> WYSIWYG Sample Page</h1>" .
			'<br/>' .
			'Start off by clicking "edit" then switching the editor to use the wysiwyg editor using the ' .
			"<span id='html1'/> button on the toolbar." .
			"<h2 id='+Text+formatting'> Text formatting</h2><br/>" .
			'<strong>bold</strong><br/>' .
			"<i>italic</i><br/>" .
			'<u>underlined</u><br/>' .
			'<div class="center">centred text</div>' .
			'<br/>' .
			"<h2 id='+Lists+and+table'> Lists and table</h2>" .
			'<ul>' .
				'<li>' .
					'An unordered list item' .
						'<ul>' .
							'<li>A subitem</li>' .
						'</ul>' .
				'</li>' .
            "</ul>" .
            "<br/>" .
            'And some text' .
            '<ul>' .
				'<li>Another item</li>' .
            '</ul>' .
            "<br/>" .
            '. . . and more text . . .' .
            '<ul>' .
				'<li>Item 3</li>' .
			'</ul>' .
			"<br/>. . . and some more text, to illustrate the line spacing." .
			"<br/>" .
			"<br/>" .
			"A table:" .
			"<br/>" .
			"<table>" .
				"<tr>" .
					"<td>Row One, Column One</td>" .
					"<td>Row One, Column Two</td>" .
				"</tr>" .
				"<tr>" .
					"<td>Row Two, Column One</td>" .
					"<td>Row Two, Column Two</td>" .
				"</tr>" .
			"</table>" .
			"<br/>" .
			"<br/>" .
			'<div class="box">A box</div>' .
			"<br/>" .
			"<br/>" .
			"A <a href='http://tiki.org'>link|nocache</a>" .
			"<br/>" .
			"<br/>" .
			"<strong>And these are produced by wiki plugins:</strong><br/>" .
			"<h2 id='+Plugins'> Plugins</h2>" .
			"<h3 id='+Quote+plugin%3A'> Quote plugin:</h3>" .
			"<br/>" .
			"<span id='html2'>" .
				'<br class="hidden"/>' .
				"Just what do you think you're doing, Dave?" .
				'<br class="hidden"/>' .
				'<br class="hidden"/>' .
				"<strong>HAL, in 2001:</strong>" .
				" A Space Odyssey (1968)" .
				'<br class="hidden"/>' .
			"</span><br/>" .
			"<h3 id='+Code+plugin%3A'> Code plugin:</h3>" .
			"<br/>" .
			"<span id='html3'>" .
				'<br class="hidden"/>' .
				'program HelloWorld(output);' .
				'<br class="hidden"/>' .
				'begin<br class="hidden"/>' .
				"  WriteLn('Hello World!');" .
				'<br class="hidden"/>' .
				'end.' .
				'<br class="hidden"/>' .
			'</span>';
	}
}
