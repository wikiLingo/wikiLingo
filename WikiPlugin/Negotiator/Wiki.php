<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Wiki.php 44849 2013-02-08 18:41:20Z lphuberdeau $

class WikiPlugin_Negotiator_Wiki
{
	public $name;
	public $args;
	public $body;
	public $syntax;
	public $closing;
	public $info;
	public $fingerprint;
	public $exists; //exists is set to true only for old style plugin
	public $index;
	public $key;
	public $needsParsed = true;
	public $parserLevel = 0;
	public $dontModify = false;
	public $parser;
	public $parserOption;
	public $ignored = false;

	private $className;
	private $class; //class exists for zend style and injected plugins
	private $argParser;
	private $page;
	private $prefs;
	private $alias;

	public static $standardRelativePath = 'lib/wiki-plugins/wikiplugin_';
	public static $zendRelativePath = 'vendor/zendframework/zendframework1/library/';
	public static $checkZendPaths = true;
	static $pluginIndexes = array();
	static $pluginInfo = array();
	static $parserLevels = array();
	static $currentParserLevel = 0;
	static $pluginsAwaitingExecution = array();
	static $pluginInstances = array();
	static $pluginDetails = array();

	function __construct(& $parser)
	{
		$this->parser = & $parser;
		$this->page = & $parser->page;
		$this->prefs = & $parser->prefs;
		$this->parserOption = & $parser->option;
		$this->argParser = new WikiParser_PluginArgumentParser;
		$this->alias = new WikiPlugin_Negotiator_Wiki_Alias();
	}

	public function inject($plugin)
	{
		self::$pluginInstances[get_class($plugin)] = $plugin;
	}

	public function eject($className)
	{
		unset(self::$pluginInstances[$className]);
		unset(self::$pluginInfo[$this->name]);
	}

	function injectedExists()
	{
		if (isset(self::$pluginInstances[$this->name]) && gettype(self::$pluginInstances[$this->name]) == 'object') {
			return true;
		}

		return false;
	}

	public function setDetails(& $pluginDetails)
	{
		$this->name = strtolower($pluginDetails['name']);
		$this->className = 'WikiPlugin_' . $this->name;

		if ($this->zendExists() == true) {
			if (empty(self::$pluginInstances[$this->className])) self::$pluginInstances[$this->className] = new $this->className;
			$this->class = self::$pluginInstances[$this->className];
		} else if ($this->injectedExists() == true) {
			$this->class = self::$pluginInstances[$this->name];
		} else {
			$this->class = null;
		}

		$this->args = $this->argParser->parse($pluginDetails['args']);
		$this->body = & $pluginDetails['body'];
		$this->key = $pluginDetails['key'];
		$this->syntax = $pluginDetails['syntax'];
		$this->closing = $pluginDetails['closing'];
		$this->ignored = false;

		$this->exists = $this->exists(true);
		$this->info = $this->info();
		$this->fingerprint = $this->fingerprint();
		$this->index = $this->incrementIndex();

		self::$pluginDetails[$this->key] = &$pluginDetails;
	}

	private function incrementIndex()
	{
		if (isset(self::$pluginIndexes[$this->name]) == false) self::$pluginIndexes[$this->name] = 0;

		self::$pluginIndexes[$this->name]++;

		return self::$pluginIndexes[$this->name];
	}

	function execute()
	{
		$output = '';
		if ($this->enabled($output) == false) {
			$this->ignored = true;
			return $output->toHtml();
		}

		//Zend style plugins are classed based
		//Start Zend
		if (isset($this->class)) {
			if (isset($this->class->parserLevel)) {
				$this->parserLevel = $this->class->parserLevel;

				if ($this->parserLevel > self::$currentParserLevel) {
					$this->addWaitingPlugin();
					return $this->key;
				} else {

					$this->applyFilters();
					$button = $this->button(false);

					$result = $this->class
						->setButton($button)
						->exec($this->body, $this->args, $this->index, $this->parser);

					return $result;
				}
			}
		}
		//End Zend


		//old style plugins start
		$fnName = strtolower('wikiplugin_' .  $this->name);

		if ( $this->exists && function_exists($fnName) ) {
			return $fnName($this->body, $this->args, $this->index, $this) . $this->button();
		}
		//end old style


		//alias start
		$newDetails = $this->alias->getDetails(self::$pluginDetails[$this->key]);
		if ($newDetails != false) {
			$this->setDetails($newDetails);
			return $this->execute();
		}
		//alias end

		//If we make it this far, it most likley is a smarty black that can't be executed
		//smarty or unrecognized start
		$this->ignored = true;
		return $this->toSyntax();
		//smarty or unrecognized end
	}

