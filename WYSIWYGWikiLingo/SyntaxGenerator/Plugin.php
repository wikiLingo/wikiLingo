<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Plugin extends Base
{

    public function generate()
    {
        $parameters =& $this->expression->parameters;
        $pluginType = null;
        $pluginParameters = null;
        $pluginHasParameters = false;
        if (!empty($parameters['data-plugintype'])) {
            $isInline = (empty($parameters['data-isinline']) ? false : true);

            $pluginType = ($isInline ? strtolower($parameters['data-plugintype']) : strtoupper($parameters['data-plugintype']));

            if (!empty($parameters['data-pluginparameters'])) {
                $pluginParameters = json_decode(urldecode($parameters['data-pluginparameters']));
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
        if ($isInline) {
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