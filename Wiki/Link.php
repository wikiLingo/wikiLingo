<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Link.php 44444 2013-01-05 21:24:24Z changi67 $

class JisonParser_Wiki_Link
{
	public $parser;
	public $page;
	public $pageLink;
	public $type;
	public $namespace;
	public $namespaceSeparator;
	public $description;
	public $reltype;
	public $processPlural = false;
	public $anchor;
	public $language;
	public $suppressIcons;
	public $skipPageCache = false;
	public $wikiExternal = '';
	public $info;
	public $includePageAsDataAttribute = false;

	static $externals = false;

	function __construct($page, &$parser)
	{
		global $tikilib, $prefs;

		$this->page = $this->description = $page;
		$this->parser = &$parser;

		$this->namespaceSeparator = $prefs['namespace_separator'];

		if ( $prefs['feature_multilingual'] == 'y' && isset( $GLOBALS['pageLang'] ) ) {
			$this->language = $GLOBALS['pageLang'];
		}

		// Fetch all externals once
		if ( false === self::$externals ) {
			self::$externals = $tikilib->fetchMap('SELECT LOWER(`name`), `extwiki` FROM `tiki_extwiki`');
		}

		$this->info = $this->findWikiPage();
	}

	static function page($page, &$parser)
	{
		$link = new self($page, $parser);

		$link->setDescription($page);

		// HTML entities encoding breaks page lookup
		$link->pageLink = html_entity_decode($page, ENT_COMPAT, 'UTF-8');

		if (!empty($namespace)) {
			$link->namespace = $namespace;
		}

		return $link;
	}

	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}


	public function setNamespace($namespace)
	{
		$this->namespace = $namespace;

		return $this;
	}

	public function setDescription($description)
	{
		global $prefs;

		if (!empty($description)) {
			$feature_wikiwords = $prefs['feature_wikiwords'];
			$prefs['feature_wikiwords'] = 'n';

			$this->description = $description;

			$prefs['feature_wikiwords'] = $feature_wikiwords;
		}

		return $this;
	}

	public function processPlural($processPlural)
	{
		$this->processPlural = $processPlural;

		return $this;
	}

	public function setSuppressIcons($suppressIcons)
	{
		$this->suppressIcons = $suppressIcons;

		return $this;
	}

	public function setSkipPageCache($skipPageCache)
	{
		$this->skipPageCache = $skipPageCache;

		return $this;
	}

	public function setWikiExternal($wikiExternal)
	{
		$this->wikiExternal = $wikiExternal;

		return $this;
	}

	public function includePageAsDataAttribute($includePageAsDataAttribute)
	{
		$this->includePageAsDataAttribute = $includePageAsDataAttribute;

		return $this;
	}

	function externalHtml()
	{
		global $tikilib, $prefs, $smarty;

		$params = array(
			"class" => "wiki",
			"href" => $this->page
		);
		$ext_icon = '';
		$cached = '';

		if ($prefs['popupLinks'] == 'y') {
			$params['target'] = '_blank"';
		}

		if (!strstr($this->page, '://')) {
			unset($params['target']);
		} else {
			$params['class'] .= ' external';
			if ($prefs['feature_wiki_ext_icon'] == 'y' && !$this->suppressIcons) {
				include_once('lib/smarty_tiki/function.icon.php');
				$ext_icon = $this->parser->createWikiHelper(
					"linkExternal", "span",
					smarty_function_icon(array('_id'=>'external_link', 'alt'=>tra('(external link)'), '_class' => 'externallink', '_extension' => 'gif', '_defaultdir' => 'img/icons', 'width' => 15, 'height' => 14), $smarty)
				);
			}
			$params['rel'] ='external';
			if ($prefs['feature_wiki_ext_rel_nofollow'] == 'y') {
				$params['rel'] .= ' nofollow';
			}
		}

		if ($prefs['cachepages'] == 'y' && $tikilib->is_cached($this->page)) {
			$cached = $this->parser->createWikiHelper(
				"linkExternal", "a", "(" . tra("cache") . ")",
				array(
					"class"=>"wikicache",
					"target"=>"_blank",
					"href"=>"tiki-view_cache.php?url=".urlencode($this->pageLink)
				)
			);
		}

		return $this->parser->createWikiTag("linkExternal", "a", $this->description, $params) . $ext_icon . $cached;
	}

	function getHtml()
	{
		switch ($this->type) {
			case 'np':
				return $this->parser->createWikiTag("linkNp", "span", $this->page);
				break;
			case 'external':
				return $this->externalHtml();
				break;
			case 'alias':
				$this->reltype = $this->type;
				break;
			case 'word':
				break;
		}

		if ( !empty($this->wikiExternal)) {
			return $this->wikiExternal();
		}

		return $this->wikiInternal();
	}

	function wikiExternal()
	{
		if (isset($this->externals[$this->wikiExternal])) {
			$page = str_replace('$page', rawurlencode($this->page), $this->externals[$this->wikiExternal]);
			return $this->parser->createWikiTag(
				"link", "a", $this->description,
				array(
					"class" => 'wiki ext_page ' . $this->wikiExternal,
					"href" => $page
				)
			);
		}
	}

	function wikiInternal()
	{
		global $wikilink;

		$tagType = ($this->type == "word" ? "linkWord" : "link");

		if ($this->info) {
			$params = array(
				"href" => TikiLib::lib('wiki')->sefurl(trim($this->page)),
				"title" => $this->getTitle(),
				"class" => 'wiki wiki_page ' . $this->reltype,
			);

			if ($this->includePageAsDataAttribute == true) {
				$params['data-page'] = trim($this->page);
			}

			if (!empty($this->reltype)) {
				$params['data-reltype'] = $this->reltype;
			}

			return $this->parser->createWikiTag($tagType, "a", $this->description, $params);
		} else {
			$params = array();

			if ($this->includePageAsDataAttribute == true) {
				$params['data-page'] = trim($this->page);
			}

			if (!empty($this->reltype)) {
				$params['data-reltype'] = $this->reltype;
			}

			return $this->parser->createWikiTag($tagType, "span", $this->description, $params).
			$this->parser->createWikiHelper(
				"link", "a", "?",
				array(
					"href" => $url = 'tiki-editpage.php?page=' . urlencode($this->page) . (empty($this->language) ? '' : '&lang=' . urlencode($this->language)),
					"title" => tra('Create page:') . ' ' . $this->page,
					"class" => 'wiki wikinew' . $this->reltype,
				)
			);
		}
	}

	function findWikiPage()
	{
		global $prefs;
		$tikilib = TikiLib::lib('tiki');
		$page_info = $tikilib->get_page_info($this->namespace . $this->namespaceSeparator . $this->page, false);

		if ( $page_info === false ) {
			$page_info = $tikilib->get_page_info($this->page, false);
			$this->setDescription($this->renderPageName());
		}

		if ( $page_info !== false ) {
			return $page_info;
		}

		// If page does not exist directly, attempt to find an alias
		if ( $prefs['feature_wiki_pagealias'] == 'y' ) {
			$semanticlib = TikiLib::lib('semantic');

			$toPage = $this->page;
			$tokens = explode(',', $prefs['wiki_pagealias_tokens']);

			$prefixes = explode(',', $prefs["wiki_prefixalias_tokens"]);
			foreach ($prefixes as $p) {
				$p = trim($p);
				if (strlen($p) > 0 && TikiLib::strtolower(substr($this->page, 0, strlen($p))) == TikiLib::strtolower($p)) {
					$toPage = $p;
					$tokens = 'prefixalias';
				}
			}

			$links = $semanticlib->getLinksUsing(
				$tokens,
				array( 'toPage' => $toPage )
			);

			if ( count($links) > 1 ) {
				// There are multiple aliases for this page. Need to disambiguate.
				//
				// When feature_likePages is set, trying to display the alias itself will
				// display an error page with the list of aliased pages in the "like pages" section.
				// This allows the user to pick the appropriate alias.
				// So, leave the $pageName to the alias.
				//
				// If feature_likePages is not set, then the user will only see that the page does not
				// exist. So it's better to just pick the first one.
				//
				if ($prefs['feature_likePages'] == 'y' || $tokens == 'prefixalias') {
					// Even if there is more then one match, if prefix is being redirected then better
					// to fail than to show possibly wrong page
					return true;
				} else {
					// If feature_likePages is NOT set, then trying to display the first one is fine
					// $pageName is by ref so it does get replaced
					$pageName = $links[0]['fromPage'];
					return $tikilib->get_page_info($this->page, true);
				}
			} elseif (count($links)) {
				// there is exactly one match
				if ($prefs['feature_wiki_1like_redirection'] == 'y') {
					return true;
				} else {
					$this->page = $links[0]['fromPage'];
					return $tikilib->get_page_info($this->page, true);
				}
			}
		}
	}

	function getTitle()
	{
		if (!empty($this->info['description'])) {
			return $this->info['description'];
		} elseif (! empty($this->info['prettyName'])) {
			return $this->info['prettyName'];
		} else {
			return $this->info['pageName'];
		}
	}

	function renderPageName()
	{
		if (! isset($this->info['namespace_parts'])) {
			return $this->info['pageName'];
		}

		$out = '';

		$last = count($this->info['namespace_parts']) - 1;
		foreach ($this->info['namespace_parts'] as $key => $part) {
			$class = 'namespace';
			if ($key === 0) {
				$class .= ' first';
			}
			if ($key === $last) {
				$class .= ' last';
			}
			$out .= $this->parser->createWikiHelper(
				"link", "span", $part,
				array(
					"class"=>$class
				)
			);
		}

		return $out . $this->info['baseName'];
	}
}
