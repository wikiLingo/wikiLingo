<?php
namespace WikiLingo\Test;

use WikiLingo;

/**
 * Class injected
 * @package WikiLingo\Test
 */
class Injected extends WikiLingo\Plugin\Base
{
    public $type = 'Injected';

	public function __construct(&$parser)
	{

	}
}