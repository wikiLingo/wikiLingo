<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class TikiCongratulationsPageFireFoxPostBack extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = (new WikiLingoTestExpression\TikiCongratulationsPage($parser))->source;
		$this->source = <<<HTML
<h1 class='element' id='Congratulations%21' data-type='WikiLingo\\Expression\\Header' data-element='true'>Congratulations!</h1><br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/>This is the default homepage for your Tiki. If you are seeing this page, your installation was successful.<br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/>You can change this page after logging in. Please review the <span class='whitespace element' data-type='WikiLingo\\Expression\\WhiteSpace' data-element='true'> </span>for editing details.<br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/><h2 class='element' id='+Get+started.' data-type='WikiLingo\\Expression\\Header' data-element='true'><img src="img/icons/star.png"/><span class='whitespace element' data-type='WikiLingo\\Expression\\WhiteSpace' data-element='true'> </span>Get started.</h2><br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/>To begin configuring your site:<br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/><h2 class='element' id='+Need+help%3F' data-type='WikiLingo\\Expression\\Header' data-element='true'><img src="img/icons/help.png"/><span class='whitespace element' data-type='WikiLingo\\Expression\\WhiteSpace' data-element='true'> </span>Need help?</h2><br class='element' data-type='WikiLingo\\Expression\\Line' data-element='true'/>For more information:<ul class='element' data-type='WikiLingo\\Expression\\Block' data-element='true' data-parent='true'><li class='element' data-type='WikiLingo\\Expression\\Block' data-element='true' data-block-type='unorderedListItem' data-has-line-before='true'><a class='element' href='http://info.tiki.org/Learn More' data-type='WikiLingo\\Expression\\Link' data-element='true' data-href='http://info.tiki.org/Learn More'>Learn more about Tiki</a>.</li><li class='element' data-type='WikiLingo\\Expression\\Block' data-element='true' data-block-type='unorderedListItem'><a class='element' href='http://info.tiki.org/Help Others' data-type='WikiLingo\\Expression\\Link' data-element='true' data-href='http://info.tiki.org/Help Others'>Get help</a>, including the <a class='element' href='http://doc.tiki.org' data-type='WikiLingo\\Expression\\Link' data-element='true' data-href='http://doc.tiki.org'>official documentation</a><span class='whitespace element' data-type='WikiLingo\\Expression\\WhiteSpace' data-element='true'> </span>and <a class='element' href='http://tiki.org/forums' data-type='WikiLingo\\Expression\\Link' data-element='true' data-href='http://tiki.org/forums'>support forums</a>.</li><li class='element' data-type='WikiLingo\\Expression\\Block' data-element='true' data-block-type='unorderedListItem'><a class='element' href='http://info.tiki.org/Join the community' data-type='WikiLingo\\Expression\\Link' data-element='true' data-href='http://info.tiki.org/Join the community'>Join the Tiki community</a>.</li></ul>
HTML;
	}
}
