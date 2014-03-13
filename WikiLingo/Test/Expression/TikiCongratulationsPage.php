<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TikiCongratulationsPage extends Base
{
	public function __construct()
	{

		$this->source = '!Congratulations!
This is the default homepage for your Tiki. If you are seeing this page, your installation was successful.
You can change this page after logging in. Please review the  for editing details.

!!<img src="img/icons/star.png"/> Get started.
To begin configuring your site:

!!<img src="img/icons/help.png"/> Need help?
For more information:
*[http://info.tiki.org/Learn More|Learn more about Tiki].
*[http://info.tiki.org/Help Others|Get help], including the [http://doc.tiki.org|official documentation] and [http://tiki.org/forums|support forums].
*[http://info.tiki.org/Join the community|Join the Tiki community].';

		$this->expected =
			"<h1 id='Congratulations%21'>Congratulations!</h1>" .
            "This is the default homepage for your Tiki. If you are seeing this page, your installation was successful.<br/>" .
            "You can change this page after logging in. Please review the <span class='whitespace'> </span>for editing details.<br/>" .
            "<h2 id='+Get+started.'><img src=\"img/icons/star.png\"/><span class='whitespace'> </span>Get started.</h2>" .
            "To begin configuring your site:<br/>" .
            "<h2 id='+Need+help%3F'><img src=\"img/icons/help.png\"/><span class='whitespace'> </span>Need help?</h2>" .
            "For more information:" .
            "<ul>" .
            "<li><a href='http://info.tiki.org/Learn More'>Learn more about Tiki</a>.</li>" .
            "<li><a href='http://info.tiki.org/Help Others'>Get help</a>, including the <a href='http://doc.tiki.org'>official documentation</a><span class='whitespace'> </span>and <a href='http://tiki.org/forums'>support forums</a>.</li>" .
            "<li><a href='http://info.tiki.org/Join the community'>Join the Tiki community</a>.</li>" .
            "</ul>";

	}
}