	function toSyntax()
	{
		return $this->syntax . $this->body . $this->closing;
	}

	function urlEncodeArgs()
	{
		$args = '';// not using http_build_query() as it converts spaces into +
		if (!empty($this->args)) {
			foreach ( $this->args as $argKey => $argValue ) {
				if (is_array($argValue)) {
					if (isset($this->info['params'][$argKey]['separator'])) {
						$sep = $this->info['params'][$argKey]['separator'];
					} else {
						$sep = ',';
					}
					$args .= $argKey.'='.implode($sep, $argValue).'&';
				} else {
					$args .= $argKey.'='.$argValue.'&';
				}
			}
		}

		$args = rtrim($args, '&');

		return $args;
	}

	private function addWaitingPlugin()
	{
		self::$parserLevels[] = $this->class->parserLevel;
		sort(self::$parserLevels, SORT_NUMERIC);
		array_unique(self::$parserLevels);
		self::$pluginsAwaitingExecution[$this->key] = self::$pluginDetails[$this->key];
	}

	public function zendExists()
	{
		if (isset(self::$pluginInstances[$this->className])) {
			return true;
		}

		if (self::$checkZendPaths == true) {
			return file_exists(str_replace('_', '/', self::$zendRelativePath . $this->className . '.php')) == true && class_exists($this->className) == true;
		} else {
			return @class_exists($this->className); //error suppression only used in special use cases, like phpunit for testing
		}
	}

	private function exists($include = false)
	{
		$phpName = self::$standardRelativePath . strtolower($this->name) . '.php';

		$exists = file_exists($phpName);

		if ( $include && $exists ) {
			include_once $phpName;
		}

		if ( $exists ) {
			return true;
		}

		return false;
	}

	function canExecute()
	{
		global $tikilib, $prefs;
		// If validation is disabled, anything can execute
		if ( $prefs['wiki_validate_plugin'] != 'y' ) {
			return true;
		}

		if ( ! isset( $this->info['validate'] ) ) {
			return true;
		}

		$val = $this->fingerprintCheck();

		switch($val) {
			case 'accept':
				return true;
							break;
			case 'reject':
				return 'rejected';
							break;
			default:
				global $tiki_p_plugin_approve, $tiki_p_plugin_preview;
				if (
					isset($_SERVER['REQUEST_METHOD'])
					&& $_SERVER['REQUEST_METHOD'] == 'POST'
					&& isset( $_POST['plugin_fingerprint'] )
					&& $_POST['plugin_fingerprint'] == $this->fingerprint
				) {
					if ( $tiki_p_plugin_approve == 'y' ) {
						if ( isset( $_POST['plugin_accept'] ) ) {
							$this->fingerprintStore('accept');
							$tikilib->invalidate_cache($this->page);
							return true;
						} elseif ( isset( $_POST['plugin_reject'] ) ) {
							$this->fingerprintStore('reject');
							$tikilib->invalidate_cache($this->page);
							return 'rejected';
						}
					}

					if ( $tiki_p_plugin_preview == 'y'
						&& isset( $_POST['plugin_preview'] ) ) {
						return true;
					}
				}

				return $this->fingerprint;
		}
	}

	function enabled(& $output)
	{
		if ( ! $this->info )
			return true; // Legacy plugins always execute

		global $prefs;

		$missing = array();

		if ( isset( $this->info['prefs'] ) ) {
			foreach ( $this->info['prefs'] as $pref ) {
				if ( isset($prefs[$pref]) && $prefs[$pref] != 'y' ) {
					$missing[] = $pref;
				}
			}
		}

		if ( count($missing) > 0 ) {
			$output = WikiParser_PluginOutput::disabled($this->name, $missing);
			return false;
		}

		return true;
	}

