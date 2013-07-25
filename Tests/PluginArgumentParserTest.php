<?php

class WikiParser_PluginArgumentParserTest extends TikiTestCase
{
	function testSingleSimpleArgument()
	{
		$out = array('foo' => 'bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=bar'), $out);
		$this->assertEquals($parser->parse('foo=>bar'), $out);
		$this->assertEquals($parser->parse('foo => bar'), $out);
	}

	function testSingleArgumentWithQuotes()
	{
		$out = array('foo' => 'bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo="bar"'), $out);
		$this->assertEquals($parser->parse('foo=>"bar"'), $out);
		$this->assertEquals($parser->parse('foo => "bar"'), $out);
	}

	function testEqualsWithinQuotes()
	{
		$out = array('foo' => 'bar=baz');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo="bar=baz"'), $out);
	}

	function testArgumentChaining()
	{
		$out = array(
			'foo' => 'bar',
			'hello' => 'world',
			'bar' => 'baz',
		);

		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=bar hello=world bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=world,bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=world bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=>world bar=baz'), $out);
	}

	function testQuoteEscape()
	{
		$out = array('foo' => 'bar " test');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=>"bar \" test"'), $out);
	}

	function testUnclosedQuote()
	{
		$out = array('foo' => '" bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=>" bar'), $out);
	}

	function testNoArgument()
	{
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse(''), array());
		$this->assertEquals($parser->parse('foo'), array());
	}

	function testInvalidEnd()
	{
		$out = array('a' => 'b');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('a=b foo='), $out);
	}
}
