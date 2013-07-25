<?php


class WikiParser_PluginOutputTest extends PHPUnit_Framework_TestCase
{
	function testWikiToWikiOutput()
	{
		$output = WikiParser_PluginOutput::wiki('^Hello world!^');

		$this->assertEquals('^Hello world!^', $output->toWiki());
	}

	function testWikiToHtmlOutput()
	{
		$output = WikiParser_PluginOutput::wiki('^Hello world!^');

		$this->assertContains('<div class="simplebox">Hello world!</div>', $output->toHtml());
	}

	function testHtmlToWikiOutput()
	{
		$output = WikiParser_PluginOutput::html('<div>Hello</div>');

		$this->assertEquals('~np~<div>Hello</div>~/np~', $output->toWiki());
	}

	function testHtmlToHtmlOutput()
	{
		$output = WikiParser_PluginOutput::html('<div>Hello</div>');

		$this->assertEquals('<div>Hello</div>', $output->toHtml());
	}

	function testInternalError()
	{
		$output = WikiParser_PluginOutput::internalError(tra('Unknown conversion'));
		
		$this->assertContains('Unknown conversion', $output->toHtml());
	}

	function testMissingArguments()
	{
		$output = WikiParser_PluginOutput::argumentError(array('id', 'test'));

		$this->assertContains('<li>id</li>', $output->toHtml());
	}
}

