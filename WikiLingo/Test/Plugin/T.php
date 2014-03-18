<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class T extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{

		if ($parser != null) {
			$parser->types['WikiLingo\Expression\Header'] = array();

            Type::Events($parser->events)
                ->bind(new Event\Translate(function($value, $context) {
                    switch($value){
                        case 'not translated':
                            return 'is translated';
                    }

                    return $value;
                }));
        }

		$this->source =
            "{T()}not translated{T}";

		$this->expected = "<span class='T' id='T1'>is translated</span>";

	}
}
