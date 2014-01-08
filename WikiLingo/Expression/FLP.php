<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/2/14
 * Time: 10:27 PM
 */

namespace WikiLingo\Expression;

use Types\Type;
use WikiLingo;
use WikiLingo\Event;
use WikiLingo\Utilities\AutoLoader;

/**
 * Class FLP
 * @package WikiLingo\Expression
 */
class FLP extends Base
{
    public static $loaded = false;
    public static $ui;
    public static $existingCount = 0;
    public static $renderedCount = 0;
	public $past;
    public $phrase;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    public function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;

		//@FLP(past) to past
		$this->past = substr($parsed->text, 5, -1);
        self::$existingCount++;
	}

    /**
     * @param $parser
     * @return String
     */
    public function render(&$parser)
	{
        if ( !$parser->wysiwyg ) {
            self::$renderedCount++;

            //FIRST
            //Bind initial render so that FLP::$ui is set, this is only done once per parser render
            if ( self::$renderedCount == 1 ) {
                $parser->events->bind(new Event\PostRender(function(&$rendered) {

                    //here we ensure that the FLP & Phraser namespaces can be obtained from the
                    if ( !self::$loaded ) {
                        self::$loaded = true;
                        $dir = dirname(__FILE__) . "/FLP/";
                        AutoLoader::$Directories[] = $dir . "FLP";
                        AutoLoader::$Directories[] = $dir . "Phraser";
                    }

                    FLP::$ui = new \FLP\UI($rendered);
                }));
            }

            //EVERY
            //each child needs to be sent as a phrase to the ui
            $children = $this->renderedChildren;
            $parser->events->bind(new Event\PostRender(function(&$rendered) use ($children) {
                FLP::$ui->addPhrase(new \Phraser\Phrase($children));
            }));


            //LAST
            //if this is the last item in the count, then setup the post-render, reset the counters
            if (self::$existingCount == self::$renderedCount) {
                self::$existingCount = self::$renderedCount = 0;
                $parser->events->bind(new Event\PostRender(function(&$rendered) {
                    $rendered = FLP::$ui->render();
                }));
            }
        }

        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        $element->detailedAttributes['data-past'] = $this->past;
        return $element->render();
    }
}