<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/2/14
 * Time: 10:27 PM
 */

namespace WikiLingo\Expression;

use WikiLingo;
use WikiLingo\Event;
use FLP;
use Phraser;

/**
 * Class PastLink
 * @package WikiLingo\Expression
 */
class PastLink extends Base
{
    public static $loaded = false;

    /**
     * @var FLP\UI
     */
    public static $ui;
    public static $existingCount = 0;
    public static $renderedCount = 0;
    public static $pairs = array();
	public $past;
    public $phrase;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    public function __construct(WikiLingo\Parsed $parsed)
	{
		$this->parsed = $parsed;

		//"@FLP(past)" to "past"
		$this->past = json_decode(urldecode(substr($parsed->text, 5, -1)));
        self::$existingCount++;
	}

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
	{
        if ( !$parser->wysiwyg ) {
            self::$renderedCount++;

            //FIRST
            //Bind initial render so that PastLink::$ui is set, this is only done once per parser render
            if ( self::$renderedCount == 1 ) {
                $parser->events->bind(new Event\PostRender(function($rendered) {
                    PastLink::$ui = new FLP\UI($rendered);
                    PastLink::$ui->setContextAsFuture();
                }));
            }

            //EVERY
            //each child needs to be sent as a phrase to the ui
            $children = $this->renderedChildren;
            $parser->events->bind(new Event\PostRender(function($rendered) use ($children) {
                PastLink::$ui->addPhrase(new Phraser\Phrase($children));
            }));

            $value = new FLP\Metadata();
            $value->text = $children;
            FLP\Events::triggerMetadataLookup('', $value);
            $pair = new FLP\Pair($this->past, $value);
            FLP\Pairs::add($pair);

            $assembled = new FLP\PairAssembler();
            $assembled->futureText = new Phraser\Phrase($children);
            $assembled->pastText = new Phraser\Phrase($pair->past->text);
            $assembled->pair = $pair;
            $assembled->increment();
            self::$pairs[] = $assembled;
            
            //LAST
            //if this is the last item in the count, then setup the post-render, reset the counters
            if (self::$existingCount == self::$renderedCount) {
                $parser->events->bind(new Event\PostRender(function($rendered) use ($parser) {
                    $rendered = PastLink::$ui->render();
                    $pairs = self::$pairs;
                    $pairsJson = json_encode($pairs);
                    $counts = json_encode(FLP\PairAssembler::$counts);
                    //use an actual length, when more than 1, php turns from array to associative array, so there is no length
                    $length = self::$existingCount;

                    $parser->scripts
                        ->addScriptLocation("~flp/flp/scripts/flp.js")
                        ->addScriptLocation("~flp/flp/scripts/flp.Link.js")
                        ->addScript(<<<JS
(function() {
    var counts = $counts,
        length = $length,
        flpData = $pairsJson,
        phrases = $('span.phrases'),
        phrasesLookupTable = {};

        for(var x = 0; x < length; x++){
            if(!phrasesLookupTable[flpData[x].futureText.sanitized]){
                phrasesLookupTable[flpData[x].futureText.sanitized] = [];
            }
            phrasesLookupTable[flpData[x].futureText.sanitized].push(flpData[x]);
        }


    for (var i = 0; i < $length; i++) {
        var pastLink = new flp.Link({
            beginning: phrases.filter('span.pastlink-beginning' + i),
            middle: phrases.filter('span.pastlink' + i),
            end: phrases.filter('span.pastlink-end' + i),
            to: 'past',
            count: counts[flpData[i].futureText.sanitized],
            pairs: phrasesLookupTable[flpData[i].futureText.sanitized]
        });
        flp.addPastLink(pastLink);
    }
})();
JS
);
                }));

                FLP\SendToPast::send();
            }
        }

        $element = $renderer->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        $element->detailedAttributes['data-past'] = $this->past;
        $rendered = $element->render();
        return $rendered;
    }
}