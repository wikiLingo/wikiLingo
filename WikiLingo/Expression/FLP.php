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
    public static $firstRender = false;
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
        if ( !self::$firstRender ) {
            self::$firstRender = true;
            $parser->events->bind(new Event\PostRender(function(&$rendered) {
                FLP::$ui =& new \FLP\UI($rendered);
            }));
        }

        $children = $this->renderedChildren;
        $parser->events->bind(new Event\PostRender(function(&$rendered) use ($children) {
            FLP::$ui->addPhrase(new \Phraser\Phrase($children));
        }));

        self::$renderedCount++;
        if (self::$existingCount == self::$renderedCount) {
            $parser->events->bind(new Event\PostRender(function(&$rendered) {
                $rendered = FLP::$ui->render();
            }));
        }

        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        $element->detailedAttributes['data-past'] = $this->past;
        return $element->render();
    }
}


if ( !WikiLingo\Expression\FLP::$loaded ) {
    WikiLingo\Expression\FLP::$loaded = true;
    $dir = dirname(__FILE__) . "/FLP/";
    AutoLoader::$Directories[] = $dir . "FLP";
    AutoLoader::$Directories[] = $dir . "Phraser";
}