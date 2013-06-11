<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: CKEditor.php 44444 2013-01-05 21:24:24Z changi67 $

class WikiPlugin_Negotiator_CKEditor extends WikiPlugin_Negotiator_Wiki
{
	public $needsParsed = false;
	public $dontModify = false;

	public function execute()
	{
		return $this->toSyntax();
	}

	function blockFromExecution($status = '')
	{
		return $this->toSyntax();
	}

	function executeAwaiting(&$input)
	{

	}
}
