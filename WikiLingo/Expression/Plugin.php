<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Plugin extends Base
{
    public $name;
    public $parameters = array(); //parameters are server side
    public $attributes = array(); //attributes are client/tag side
    public $index;
    public $key;
	public $exists;
    public $className;
    public $class;
    public $parsed;
    public $parent;
	public $allowsBreaks = false;
    public $isInline = false;

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
            if (empty(WikiLingo\Plugin\Negotiator::$pluginInstances[$this->className])) {
                WikiLingo\Plugin\Negotiator::$pluginInstances[$this->className] = new $this->className;
            }
            $this->class = WikiLingo\Plugin\Negotiator::$pluginInstances[$this->className];
        } else if (WikiLingo\Plugin\Negotiator::injectedExists($this->className) == true) {
            $this->class = WikiLingo\Plugin\Negotiator::$pluginInstances[$this->name];
        } else {
            $this->class = null;
        }
    }

    public function render(&$parser)
    {
        $parser->events->trigger(__FUNCTION__ .'.pre', $this);
        $this->parent =& $this->parsed->parent->expression; //shorten the parent access a bit;
        $rendered = $this->class->render($this, $this->renderedChildren, $parser);
        $parser->events->trigger(__FUNCTION__ .'.post', $this);
        return $rendered;
    }

    public function fingerprint()
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
        $parametersLen = str_pad(strlen($serialized), 6, '0', STR_PAD_RIGHT);

        $bodyHash = md5($validateBody);
        $argsHash = md5($serialized);

        return "$this->name-$bodyHash-$argsHash-$bodyLen-$parametersLen";
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

    function enabled(& $output)
    {
        $info = $this->info();

        global $prefs;

        $missing = array();

        if ( isset( $info['prefs'] ) ) {
            foreach ( $info['prefs'] as $pref ) {
                if ( isset($prefs[$pref]) && $prefs[$pref] != 'y' ) {
                    $missing[] = $pref;
                }
            }
        }

        if ( count($missing) > 0 ) {//TODO: Handle disabled plugins with some sort of trigger
            $output = WikiParser_PluginOutput::disabled($this->name, $missing);
            return false;
        }

        return true;
    }

    function urlEncodeParameters()
    {
        $parameters = '';// not using http_build_query() as it converts spaces into +
        $info = $this->info();

        if (!empty($this->parameters)) {
            foreach ( $this->parameters as $key => $value ) {
                if (is_array($value)) {
                    if (isset($info['params'][$key]['separator'])) {
                        $sep = $info['params'][$key]['separator'];
                    } else {
                        $sep = ',';
                    }
                    $parameters .= $key.'='.implode($sep, $value).'&';
                } else {
                    $parameters .= $key.'='.$value.'&';
                }
            }
        }

        $parameters = rtrim($parameters, '&');

        return $parameters;
    }

    public function addAttribute($name, $value) {
        $this->attributes[$name] = $value;
    }
}