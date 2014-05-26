<?php
namespace WikiLingo\Expression;

use WikiLingo;
Use Exception;

/**
 * Class Plugin
 * @package WikiLingo\Expression
 */
class Plugin extends Base
{
    public $type;
    /**
     * @var array
     */
    public $parameters = array(); //parameters are server side
    public $parametersRaw = array(); //parameters are server side
    public $attributes = array(); //attributes are client/tag side
    public $privateAttributes = array(); //privateAttributes are server side, used between plugins
    public $index;
    public $key;
	public $exists;
    public $classType;

    /**
     * @var WikiLingo\Plugin\Base[]
     */
    public static $customClasses = array();

    /**
     * @var WikiLingo\Plugin\Base
     */
    public $class;
    public $parsed;
    public $parent;
	public $allowLines = false;
    public $allowWhiteSpace = false;
    public $inLine = false;
    public static $injected = array();

    public static $info;
    public static $parametersParser;
    public static $indexes = array();

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;
	    $type = $parsed->text;
	    $parameters = $parsed->arguments[0]->text;

        if (!isset(self::$parametersParser)) {
            self::$parametersParser = new WikiLingo\Utilities\Parameters\Definition();
        }

        //From "{PLUGIN_NAME( " to "PLUGIN_NAME(", or from "{plugin_name " to "plugin_name"
        $type = substr(trim($type), 1);


        //From "PLUGIN_NAME(" to "PluginName", or from "{plugin_name " to "PluginName"
        if ($type{strlen($type) - 1} === "(") {
            $this->type = $type = self::typeShort(substr($type, 0, -1));
        } else {
            $this->type = $type = self::typeShort($type);
        }

        $this->classType = "WikiLingo\\Plugin\\$type";
	    $this->exists = class_exists($this->classType);

        //if the plugin doesn't exist, lets see if it does in the customClasses attribute
        if (!$this->exists && isset(self::$customClasses[$type])) {
            if (!isset($parsed->parser->pluginInstances[$this->classType])) {
                $parsed->parser->pluginInstances[$this->classType] = self::$customClasses[$type];
            }

            $this->exists = true;
        }

        //it may exist elsewhere
        if (!$this->exists) {
            $parsed->parser->events->triggerExpressionPluginExists($this);
        }

        $this->index = self::incrementPluginIndex($type);
        $this->key = '§' . md5('plugin:' . $type . '_' . $this->index) . '§';

        $this->ignored = false;

        if ($this->exists == true) {
            if (empty($parsed->parser->pluginInstances[$this->classType])) {
                $parsed->parser->pluginInstances[$this->classType] = $class = new $this->classType($parsed->parser);
            }
            $this->class = $parsed->parser->pluginInstances[$this->classType];
            $this->isVariableContext = $this->class->isVariableContext;
	        $this->parsed->expressionPermissible = $this->class->permissible;
            $this->allowLines = $this->class->allowLines;
            $this->allowWhiteSpace = $this->class->allowWhiteSpace;

            if ($parameters != '}') {
                if ($this->inLine) {
                    //{plugin ...}
                    $parameters = substr($parameters, 0, -1);
                } else {
                    //{PLUGIN(...)}
                    $parameters = substr($parameters, 0, -2);
                }

                if (!empty($parameters)) {
	                $this->parametersRaw = self::$parametersParser->parse($parameters);
                }
            }

	        $this->parameters = $this->class->parameterValues($this->parametersRaw, $parsed->parser);
        }
    }

    /**
     * Gets short class name from string. A_PLUGIN_NAME or a_plugin_name will be converted to APluginName
     * @param $name
     * @return string
     */
    public static function typeShort($name)
    {
        // Split string in words.
        $words = explode('_', strtolower($name));

        $typeShort = '';
        foreach ($words as $word) {
            $typeShort .= ucfirst(trim($word));
        }

        return $typeShort;
    }

    public function preRender(&$renderer)
    {
        if (method_exists($this->class, "preRender")) {
            $this->class->preRender($renderer);
        }
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @throws Exception
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        if (isset($this->class)) {
            $this->parent =& $this->parsed->parent->expression; //shorten the parent access a bit;
        } else {
            throw new Exception('Plugin "' . $this->type . '" does not exists in namespace WikiLingo\Plugin');
        }

        $parser->events->triggerExpressionPluginPreRender($this);
        $rendered = $this->class->render($this, $this->renderedChildren, $renderer, $parser);
	    $parser->events->triggerExpressionPluginPostRender($rendered, $this);
        return $rendered;
    }

    public function postRender(&$renderer)
    {
        if (method_exists($this->class, "postRender")) {
            $this->class->postRender($renderer);
        }
    }

    /**
     * @return bool
     */
    public function info()
    {
        if ( isset( self::$info[$this->type] ) ) {
            return self::$info[$this->type];
        }

        if (isset($this->class)) {
            self::$info[$this->type] = $this->class->info();
            if (isset(self::$info[$this->type]['params'])) {
                self::$info[$this->type]['params'] = array_merge(self::$info[$this->type]['params'], $this->class->style());
            }
            return self::$info[$this->type];
        }

        return false;
    }

    /**
     * Increments the plugin index, but on a plugin type by type basis, for example, html1, html2, div1, div2.  indexes
     * are static, so that all index are unique
     * @param $type
     * @return Number
     */
    private function incrementPluginIndex($type)
    {
        if (isset(self::$indexes[$type]) == false) {
            self::$indexes[$type] = 0;
        }

        self::$indexes[$type]++;

        return self::$indexes[$type];
    }

    /**
     * @param $type
     * @param $value
     */
    public function addAttribute($type, $value) {
        $this->attributes[$type] = $value;
    }

    /**
     * @param $type
     * @return string
     */
    public function parameter($type)
	{
		$type = strtolower($type);

		if (isset($this->parameters[$type]))
		{
			return $this->parameters[$type]->filter();
		}
		return '';
	}

    /**
     *
     */
    public function variables()
    {
        return $this->class->variables($this);
    }
}