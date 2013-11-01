<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class Page extends Base
{
	public function __construct(WikiLingo\Parser &$parser)
	{
		$parser->typesCount['html'] = 0;
		$this->source = "! WYSIWYG Sample Page
Start off by clicking \"edit\" then switching the editor to use the wysiwyg editor using the {html src=\"pics/icons/pencil_go.png\"} button on the toolbar.
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
{HTML(caption=\"Hello World in Pascal\")}
program HelloWorld(output);
begin
  WriteLn('Hello World!');
end.
{HTML}";

		$this->expected =
			"<h1 id='+WYSIWYG+Sample+Page'> WYSIWYG Sample Page</h1>" .
			'<br/>' . "\n" .
			'Start off by clicking "edit" then switching the editor to use the wysiwyg editor using the ' .
			"<span id='html1'/> button on the toolbar." .
			"<h2 id='+Text+formatting'> Text formatting</h2><br/>\n" .
			'<strong>bold</strong><br/>' . "\n" .
			"<i>italic</i><br/>\n" .
			'<u>underlined</u><br/>' . "\n" .
			'<div class="center">centred text</div>' .
			'<br/>' . "\n" .
			"<h2 id='+Lists+and+table'> Lists and table</h2>" .
			'<ul class="wl-parent">' .
				'<li class="unorderedListItem">' .
					'An unordered list item' .
						'<ul class="wl-parent">' .
							'<li class="unorderedListItem">A subitem</li>' .
						'</ul>' .
				'</li>' .
				'<li class="unorderedListItem">Another item</li>' .
				'<li class="unorderedListItem">Item 3</li>' .
			'</ul>' .
			"<br/>\n" .
			'And some text' .
			"<br/>\n" .
			'. . . and more text . . .' .
			"<br/>\n. . . and some more text, to illustrate the line spacing." .
			"<br/>\n" .
			"<br/>\n" .
			"A table:" .
			"<br/>\n" .
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
			"<br/>\n" .
			"<br/>\n" .
			'<div class="box">A box</div>' .
			"<br/>\n" .
			"<br/>\n" .
			"A <a href='http://tiki.org'>link</a>" .
			"<br/>\n" .
			"<br/>\n" .
			"<strong>And these are produced by wiki plugins:</strong><br/>\n" .
			"<h2 id='+Plugins'> Plugins</h2>" .
			"<h3 id='+Quote+plugin'> Quote plugin</h3>" .
			"<br/>\n" .
			"<span id='html2'>" .
				'<br class="hidden"/>' . "\n" .
				"Just what do you think you're doing, Dave?" .
				'<br class="hidden"/>' . "\n" .
				'<br class="hidden"/>' . "\n" .
				"<strong>HAL, in 2001:</strong>" .
				" A Space Odyssey (1968)" .
				'<br class="hidden"/>' . "\n" .
			"</span><br/>\n" .
			"<h3 id='+Code+plugin'> Code plugin</h3>" .
			"<br/>\n" .
			"<span id='html3'>" .
				'<br class="hidden"/>' . "\n" .
				'program HelloWorld(output);' .
				'<br class="hidden"/>' . "\n" .
				'begin<br class="hidden"/>' . "\n" .
				"  WriteLn('Hello World!');" .
				'<br class="hidden"/>' . "\n" .
				'end.' .
				'<br class="hidden"/>' . "\n" .
			'</span>';
	}
}
