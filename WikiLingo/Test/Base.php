<?php
namespace WikiLingo\Test;

use Testify\Testify;
use WikiLingo;

/**
 * Class Base
 * @package WikiLingo\Test
 */
abstract class Base
{
    public $source;
	public $expected;

	/**
	 * @param WikiLingo\Parser $parser
	 */
	public abstract function __construct(&$parser);
}