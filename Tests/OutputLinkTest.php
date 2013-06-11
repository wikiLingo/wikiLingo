<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: OutputLinkTest.php 44444 2013-01-05 21:24:24Z changi67 $

class WikiParser_OutputLinkTest extends TikiTestCase
{
	private $info;

	function setUp()
	{
		$this->info = array();
	}

	function testCreateLink()
	{
		// ((Test)) on missing page
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');

		$this->assertLinkIs('Test<a href="tiki-editpage.php?page=Test" title="Create page: Test" class="wiki wikinew">?</a>', $link->getHtml());
	}

	function testCreateLinkWithLanguage()
	{
		// ((Test)) on missing page, with multilingual specified
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setLanguage('fr');

		$this->assertLinkIs('Test<a href="tiki-editpage.php?page=Test&amp;lang=fr" title="Create page: Test" class="wiki wikinew">?</a>', $link->getHtml());
	}

	function testCreateLinkWithDescription()
	{
		// ((Test|Hello World))
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setDescription('Hello World');

		$this->assertLinkIs('Hello World<a href="tiki-editpage.php?page=Test" title="Create page: Test" class="wiki wikinew">?</a>', $link->getHtml());
	}

	function testCreateLinkWithRelationType()
	{
		// (real(Test))
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setQualifier('real');

		$this->assertLinkIs('Test<a href="tiki-editpage.php?page=Test" title="Create page: Test" class="wiki wikinew real">?</a>', $link->getHtml());
	}

	function testPageDoesExist()
	{
		$this->info['Test'] = array(
			'pageName' => 'Test',
			'description' => 'Testing',
			'lastModif' => 1234567890,
		);

		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setWikiLinkBuilder(array($this, 'getWikiLink'));

		$this->assertLinkIs('<a href="Test" title="Testing" class="wiki wiki_page">Test</a>', $link->getHtml());
	}

	function testInfoFunctionProvidesAlias()
	{
		$this->info['Test'] = array(
			'pageName' => 'Test1.2',
			'description' => 'Testing',
			'lastModif' => 1234567890,
		);

		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setWikiLinkBuilder(array($this, 'getWikiLink'));

		$this->assertLinkIs('<a href="Test1.2" title="Testing" class="wiki wiki_page">Test</a>', $link->getHtml());
	}

	function testExistsWithRelType()
	{
		$this->info['Test'] = array(
			'pageName' => 'Test',
			'description' => 'Testing',
			'lastModif' => 1234567890,
		);

		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Test');
		$link->setQualifier('abc');
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setWikiLinkBuilder(array($this, 'getWikiLink'));

		$this->assertLinkIs('<a href="Test" title="Testing" class="wiki wiki_page abc">Test</a>', $link->getHtml());
	}

	function testUndefinedExternalLink()
	{
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('out:Test');
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setWikiLinkBuilder(array($this, 'getWikiLink'));

		$this->assertLinkIs('out:Test<a href="tiki-editpage.php?page=out%3ATest" title="Create page: out:Test" class="wiki wikinew">?</a>', $link->getHtml());
	}

	function testWithDefinedExternal()
	{
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('out:Test');
		$link->setExternals(
			array(
				'out' => 'http://example.com/$page',
				'other' => 'http://www.example.com/$page',
			)
		);

		$this->assertLinkIs('<a href="http://example.com/Test" class="wiki ext_page out">Test</a>', $link->getHtml());
	}

	function testWithDefinedExternalAndDescription()
	{
		$link = new WikiParser_OutputLink;
		$link->setIdentifier('out:Test');
		$link->setDescription('ABC');
		$link->setExternals(
			array(
				'out' => 'http://example.com/$page',
				'other' => 'http://www.example.com/$page',
			)
		);

		$this->assertLinkIs('<a href="http://example.com/Test" class="wiki ext_page out">ABC</a>', $link->getHtml());
	}