	function isEditable()
	{
		global $tiki_p_edit, $prefs, $section;

		return (
			$section == 'wiki page' &&
			isset($this->info) &&
			$tiki_p_edit == 'y' &&
			$prefs['wiki_edit_plugin'] == 'y' &&
			!$this->isInline()
		);
	}

	private function isInline()
	{
		if ( ! $this->info )
			return true; // Legacy plugins always inline

		if ( isset( $this->info['inline'] ) && $this->info['inline'] )
			return true;

		$inline_pref = 'wikiplugininline_' .  $this->name;
		if ( isset( $this->prefs[ $inline_pref ] ) && $this->prefs[ $inline_pref ] == 'y' )
			return true;

		return false;
	}

	private function fingerprintStore( $type )
	{
		global $tikilib;

		if ( $this->page ) {
			$objectType = 'wiki page';
			$objectId = $this->page;
		} else {
			$objectType = '';
			$objectId = '';
		}

		$pluginSecurity = $tikilib->table('tiki_plugin_security');
		$pluginSecurity->delete(array('fingerprint' => $this->fingerprint));
		$pluginSecurity->insert(
			array(
				'fingerprint' => $this->fingerprint,
				'status' => $type,
				'added_by' => $this->parser->user,
				'last_objectType' => $objectType,
				'last_objectId' => $objectId
			)
		);
	}

	public function info()
	{
		if ( isset( self::$pluginInfo[$this->name] ) ) {
			return self::$pluginInfo[$this->name];
		}

		if (isset($this->class)) {
			self::$pluginInfo[$this->name] = $this->class->info();
			if (isset(self::$pluginInfo[$this->name]['params'])) {
				self::$pluginInfo[$this->name]['params'] = array_merge(self::$pluginInfo[$this->name]['params'], $this->class->style());
			}
			return self::$pluginInfo[$this->name];
		}

		if ( ! $this->exists ) {
			return self::$pluginInfo[$this->name] = false;
		}

		$funcNameInfo = "wikiplugin_{$this->name}_info";

		if ( ! function_exists($funcNameInfo) ) {
			if ( $info = WikiPlugin_Negotiator_Wiki_Alias::info($this->name) ) {
				return self::$pluginInfo[$this->name] = $info['description'];
			} else {
				return self::$pluginInfo[$this->name] = false;
			}
		}

		return self::$pluginInfo[$this->name] = $funcNameInfo();
	}


	static public function getList( $includeReal = true, $includeAlias = true )
	{
		$real = array();
		$alias = array();

		foreach ( glob('lib/wiki-plugins/wikiplugin_*.php') as $file ) {
			$base = basename($file);
			$plugin = substr($base, 11, -4);

			$real[] = $plugin;
		}

		//Check for existence of Zend wiki plugins
		foreach ( glob('lib/core/WikiPlugin/*.php') as $file ) {
			$base = basename($file);
			if (strtolower($base) == $base) { //the zend plugins all have lower case names
				$plugin = substr($base, 0, -4);
				$real[] = $plugin;
			}
		}

		if ( $includeReal && $includeAlias ) {
			$plugins = array_merge($real, WikiPlugin_Negotiator_Wiki_Alias::getList());
		} elseif ( $includeReal ) {
			$plugins = $real;
		} elseif ( $includeAlias ) {
			$plugins = WikiPlugin_Negotiator_Wiki_Alias::getList();
		} else {
			$plugins = array();
		}
		$plugins = array_filter($plugins);
		sort($plugins);

		return $plugins;
	}

