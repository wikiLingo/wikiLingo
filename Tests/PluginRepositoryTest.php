<?php

class WikiParser_PluginRepositoryTest extends TikiTestCase
{
	function testPluginDoesNotExist()
	{
		$repository = new WikiParser_PluginRepository;
		$this->assertFalse($repository->pluginExists('test'));
	}

	function testTestPhysicalPlugin()
	{
		$repository = new WikiParser_PluginRepository;
		$repository->addPluginFolder(dirname(__FILE__));

		$this->assertTrue($repository->pluginExists('foo'));
		$this->assertFalse($repository->pluginExists('fake'));
	}

	function testObtainInfoForNormalPlugin()
	{
		$repository = new WikiParser_PluginRepository;
		$repository->addPluginFolder(dirname(__FILE__));

		$info = $repository->getInfo('foo');

		$this->assertEquals(2, count($info['params']));
		$this->assertEquals(tra('Foo'), $info['name']);
	}

	function testGetListWithNormalOnly()
	{
		$repository = new WikiParser_PluginRepository;
		$repository->addPluginFolder(dirname(__FILE__));

		$this->assertEquals(array('foo'), $repository->getList());
	}
}
