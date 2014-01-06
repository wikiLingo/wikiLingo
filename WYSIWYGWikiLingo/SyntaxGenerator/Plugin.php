<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Plugin
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Plugin extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        $parameters =& $this->expression->parameters;
        $pluginType = null;
        $inLine = false;
        $pluginParameters = null;
        $pluginHasParameters = false;
        if (!empty($parameters['data-plugin-type'])) {
            if (isset($parameters['data-in-line']) && strtolower($parameters['data-in-line']) == 'true') {
                $inLine = true;
            }

            $pluginType = ($inLine ? strtolower($parameters['data-plugin-type']) : strtoupper($parameters['data-plugin-type']));

            if (!empty($parameters['data-plugin-parameters'])) {
                $pluginParameters = json_decode(urldecode($parameters['data-plugin-parameters']));
                if (!empty($pluginParameters)) {
                    $pluginHasParameters = true;
                }
            }
        } else {
            return '';
        }

        $plugin = '{' . $pluginType;

        $pluginParametersParsed = [];
        $pluginParametersString = null;
        if ($pluginHasParameters) {
            foreach( $pluginParameters as $key => $parameter) {
                $pluginParametersParsed[] = $key . '=`' . $parameter . '`';
            }
            $pluginParametersString = implode($pluginParametersParsed, ' ');
        }
        if ($inLine) {
            if ($pluginHasParameters) {
                $plugin .= ' ' . $pluginParametersString;
            }

            $plugin .= '}';

        } else {
            $plugin .= '(' . $pluginParametersString .')}';

            $plugin .= $this->expression->renderedChildren;

            $plugin .= '{' . $pluginType . '}';
        }

        return $plugin;
    }
}