	private function fingerprint()
	{
		$validate = (isset($this->info['validate']) ? $this->info['validate'] : '');

		if ( $validate == 'all' || $validate == 'body' )
			$validateBody = str_replace('<x>', '', $this->body);	// de-sanitize plugin body to make fingerprint consistant with 5.x
		else
			$validateBody = '';

		if ( $validate == 'all' || $validate == 'arguments' ) {
			$validateArgs = $this->args;

			// Remove arguments marked as safe from the fingerprint
			foreach ( $this->info['params'] as $key => $info ) {
				if ( isset( $validateArgs[$key] )
					&& isset( $info['safe'] )
					&& $info['safe']
				) {
					unset($validateArgs[$key]);
				}
			}
			// Parameter order needs to be stable
			ksort($validateArgs);

			if (empty($validateArgs)) {
				$validateArgs = array( '' => '' );	// maintain compatibility with pre-Tiki 7 fingerprints
			}
		} else {
			$validateArgs = array();
		}

		$bodyLen = str_pad(strlen($validateBody), 6, '0', STR_PAD_RIGHT);
		$serialized = serialize($validateArgs);
		$argsLen = str_pad(strlen($serialized), 6, '0', STR_PAD_RIGHT);

		$bodyHash = md5($validateBody);
		$argsHash = md5($serialized);

		return "$this->name-$bodyHash-$argsHash-$bodyLen-$argsLen";
	}

	private function fingerprintCheck()
	{
		global $tikilib;
		$limit = date('Y-m-d H:i:s', time() - 15*24*3600);
		$result = $tikilib->query(
			"SELECT status, if(status='pending' AND last_update < ?, 'old', '') flag
			FROM tiki_plugin_security
			WHERE fingerprint = ?",
			array( $limit, $this->fingerprint )
		);

		$needUpdate = false;

		if ( $row = $result->fetchRow() ) {
			$status = $row['status'];
			$flag = $row['flag'];

			if ( $status == 'accept' || $status == 'reject' ) {
				return $status;
			}

			if ( $flag == 'old' ) {
				$needUpdate = true;
			}
		} else {
			$needUpdate = true;
		}

		if ( $needUpdate && !$this->dontModify ) {
			if ( $this->page ) {
				$objectType = 'wiki page';
				$objectId = $this->page;
			} else {
				$objectType = '';
				$objectId = '';
			}


			$pluginSecurity = $tikilib->table('tiki_plugin_security');
			$pluginSecurity->delete(array('fingerprint' => $this->fingerprint));
			$pluginSecurity->insert(
				array(
					'fingerprint' => $this->fingerprint,
					'status' => 'pending',
					'added_by' => $this->parser->user,
					'last_objectType' => $objectType,
					'last_objectId' => $objectId
				)
			);
		}

		return '';
	}

	private function applyFilters()
	{
		global $tikilib;

		$default = TikiFilter::get(isset( $this->info['defaultfilter'] ) ? $this->info['defaultfilter'] : 'xss');

		// Apply filters on the body
		$filter = isset($this->info['filter']) ? TikiFilter::get($this->info['filter']) : $default;
		$this->body = $filter->filter($this->body);

		if (!$this->parser->getOption('is_html')) {
			$noparsed = array('data' => array(), 'key' => array());
			//$this->striUnparsedBlock($this->body, $noparsed);
			$body = str_replace(array('<', '>'), array('&lt;', '&gt;'), $this->body);
			foreach ($noparsed['data'] as &$instance) {
				$instance = '~np~' . $instance . '~/np~';
			}
			unset($instance);
			$this->body = str_replace($noparsed['key'], $noparsed['data'], $body);
		}

		// Make sure all arguments are declared
		$params = & $this->info['params'];
		if ( ! isset( $this->info['extraparams'] ) && is_array($params) ) {
			$this->args = array_intersect_key($this->args, $params);
		}

		// Apply filters on values individually
		if (!empty($this->args)) {
			foreach ( $this->args as $argKey => &$argValue ) {
				$paramInfo = $params[$argKey];
				$filter = isset($paramInfo['filter']) ? TikiFilter::get($paramInfo['filter']) : $default;
				$argValue = TikiLib::htmldecode($argValue);

				if ( isset($paramInfo['separator']) ) {
					$vals = $tikilib->array_apply_filter($tikilib->multi_explode($paramInfo['separator'], $argValue), $filter);

					$argValue = array_values($vals);
				} else {
					$argValue = $filter->filter($argValue);
				}
			}
		}
	}

