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
    public $postParseDelegates = array();

	/**
	 * @param WikiLingo\Parser $parser
	 */
	public abstract function __construct(&$parser);

    public function bindPostParse($delegate)
    {
        $this->postParseDelegates[] = $delegate;
    }

    /**
     * @param TypeNamespace
     */
    public function triggerPostParse($test)
    {
        foreach ($this->postParseDelegates as $delegate)
        {
            $delegate($test);
        }
    }
}