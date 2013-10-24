<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Plugin extends Base
{
    public $name;
    public $parameters = array(); //parameters are server side
    public $attributes = array(); //attributes are client/tag side
    public $privateAttributes = array(); //privateAttributes are server side, used between plugins
    public $index;
    public $key;
	public $exists;
    public $className;
    public $class;
    public $parsed;
    public $parent;
	public $allowsBreaks = false;
    public $isInline = false;
    public static $injected = array();

    public static $info;
    public static $parametersParser;
    public static $indexes = array();

    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;
	    $name = $parsed->text;
	    $parameters = $parsed->arguments[0]->text;

        if (!isset(self::$parametersParser)) {
            self::$parametersParser = new WikiLingo\Utilities\Parameters\Definition();
        }

        $this->name = $name = strtolower(substr($name, 1));

        if ($name{strlen($name) - 1} == "(") {
            $this->name = $name = strtolower(substr($name, 0, -1));
        }

        $this->className = "WikiLingo\\Plugin\\$name";
	    $this->exists = class_exists($this->className);

        //it may exist elsewhere
        if (!$this->exists) {
            $parsed->parser->events->trigger('WikiLingo\Expression\Plugin', 'Exists', $this);
        }

        $this->index = self::incrementPluginIndex($name);
        $this->key = '§' . md5('plugin:' . $name . '_' . $this->index) . '§';

        if ($parameters != '}') {
            if ($this->isInline) {
                //{plugin}
                $parameters = substr($parameters, 0, -1);
            } else {
                //{PLUGIN()}
                $parameters = substr($parameters, 0, -2);
            }

            if (!empty($parameters)) {
                $this->parameters = self::$parametersParser->parse($parameters);
            }
        }

        $this->ignored = false;

        if ($this->exists == true) {
            if (empty($parsed->parser->pluginInstances[$this->className])) {
                $parsed->parser->pluginInstances[$this->className] = new $this->className;
            }
            $this->class = $parsed->parser->pluginInstances[$this->className];
        }
    }

    public function render(&$parser)
    {
        $execute = true;
        $parser->events->trigger('WikiLingo\Expression\Plugin', 'CanExecute', $this, $execute);
        if ($execute)
        {
            $parser->events->trigger('WikiLingo\Expression\Plugin', 'PreRender', $this);
            $this->parent =& $this->parsed->parent->expression; //shorten the parent access a bit;
            $rendered = $this->class->render($this, $this->renderedChildren, $parser);
            $parser->events->trigger('WikiLingo\Expression\Plugin', 'PreRender', $this);
            return $rendered;
        } else {
            $return = '';
            $parser->events->trigger('WikiLingo\Expression\Plugin', 'RenderBlocked', $this, $return);
            return $return;
        }
    }

    public function info()
    {
        if ( isset( self::$info[$this->name] ) ) {
            return self::$info[$this->name];
        }

        if (isset($this->class)) {
            self::$info[$this->name] = $this->class->info();
            if (isset(self::$info[$this->name]['params'])) {
                self::$info[$this->name]['params'] = array_merge(self::$info[$this->name]['params'], $this->class->style());
            }
            return self::$info[$this->name];
        }

        return false;
    }

    /**
     * Increments the plugin index, but on a plugin type by type basis, for example, html1, html2, div1, div2.  indexes
     * are static, so that all index are unique
     *
     * @access  private
     * @param   string  $name plugin name
     * @return  string  $index
     */
    private function incrementPluginIndex($name)
    {
        $name = strtolower($name);

        if (isset(self::$indexes[$name]) == false) {
            self::$indexes[$name] = 0;
        }

        self::$indexes[$name]++;

        return self::$indexes[$name];
    }

    public function addAttribute($name, $value) {
        $this->attributes[$name] = $value;
    }
}