	function button($wrapInNp = true)
	{
		global $headerlib, $smarty;

		if (
			$this->isEditable() &&
			!$this->parser->getOption('preview_mode') &&
			!$this->parser->getOption('indexing') &&
			!$this->parser->getOption('print') &&
			!$this->parser->getOption('suppress_icons') &&
			!$this->parser->getOption('preview_mode')
		) {
			$id = 'plugin-edit-' . $this->name . $this->index;
			$iconDisplayStyle = '';
			if (
				$this->prefs['wiki_edit_icons_toggle'] == 'y' &&
				(
					$this->prefs['wiki_edit_plugin'] == 'y' || $this->prefs['wiki_edit_section'] == 'y'
				)
			) {
				if (!isset($_COOKIE['wiki_plugin_edit_view'])) {
					$iconDisplayStyle = ' style="display:none;"';
				}
			}

			$headerlib->add_jsfile('tiki-jsplugin.php?language='.$this->prefs['language'], 'dynamic');
			if ($this->prefs['wikiplugin_module'] === 'y' && $this->prefs['wikiplugininline_module'] === 'n') {
				$headerlib->add_jsfile('tiki-jsmodule.php?language='.$this->prefs['language'], 'dynamic');
			}

			$headerlib->add_jq_onready(
				'$("#' . $id . '")
					.click( function(event) {'
				. '		popup_plugin_form('
				. json_encode('editwiki') . ', '
				. json_encode($this->name) . ', '
				. json_encode($this->index) . ', '
				. json_encode($this->page) . ', '
				. json_encode($this->args) . ', '
				. json_encode($this->body)
				. ' 		, event.target'
				. '	);'
				. '	return false;'
				. '})'
				. '.hover(function() {'
				. ' 	$(this).prev().addClass("ui-state-highlight");'
				. '}, function() { '
				. '	$(this).prev().removeClass("ui-state-highlight");'
				. '});'
			);
			include_once('lib/smarty_tiki/function.icon.php');

			$button = '<a id="' . $id . '" class="editplugin"' . $iconDisplayStyle . '>' .
								smarty_function_icon(array('_id'=>'wiki_plugin_edit', 'alt'=>tra('Edit Plugin') . ':' . $this->name), $smarty) .
								'</a>'
			;

			if ($wrapInNp == false) return $button;

			return '~np~' . $button . '~/np~';
		}

		return '';
	}

	function blockFromExecution($status = '')
	{
		global $smarty;
		$smarty->assign('plugin_fingerprint', $status);
		$smarty->assign('plugin_name', $this->name);
		$smarty->assign('plugin_index', 0);
		$smarty->assign('plugin_status', $status);

		global $tiki_p_plugin_viewdetail, $tiki_p_plugin_preview, $tiki_p_plugin_approve;
		$details = $tiki_p_plugin_viewdetail == 'y' && $status != 'rejected';
		$preview = $tiki_p_plugin_preview == 'y' && $details && ! $this->parser->getOption('preview_mode');
		$approve = $tiki_p_plugin_approve == 'y' && $details && ! $this->parser->getOption('preview_mode');

		if ($this->parser->getOption('inside_pretty')) {
			$smarty->assign('plugin_details', '');
		} else {
			$smarty->assign('plugin_details', $details);
		}

		$smarty->assign('plugin_preview', $preview);
		$smarty->assign('plugin_approve', $approve);

		$smarty->assign('plugin_body', $this->body);
		$smarty->assign('plugin_args', $this->args);

		return trim($smarty->fetch('tiki-plugin_blocked.tpl'));
	}

	function executeAwaiting(&$input)
	{
		foreach (self::$parserLevels as &$level) {
			self::$currentParserLevel = $level;
			foreach (self::$pluginsAwaitingExecution as &$pluginDetails) {
				$this->setDetails($pluginDetails);

				if (self::$currentParserLevel == $level && strstr($input, $this->key)) {
					$this->parser->plugin[$this->key] = $this->body;

					$result = $this->parser->parsePlugin($this->execute());

					$input = str_replace($this->key, $result, $input);

					unset($pluginDetails);
				}
			}
		}
	}
}