	function testHandlePlural()
	{
		$this->info['Policies'] = false;
		$this->info['Policy'] = array(
			'pageName' => 'Policy',
			'description' => 'Some Page',
			'lastModif' => 1234567890,
		);

		$link = new WikiParser_OutputLink;
		$link->setIdentifier('Policies');
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setWikiLinkBuilder(array($this, 'getWikiLink'));
		$link->setHandlePlurals(true);

		$this->assertLinkIs('<a href="Policy" title="Some Page" class="wiki wiki_page">Policies</a>', $link->getHtml());
	}

	function testRenderCreateLinkWithNamespace()
	{
		// ((Test)) within a page in HelloWorld namespace
		$link = new WikiParser_OutputLink;
		$link->setNamespace('HelloWorld', '_');
		$link->setIdentifier('Test');

		$this->assertLinkIs('Test<a href="tiki-editpage.php?page=HelloWorld_Test" title="Create page: HelloWorld_Test" class="wiki wikinew">?</a>', $link->getHtml());
	}

	function testRenderLinkWithinSameNamespace()
	{
		$this->info['HelloWorld_Test'] = array(
			'pageName' => 'HelloWorld_Test',
			'prettyName' => 'HelloWorld / Test',
			'namespace' => 'HelloWorld',
			'namespace_parts' => array('HelloWorld'),
			'baseName' => 'Test',
			'description' => '',
			'lastModif' => 1234567890,
		);

		// ((Test)) within a page in HelloWorld namespace
		$link = new WikiParser_OutputLink;
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setNamespace('HelloWorld', '_');
		$link->setIdentifier('Test');

		$this->assertLinkIs('<a href="HelloWorld_Test" title="HelloWorld / Test" class="wiki wiki_page">Test</a>', $link->getHtml());
	}

	function testRenderFromDifferentNamespace()
	{
		$this->info['HelloWorld_Test'] = array(
			'pageName' => 'HelloWorld_Test',
			'prettyName' => 'HelloWorld / Test',
			'namespace' => 'HelloWorld',
			'namespace_parts' => array('HelloWorld'),
			'baseName' => 'Test',
			'description' => '',
			'lastModif' => 1234567890,
		);

		// ((Test)) within a page in HelloWorld namespace
		$link = new WikiParser_OutputLink;
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setNamespace('Foobar', '_');
		$link->setIdentifier('HelloWorld_Test');

		$this->assertLinkIs('<a href="HelloWorld_Test" title="HelloWorld / Test" class="wiki wiki_page"><span class="namespace first last">HelloWorld</span>Test</a>', $link->getHtml());
	}

	function testRenderFromDifferentNamespaceWithMultipleParts()
	{
		$this->info['Abc_Def_HelloWorld_Test'] = array(
			'pageName' => 'Abc_Def_HelloWorld_Test',
			'prettyName' => 'Abc / Def / HelloWorld / Test',
			'namespace' => 'Abc_Def_HelloWorld',
			'namespace_parts' => array('Abc', 'Def', 'HelloWorld'),
			'baseName' => 'Test',
			'description' => '',
			'lastModif' => 1234567890,
		);

		// ((Test)) within a page in HelloWorld namespace
		$link = new WikiParser_OutputLink;
		$link->setWikiLookup(array($this, 'getPageInfo'));
		$link->setNamespace('Foobar', '_');
		$link->setIdentifier('Abc_Def_HelloWorld_Test');

		$this->assertLinkIs('<a href="Abc_Def_HelloWorld_Test" title="Abc / Def / HelloWorld / Test" class="wiki wiki_page"><span class="namespace first">Abc</span><span class="namespace">Def</span><span class="namespace last">HelloWorld</span>Test</a>', $link->getHtml());
	}

	function getPageInfo($page)
	{
		if (isset($this->info[$page])) {
			return $this->info[$page];
		}
	}

	function getWikiLink($page)
	{
		return $page;
	}

	private function assertLinkIs($expect, $content)
	{
		$this->assertXmlStringEqualsXmlString("<span>$expect</span>", "<span>$content</span>");
	}
}

