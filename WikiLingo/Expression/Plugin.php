<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;
Use Exception;

class Plugin extends Base
{
    public $type;
    public $parameters = array(); //parameters are server side
    public $attributes = array(); //attributes are client/tag side
    public $privateAttributes = array(); //privateAttributes are server side, used between plugins
    public $index;
    public $key;
	public $exists;
    public $classType;
    public $class;
    public $parsed;
    public $parent;
	public $allowLines = false;
    public $isInline = false;
    public static $injected = array();

    public static $info;
    public static $parametersParser;
    public static $indexes = array();

    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;
	    $type = $parsed->text;
	    $parameters = $parsed->arguments[0]->text;

        if (!isset(self::$parametersParser)) {
            self::$parametersParser = new WikiLingo\Utilities\Parameters\Definition();
        }

        $this->type = $type = strtolower(substr($type, 1));

        if ($type{strlen($type) - 1} == "(") {
            $this->type = $type = strtolower(substr($type, 0, -1));
        }

        $this->classType = "WikiLingo\\Plugin\\$type";
	    $this->exists = class_exists($this->classType);

        //it may exist elsewhere
        if (!$this->exists) {
            Type::Events($parsed->parser->events)->triggerExpressionPluginExists($this);
        }

        $this->index = self::incrementPluginIndex($type);
        $this->key = '§' . md5('plugin:' . $type . '_' . $this->index) . '§';

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
            if (empty($parsed->parser->pluginInstances[$this->classType])) {
                $parsed->parser->pluginInstances[$this->classType] = new $this->classType;
            }
            $this->class = $parsed->parser->pluginInstances[$this->classType];
	        $this->parsed->expressionPermissible = $this->class->permissible;
        }
    }

    public function render(&$parser)
    {
        if (isset($this->class)) {
            $this->parent =& $this->parsed->parent->expression; //shorten the parent access a bit;
        } else {
            throw new Exception('Plugin "' . $this->type . '" does not exists in namespace WikiLingo\Plugin');
        }

        Type::Events($parser->events)->triggerExpressionPluginPreRender($this);
        $rendered =& $this->class->render($this, $this->renderedChildren, $parser);
	    Type::Events($parser->events)->triggerExpressionPluginPostRender($rendered, $this);
        return $rendered;
    }

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
     *
     * @access  private
     * @param   string  $type plugin type
     * @return  string  $index
     */
    private function incrementPluginIndex($type)
    {
	    $type = strtolower($type);

        if (isset(self::$indexes[$type]) == false) {
            self::$indexes[$type] = 0;
        }

        self::$indexes[$type]++;

        return self::$indexes[$type];
    }

    public function addAttribute($type, $value) {
        $this->attributes[$type] = $value;
    }

	public function parameter($type)
	{
		if (isset($this->parameters[$type]))
		{
			return $this->parameters[$type];
		}
		return '';
	}

	public function id()
	{
		return $this->type . $this->index;
	}
}