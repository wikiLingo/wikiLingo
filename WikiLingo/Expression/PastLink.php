<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/2/14
 * Time: 10:27 PM
 */

namespace WikiLingo\Expression;

use FLP\Events as FutureLinkProtocolEvents;
use Types\Type;
use WikiLingo;
use WikiLingo\Event;
use FLP;
use Phraser;
use WikiLingo\Expression\PastLink\Sender;

/**
 * Class PastLink
 * @package WikiLingo\Expression
 */
class PastLink extends Base
{
    public static $loaded = false;
    public static $ui;
    public static $existingCount = 0;
    public static $renderedCount = 0;
    public static $pairs = array();
    public static $assembledPairs = array();
	public $past;
    public $phrase;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    public function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;

		//"@FLP(past)" to "past"
		$this->past = json_decode(urldecode(substr($parsed->text, 5, -1)));
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
            //Bind initial render so that PastLink::$ui is set, this is only done once per parser render
            if ( self::$renderedCount == 1 ) {
                Sender::Setup();
                $parser->events->bind(new Event\PostRender(function(&$rendered) {
                    PastLink::$ui = new FLP\UI($rendered);
                    PastLink::$ui->setContextAsFuture();
                }));
            }

            //EVERY
            //each child needs to be sent as a phrase to the ui
            $children = $this->renderedChildren;
            $parser->events->bind(new Event\PostRender(function(&$rendered) use ($children) {
                PastLink::$ui->addPhrase(new Phraser\Phrase($children));
            }));

            $value = new FLP\Metadata();
            $value->text = $children;
            FLP\Events::triggerMetadataLookup('', $value);
            self::$pairs[] = $pair = new FLP\Pair($this->past, $value);
            FLP\Pairs::add($pair);

            $assembled = new FLP\PairAssembler();
            $assembled->futureText = new Phraser\Phrase($children);
            $assembled->pastText = new Phraser\Phrase($pair->past->text);
            $assembled->pair = $pair;
            $i = self::$existingCount;
            if (!isset(self::$assembledPairs[$i - 1])) {
                self::$assembledPairs[$i - 1] = array();
            }
            self::$assembledPairs[$i - 1][] = $assembled;

            //LAST
            //if this is the last item in the count, then setup the post-render, reset the counters
            if (self::$existingCount == self::$renderedCount) {
                $parser->events->bind(new Event\PostRender(function(&$rendered) use ($i, &$parser) {
                    $rendered = PastLink::$ui->render();



                    $assembledPairs = json_encode(self::$assembledPairs);

                    Type::Scripts($parser->scripts)
                        ->addScriptLocation("~flp/flp/scripts/flp.js")
                        ->addScriptLocation("~flp/flp/scripts/flp.Link.js")
                        ->addScript(<<<JS
var phrases = $('span.phrases'),
    assembledPairs = $assembledPairs;
for (var i = 0; i < assembledPairs.length; i++) {
    (new flp.Link({
        beginning: phrases.filter('span.pastlink-beginning' + i),
        middle: phrases.filter('span.pastlink' + i),
        end: phrases.filter('span.pastlink-end' + i),
        to: 'past',
        pairs: assembledPairs[i]
    }));
}
JS
);
                }));

                FLP\SendToPast::send();
            }
        }

        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        $element->detailedAttributes['data-past'] = $this->past;
        $rendered = $element->render();
        return $rendered;
    }
}