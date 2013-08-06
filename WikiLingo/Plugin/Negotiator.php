<?php

namespace WikiLingo\Plugin;

class Negotiator
{
	public $plugin;
	public $info;
	public $fingerprint;
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
	private $parameterParser;
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
		$this->parameterParser = new Parameters();
		$this->alias = new Alias();
	}

	public function setPlugin(&$plugin)
	{
		$this->plugin = $plugin;
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

	public static function injectedExists($name)
	{
		if (isset(self::$pluginInstances[$name]) && gettype(self::$pluginInstances[$name]) == 'object') {
			return true;
		}

		return false;
	}

	function execute()
	{
		$output = '';
		if ($this->plugin->enabled == false) {//TODO: add event for disabled
			$this->ignored = true;
			return $output->toHtml();
		}

		//Zend style plugins are classed based
		//Start Zend
		if (isset($this->plugin->class)) {
			if (isset($this->plugin->class->parserLevel)) {
				$this->parserLevel = $this->plugin->class->parserLevel;

				if ($this->parserLevel > self::$currentParserLevel) {
					$this->addWaitingPlugin();
					return $this->key;
				} else {

					$this->applyFilters();
					$button = $this->button(false);

					$result = $this->plugin->class
						->setButton($button)
						->execute($this->body, $this->args, $this->index, $this->parser);

					return $result;
				}
			}
		}
		//End Zend


		//alias start
		$newDetails = $this->alias->getDetails(self::$pluginDetails[$this->key]);
		if ($newDetails != false) {
			return $this->execute($newDetails);
		}
		//alias end

		//If we make it this far, it most likley is a smarty black that can't be executed
		//smarty or unrecognized start
		$this->ignored = true;
		return $this->toSyntax();
		//smarty or unrecognized end
	}

	private function addWaitingPlugin()
	{
		self::$parserLevels[] = $this->class->parserLevel;
		sort(self::$parserLevels, SORT_NUMERIC);
		array_unique(self::$parserLevels);
		self::$pluginsAwaitingExecution[$this->key] = self::$pluginDetails[$this->key];
	}

	public function exists()
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

	static public function getList( $includeReal = true, $includeAlias = true )
	{
		$real = array();

		//Check for existence of Zend wiki plugins
		foreach ( glob('lib/core/Plugin/*.php') as $file ) {
			$base = basename($file);
			if (strtolower($base) == $base) { //the zend plugins all have lower case names
				$plugin = substr($base, 0, -4);
				$real[] = $plugin;
			}
		}

		if ( $includeReal && $includeAlias ) {
			$plugins = array_merge($real, PluginAlias::getList());
		} elseif ( $includeReal ) {
			$plugins = $real;
		} elseif ( $includeAlias ) {
			$plugins = PluginAlias::getList();
		} else {
			$plugins = array();
		}
		$plugins = array_filter($plugins);
		sort($plugins);

		return $plugins;
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
